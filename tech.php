<?php
$a = range(3, 100);

$arrayName = array();

foreach ($a as $b) {
    $c = range(2, $b-1);
    $e = 1;
    foreach ($c as $d) {
        if ($b % $d == 0){$e = 0;}
    }
if ($e == 1) {$arrayName[] = $b;}
}

var_dump($arrayName);
foreach($arrayName as $an){
	echo($an);
	echo" ";
}
?>