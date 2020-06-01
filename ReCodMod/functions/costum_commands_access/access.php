<?php
 $array = array(' PS;',' GEO;',' CP;',' FC;',' XC;',' BONUS;');
 $specials = ''; 
 foreach($array as $lp){
 if (strpos($parseline, $lp) !== false)
	$specials = 1; }
?>
