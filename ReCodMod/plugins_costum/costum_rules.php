<?php
 
if (strpos($parseline, "J;") !== false)
        {
		 
    $counttdot = substr_count($parseline, ';');
            if ($counttdot == 2)
    list($noon, $idk, $nickname) = explode(';', $parseline);
  else
    list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
  if (empty($guid))
    $guid = '0';
  
  $nickname = htmlentities($nickname);

$allplugs = getDirContents($cpath . 'cfg/');
foreach ($allplugs AS $va)
  {
  if (strpos($va, '.ini') !== false)
    { 
$ini_array = parse_ini_file($va, true);
foreach($ini_array as $construct => $gq)
{   
  $a = 0;
foreach($gq as $const => $stringq)
{	
		if(!is_array($stringq))
		{
   if(($const.$stringq)==("enable1"))
  {
    if(($construct)==("rules"))
	   $a = 1;	
  }
  else if($a == 1)
  {
	  
	  echo "\n[RULES]_".$construct;	
	  
	if($const=="rcon")
	 //$c = explode(",", $stringq);
       $c = $stringq;

	if (strpos($const, 'message') !== false)
	 {	
    $stringq = str_replace("{PLAYERNAME}", htmlentities($nickname), $stringq);
	$stringq = str_replace("{CMD_STRING}", htmlentities(ixz), $stringq);
	
	//
      xcon($c.' '.$idk.' '.$stringq.'', ''); 
/*	
	if($c != 'tell')
	{
	
      xcon('tell '.$idk.' '.$stringq.'', ''); 
	}
*/	
  }		 }
     }	
    }  
   }	
  }
}
		}