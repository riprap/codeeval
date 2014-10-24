<?php 

function isPrime($number){
	if ( $number % 2 == 0) return false;
	
	for ( $i=2; $i <= ($number/2) ; $i++ ) {
		if ($number % $i == 0){
			return false; 
		}
	}
	return true;
}

$primes = array(2,3);
$hotNumber = 5;
for ( $i = 3 ; $i <= 1000 ; $i++ ) {
	
	
	while (!isPrime($hotNumber)) {
		$hotNumber++;
	}
	$primes[] = $hotNumber;
	$hotNumber++;
}

$summation = 0;
foreach ($primes as $prime){
	$summation += $prime;
}
echo $summation;
?>