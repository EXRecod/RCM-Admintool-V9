<?php

////////////////////////////
////////////////////////////
////////////////////////////
    $LoadSpeed = 40000;   //   20000 = 0.02 seconds
////////////////////////////
////////////////////////////
////////////////////////////

usleep($LoadSpeed);
if (strpos($mplogfile, 'ftp:') !== false)
{
list($ftp_q_user,$ftp_q_password,$ftp_q_ip,$ftp_q_url,$gmlobame) = explode('%', ftp2locallog($mplogfile));		 
$opp = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);	
if(file_exists($opp))
{
$resumeposftpy = file_get_contents($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos.txt');
$num_str = filesize($opp);

$minusposs = abs(((((int)$num_str))-(int)$resumeposftpy));

$spp = 1;

if($minusposs==0)
{ 
          $xmoretime = 100;
		  $spps = 700000;	
}   
else if(2000<$minusposs)
{ 
        $spps  = 1;
        $xmoretime = 1;	
		$spp = mt_rand(1, 2);
}
else if(2000>$minusposs)
{ 
          $xmoretime = 10;
		  $spps = ceil(($LoadSpeed*2)-10000);	
} 
 
} 	
}
else
{
if(file_exists($mplogfile))
{
$resumeposftpy = file_get_contents($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos.txt');
$num_str = filesize($mplogfile);
$minusposs = abs(((((int)$num_str))-(int)$resumeposftpy));
$spp = 1;
if($minusposs==0)
{ 
          $xmoretime = 100;
		  $spps = 700000;	
}   
else if(2000<$minusposs)
{ 
        $spps  = 1;
        $xmoretime = 1;	
		$spp = mt_rand(1, 2);
}
else if(2000>$minusposs)
{ 
          $xmoretime = 10;
		  $spps = ceil(($LoadSpeed*2)-10000);	
} 
} 	
}	
     $spp = 1; 
  //echo "\n\n\n Speed: ",(($LoadSpeed+$spps)/1000000)*$spp," sec. | minus: ",$minusposs, " memorypos: ",(int)$resumeposftpy, " log_poss: ",$num_str;

  usleep($spps*$spp);
?>