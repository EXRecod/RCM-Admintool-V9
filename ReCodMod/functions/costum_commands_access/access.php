<?php
if(!empty($parseline))
{
 $array = array(' PS;',' GEO;',' CP;',' FC;',' XC;',' BONUS;',' IP;',
 ixz.'report',ixz.'reset',ixz . 'exbans');
 $specials = ''; 
 foreach($array as $lp){
 if (strpos($parseline, $lp) !== false)
	$specials = 1; }
}
?>
