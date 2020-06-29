<?php
   
  if(!empty($stats_array))
  {
	 //$countx = count($stats_array);
     $xmoretime = 1;
 
$counts = 0;
foreach($stats_array as $f => $y)
{foreach($y as $m => $j)
{
	if(!is_array($m))
	{
		if($m=='guid')
			++$counts;
	}
}}	  
     if(!empty($counts))
	 $spps = ceil((900000/$counts));
 
  }
  else
    {
          $player_cnt = 2;
		  $xmoretime = 200;
		  $spps = 777000;
     }


usleep(33000);
if (strpos($mplogfile, 'ftp:') !== false)
{
list($ftp_q_user,$ftp_q_password,$ftp_q_ip,$ftp_q_url,$gmlobame) = explode('%', ftp2locallog($mplogfile));		 
$opp = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);	
if(file_exists($opp))
{
$resumeposftpy = file_get_contents($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt');	
$file_array =  file($opp);
$num_str =  count($file_array);
if((((int)$resumeposftpy)<((int)$num_str))&&((((int)$num_str))-(int)$resumeposftpy)>9)
{ 
		  $xmoretime = 1;
		  $spps = 1;	
}
else
{
          $xmoretime = 100;
		  $spps = 200000;	
} 
} 	
}
	 
/*
				if (!empty($server_array)){
				    if($server_array['KILLStimer'][$keyhm] > 10){
						$spps = 30000;
				}}
*/				
  if(empty($counts))
	 $spps = 1000000; 
  usleep($spps);
 ?>