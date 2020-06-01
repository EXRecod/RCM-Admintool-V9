<?php
 	if (!empty($db))
     $db = NULL;
	if (!empty($db1))
     $db1 = NULL;
	if (!empty($db2))
     $db2 = null;
	if (!empty($db3))
     $db3 = NULL;
	if (!empty($db4))
     $db4 = NULL;
	if (!empty($db5))
     $db5 = NULL;		  
	if (!empty($stat))	  
     $stat = null;
	if (!empty($dbw3))
     $dbw3  = null;
	if (!empty($dbm3day))
     $dbm3day  = null;
	if (!empty($result))
     $result = null; 
	if (!empty($msqlconnect))
	 $msqlconnect = null;  
	if (!empty($vdbm3day))
     $vdbm3day = null;
	if (!empty($statv))
     $statv = null; 
	if (!empty($re))
     $re = null; 
 	if (!empty($si))
     $si = null; 
 	if (!empty($uo))
     $uo = null; 
 	if (!empty($db3))
     $db3 = null; 
 	if (!empty($dbc))
     $dbc = null;  
 	if (!empty($dbm3))
     $dbm3 = null;
 	if (!empty($st))
     $st = null; 
 	if (!empty($bdd))
     $bdd = null; 
 	if (!empty($rex))
     $rex = null;
 	if (!empty($xl))
     $xl = null; 
 	if (!empty($queryv)) 
     $queryv = null;
 	if (!empty($qc)) 
     $qc = null;
 	if (!empty($resultx)) 
     $resultx = null;
 	if (!empty($statt)) 
     $statt = null; 
 	if (!empty($statsf)) 
     $statsf = null;
 	if (!empty($reponse)) 
     $reponse = null; 
 	if (!empty($vdbw3x)) 
     $vdbw3x = null; 
  	if (!empty($vdbm3dayx)) 
     $vdbm3dayx = null; 
  	if (!empty($res)) 
     $res = null;
  	if (!empty($rowx)) 
     $rowx = null;
// закрытие соединения
  		if (!empty($conn_id)){
			if (is_resource($conn_id)){
           ftp_close($conn_id); 
	}}