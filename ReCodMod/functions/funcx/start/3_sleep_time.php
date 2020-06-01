<?php
//[$egtxrun/$g_gametype]
if(!empty($egtxrun))
{
$ggstyle = $egtxrun;
}
else if(!empty($g_gametype))
{
$ggstyle = $g_gametype;	
}
else
$ggstyle = 0;	


if($ggstyle == 'dm')
{
	$delimx = 4;
	$delimxm = -2;
}
else if($ggstyle == 'gg')
	{
	$delimx = 4;
	$delimxm = -2;
	}
else if($ggstyle == 'gungame')
	{
	$delimx = 4;
	$delimxm = -2;
	}
else if($ggstyle == 'zom')
	{
    $delimx = 4;
	$delimxm = -2;
	}
else
{
	$delimx = 1;
	$delimxm = 0;
}
  
if((!empty($ggstyle))&&(!empty($limitsoff)))
{
   
$plyr_cnt = count($limitsoff);  
  
  if (empty($plyr_cnt))
  {
    $spps = 721000;
  }
if ($plyr_cnt == 1)
    $spps = 80000;
else if ($plyr_cnt == 2)
    $spps = 980000/$delimx;
else if ($plyr_cnt == 3)
    $spps = 724200/$delimx;
else if ($plyr_cnt == 4)
    $spps = 695000/$delimx;
else if ($plyr_cnt == 5)
    $spps = 650000/$delimx;
else if ($plyr_cnt == 6)
    $spps = 495000/$delimx;
else if ($plyr_cnt == 7)
    $spps = 380000/$delimx;
else if ($plyr_cnt == 8)
    $spps = 220000/($delimx-$delimxm);
else if ($plyr_cnt == 9)
    $spps = 200000/($delimx-$delimxm);
else if ($plyr_cnt == 10)
    $spps = 180000/($delimx-$delimxm);
else if ($plyr_cnt == 11)
    $spps = 160000/($delimx-$delimxm);
else if ($plyr_cnt == 12)
    $spps = 150000/($delimx-$delimxm);
else if ($plyr_cnt == 13)
    $spps = 120000/($delimx-$delimxm);
else if ($plyr_cnt == 14)
    $spps = 100000/($delimx-$delimxm);
else
	$spps = 68000; 
  
 // echo '========================'.count($limitsoff).'======================================'.$spps;
}
else 
require $cpath . 'ReCodMod/functions/funcx/player_cnt_sleep_limiters.php';
  
  
  usleep($spps);
  
 ?>