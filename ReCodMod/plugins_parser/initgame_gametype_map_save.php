<?php
 if (preg_match('/\bg_gametype\b\W*\b(.+)/iu', $parseline, $match)) {
    $wfnd = $match[1];
    $gamettt = explode('\gamename', $wfnd);	
	 //echo "\n\n".$egtxrun = $gametypek[0];
	 //echo "\n".$egtxrun = $gametypek[1]; 
$lll = preg_replace("/\W*\b/iu", "%%", $gamettt[0]);
if (strpos($lll, '%') !== false) { 
	$gametypek = explode('%%', $lll);	
	echo "\n gametype: ".$egtxrun = $gametypek[1];
	
	$ggtype = $log_folder.'/g_gametype_'.$server_ip.'_'.$server_port.'.log';
	
	$fp = fopen($ggtype, 'w+');
    fwrite($fp, $egtxrun);
    fclose($fp);
	
	}}


if (preg_match('/\bmapname\b\W*\b(.+)/iu', $parseline, $match)) {
    $wfndh = $match[1];
	$mapttt = explode('\protocol', $wfndh);	
	//echo "\n\n".$emaprun = $mapnamek[0];}	
$lllc = preg_replace("/\W*\b/iu", "%%", $mapttt[0]);
if (strpos($lllc, '%') !== false) {	 
	$hhjkc = explode('%%', $lllc);	
	echo "\n map: ".$emaprun = $hhjkc[1];
}
}
 
////////////////////////////////////////////////////////////////////////////////////////////////
 if(!empty($maps_array))
 { 
	 
if (!array_key_exists(''.$emaprun.'', $maps_array)) {
          $maps_array[''.$emaprun.''][0][0][0] = ''.$egtxrun.'';
}  
   }
     else $maps_array[''.$emaprun.''][0][0][0] = ''.$egtxrun.'';     
////////////////////////////////////////////////////////////////////////////////////////////////
 
 
?>
 

