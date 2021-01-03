<?php
if ((strpos($parseline, " J;") !== false)||((strpos($parseline, 'IP;') !== false)&&(strpos($parseline, '<=>') !== false))) {
$ipadddr = ''; $ipadrx = ''; $kills_ip = '';
//ALTER TABLE `banip` ADD UNIQUE KEY `ip` (`ip`);
//UPDATE `banip`set `patch`= 1;
//ALTER TABLE `banip` CHANGE `patch` `patch` INT(6) NOT NULL;


if (empty($stats_array[$conisq]['welcometimer']))
	      $stats_array[$conisq]['welcometimer'] = time();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
$banned_kick =    1;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if($banned_kick  == 1)
{
if ((strpos($parseline, 'IP;') !== false)&&(strpos($parseline, '<=>') !== false))
{
  list($noon, $guid, $cod4xip, $idk, $nickname) = explode(';', $parseline);
  list($ipadddr) = explode(':', $cod4xip);
}
else
  list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
 
if(!empty($ipadddr))
{	
  if(empty($stats_array[$conisq]['ip_adress']))
  {
	  $stats_array[$conisq]['ip_adress'] = $ipadddr;
	  $ipadrx = $ipadddr;
  }
}
else if(!empty($stats_array[$conisq]['ip_adress']))
	 $ipadrx = $stats_array[$conisq]['ip_adress'];
 
 
 if (empty($ipadrx)) {
 $rconExplode = rconExplode($guid);
if(!empty($rconExplode))
{
list($i_pingо,$ipadrx,$i_nameо,$i_guidо,$xxccodeо,$cityо,$countryо) = explode(';', $rconExplode);
	  $stats_array[$conisq]['ip_adress'] = $ipadrx;
 }}
  			
if(!empty($ipadrx))
{				
			  list($onem, $twom, $threem, $fourm) = explode(".", $ipadrx);
              $rangeip = $onem.'.'.$twom;
  
  

			  $sqlthree = "select guid,ip,iprange,reason from banip WHERE ip = '" . $rangeip . "' and reason = 'IP RANGE BAN' limit 1";
              $xx = dbLazy('', $sqlthree);
              if (is_object($xx)) foreach ($xx as $keym => $value) {
                if ($keym == 'ip') $kills_ip = $value;
              }				  
			  
			if (empty($kills_ip)) {  
			  $sqltwo = "select guid,ip,iprange,reason from banip WHERE ip = '" . $ipadrx . "' and reason = 'IP BAN' limit 1";
              $xx = dbLazy('', $sqltwo);
              if (is_object($xx)) foreach ($xx as $keym => $value) {
                if ($keym == 'ip') $kills_ip = $value;
              }
			} 
			
			if(!empty($kills_ip))
			{
	            echo 'kicked';
                xcon('clientkick ' . $idk, '');
			}
				
}
}

}
?>