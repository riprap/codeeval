<?php 
$argv[1] = 'input'; 

$reverseWordsHandler = new ReverseWordsHandler($argv[1]);

class ReverseWords
{
	protected $_initialString;
	protected $_solvedString;
	
	public function __construct($string)
	{
		$this->_string = $string;
		//$this->_deprecatedSolveLine();
		$this->_solveLine();
	}
	
	protected function _solveLine()
	{
		$allWords = explode(" ", $this->_string);
		$trimmedWords = array();
		foreach ($allWords as $word){
			$trimmedWords[] = trim($word);
		}
		$allWords = array_reverse($trimmedWords);
		$this->_solvedString = implode(" ", $allWords);
	}
	
	public function getSolvedString(){
		return $this->_solvedString;
	}
}

class ReverseWordsHandler
{
	public function __construct($inputFile){
		$handle = fopen($inputFile, "r");
		
		//loop through each line
		while ( ($line = fgets($handle)) !== false ) {
			$reverseWords = new ReverseWords($line);
			echo $reverseWords->getSolvedString();
			echo "\n";
		}
	}
}
?>