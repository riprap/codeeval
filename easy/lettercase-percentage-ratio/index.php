<?php 
$argv[1] = 'input'; 

$lettercasePercentageRatioHandler = new LettercasePercentageRatioHandler($argv[1]);

class LettercasePercentageRatio
{
	protected $_string;
	protected $_lowercasePercentage;
	protected $_uppercasePercentage; 
	
	public function __construct($string)
	{
		$this->_string = $string;
		//match all that are A-Z
		//match all that are a-z
		$this->_solvePercentages();
	}
	
	protected function _solvePercentages()
	{
		$uppercaseLetters = 0;
		$lowercaseLetters = 0;
		$uppercasePattern = "/^[A-Z]+$/";
		$lowercasePattern = "/^[a-z]+$/";
		for ($i=0;$i<strlen($this->_string);$i++) {
			$char = $this->_string[$i];
			if (preg_match($uppercasePattern, $char)) 
				$uppercaseLetters++;
			elseif ( preg_match($lowercasePattern, $char) )
				$lowercaseLetters++;
		}
		$totalLetters = $uppercaseLetters + $lowercaseLetters;
		$this->_lowercasePercentage = $this->_formatPercentage($lowercaseLetters / $totalLetters);
		$this->_uppercasePercentage = $this->_formatPercentage($uppercaseLetters / $totalLetters);
	}
	
	protected function _formatPercentage($percentage)
	{
		return number_format(($percentage * 100), 2);
	}
	
	public function getOutput()
	{
		return "lowercase: " . $this->_lowercasePercentage . " uppercase: " . $this->_uppercasePercentage;
	}
}

class LettercasePercentageRatioHandler
{
	public function __construct($inputFile){
		$handle = fopen($inputFile, "r");
		
		//loop through each line
		while ( ($line = fgets($handle)) !== false ) {
			$lettercasePercentageRatio = new LettercasePercentageRatio($line);
			echo $lettercasePercentageRatio->getOutput();
			echo "\n";
		}
	}
}
?>