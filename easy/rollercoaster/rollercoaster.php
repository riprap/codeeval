<?php 
$argv[1] = 'input'; 

$rollerCoasterHandler = new RollerCoasterHandler($argv[1]);

class RollerCoaster
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
		$capitalize = true;
		for ( $stringIndex = 0 ; $stringIndex < strlen($this->_string); $stringIndex++ ) {
			$character = $this->_string[$stringIndex];
			$charIsAlphabetical =  preg_match("/^[a-zA-Z]+$/", $character);
			
			if ( $charIsAlphabetical ) {
				if ( $capitalize ) {
					$character = strtoupper($character);
					$capitalize = false;
				}
				else{
					$capitalize = true;
				}
			}
			$this->_solvedString .= $character;
		}
	}
	
	public function getSolvedString(){
		return $this->_solvedString;
	}
}

class RollerCoasterHandler
{
	public function __construct($inputFile){
		$handle = fopen($inputFile, "r");
		
		//loop through each line
		while ( ($line = fgets($handle)) !== false ) {
			$rollerCoasterLine = new RollerCoaster($line);
			echo $rollerCoasterLine->getSolvedString();
			echo "\n";
		}
	}
}
?>