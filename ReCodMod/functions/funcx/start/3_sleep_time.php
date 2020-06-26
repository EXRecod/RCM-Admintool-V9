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
		if($m=='damage;damage')
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
		  
				if (!empty($server_array)){
				    if($server_array['KILLStimer'][$keyhm] > 10){
						$spps = 30000;
				}}						
  if(empty($counts))
	 $spps = 1000000; 
  usleep($spps);
 ?>