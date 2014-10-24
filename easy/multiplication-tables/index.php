<?php 
	for ( $a = 1 ; $a <= 12 ; $a++ ) {
		if (strlen($a) == 1) echo " ";
		echo $a;
		$leftSpace = 3 - strlen($a);
		
		
		$second = $a * 2;
		$spaceBetweenFirstAndSecond = 4 - strlen($second);
		echoSpaces($spaceBetweenFirstAndSecond);
		echo $second;
		
		for ( $b = 3 ; $b <= 12 ; $b++ ) {
			$number = $a * $b;
			
			$spaces = 4 - strlen($number);
			echoSpaces($spaces);
			echo $number;
		}
		echo "\n";
	}
	
	function echoSpaces($int){
		for ($i=1; $i<=$int; $i++){
			echo " ";
		}
		
	}
?>