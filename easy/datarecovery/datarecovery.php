<?php 

$fizzbuzzhandler = new FizzBuzzHandler($argv[1]);

class FizzBuzz
{
	private $_first;
	private $_second;
	private $_range;
	private $_answer;
	
	public function __construct($first, $second, $range)
	{
		$this->_first = $first;
		$this->_second = $second;
		$this->_range = $range;
		$this->solve();
	}
	
	public function solve()
	{
		$this->_answer = array();
		for ($i = 1; $i <= $this->_range; $i++){
			$this->_answer[] = $this->_checkFizzBuzz($i);
		}
	}
	
	public function getAnswerArray(){
		return $this->_answer;
	}
	
	private function _checkFizzBuzz($x){
		if ( $x % $this->_first == 0 && $x % $this->_second == 0 ) {
			return "FB";
		}
		elseif ( $x % $this->_second == 0 ) {
			return "B";
		}
		elseif ( $x % $this->_first == 0 ) {
			return "F";
		}
		else{
			return $x;
		}
	}
}

class FizzBuzzOutputter
{
	private $_fizzBuzzArray;
	private $_output;
	
	public function __construct($fizzBuzzArray){
		$this->_fizzBuzzArray = $fizzBuzzArray;
		$this->setOutput();
	}
	
	public function setOutput()
	{
		$this->_output = '';
		foreach ( $this->_fizzBuzzArray as $hotFizzBuzz ) {
			$this->_output .= implode(' ',$hotFizzBuzz->getAnswerArray());
			$this->_output .= "\n";
		}
	}
	
	public function getOutput()
	{
		return $this->_output;
	}
}

class FizzBuzzHandler
{
	public function __construct($inputFile){
		$handle = fopen($inputFile, "r");
		$output = '';
		$fizzBuzzArray = array();
		
		while ( ($line = fgets($handle)) !== false ) {
			$elements = explode(' ', $line);
			$fizzBuzzArray[] = new FizzBuzz($elements[0], $elements[1], $elements[2]);
		}
		
		$fizzBuzzOutputter = new FizzBuzzOutputter($fizzBuzzArray);
		$fizzBuzzOutput = $fizzBuzzOutputter->getOutput();
		
		echo $fizzBuzzOutput;
	}
}
?>