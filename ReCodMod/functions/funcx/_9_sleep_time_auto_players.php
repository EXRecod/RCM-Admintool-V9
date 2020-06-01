<?php
if ($plyr_cnt <= 4)$spps = 195000;else if ($plyr_cnt <= 6)$spps = 160000;else if ($plyr_cnt <= 14)$spps = 100000;else if ($plyr_cnt <= 20)
$spps = 90000;else if ($plyr_cnt <= 30)$spps = 80000;else if ($plyr_cnt <= 40)$spps = 60000;else if ($plyr_cnt <= 50)$spps = 50000;
else if ($plyr_cnt <= 64)$spps = 40000;else if ($plyr_cnt <= 128)$spps = 20000;   
  
  
  if ($bck2 == 0)
   {
    if ($spps != 721000)
     {
      if ($spps != 221000)
       {
		   
		 if ((empty($player_cnt)) || ($player_cnt < 2) )
         {
          $player_cnt = 2;
		  $xmoretime = 200;
         }  
		 else{ $xmoretime = 1; }
	 
       }
     }
   }