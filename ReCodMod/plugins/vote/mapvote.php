<?php	
if ($x_stop_lp == 0 ) {
if ((strpos($msgr, ixz.'mpx ') !== false) || ($msgr == $cmdyes) || ($msgr == $cmdyes.$cmdyes))
{
  echo "\n[cmk-x] : [",$datetime, "] : ".$nickr." : ".$msgr;   
//*//	
 $xtee = date("dmYHis");
 
 if(!file_exists($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_z-vote-map.log')) 
  touch($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_z-vote-map.log');

 if(!file_exists($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_temp_mapvote.txt')) 
  touch($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_temp_mapvote.txt');
 
try
  {
 if(empty(SqlDataBase))
{
 
        if (empty($adminlists))
            $db1 = new PDO('sqlite:' . $cpath .  'ReCodMod/databases/db1.sqlite');
        else
            $db1 = new PDO('sqlite:' . $adminlists);
                
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db1 = $msqlconnect;
 
   }
    $result = $db1->query("SELECT * FROM x_cmd_kck");
 
    //$db1->exec("UPDATE x_cmd_kck SET z_counts='1',z_time='04052016143316'");

    foreach($result as $row)
    {

$xbm = $row['z_time'];
echo '==='.$xbm;	 
$xbb = $row['z_counts'];	
 }
if (!empty($xbb))
$razn = $xtee - $xbm;
else
$razn = 30;

 if($razn > $v_time_map) 
  {
  VoteCashresetMap("null");
$fh=fopen($log_cash."/".$server_ip."_".$server_port."_temp_mapvote.txt" ,"w+");
fwrite($fh, $nickr.'%null');
fclose($fh);  
  
  }
 
 //*///
$fd = fopen($rules_log_vote_map, "r");
$bufer = fread($fd, filesize($rules_log_vote_map));
fclose($fd);    
$strtmp = explode("\n", $bufer); 
 //list($nickr, $msgr) = explode(' % ', $parselinetxt); 
$v = $nickr;
//$v = trim($v);
//РїСЂРѕРІРµСЂСЏРµРј РµСЃС‚СЊ Р»Рё РїСЂРѕРІРµСЂРѕС‡РЅРѕРµ СЃР»РѕРІРѕ РІ РјР°СЃСЃРёРІРµ
foreach($strtmp as $word) {
if($v == $word){
 


require $cpath.'ReCodMod/functions/inc_functions2.php';
//for ($i=0; $i<1; $i++)
	{
//require $cpath  .  'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
if ((! $valid_id) || (! $valid_ping)) Continue; 
/////////////////////////////////////////////////////////////////////////////////RESTART
$nickr = trim(clearnamex($i_name));
	  
	  rcon('say ^7'.$nickr.' ^3VOTED, It is useless to make repeat!', '');
	}	
 

		
echo '  golosoval  '.$tfinishh = (microtime(true) - $start);

 echo "" .$v. "\n";

}
}


$vote_cgu = 0;		
$x_number = 0;	
require $cpath.'ReCodMod/functions/inc_functions2.php';
foreach ($rconarray as $j => $e)
	{
//require $cpath  .  'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
if ((! $valid_id) || (! $valid_ping)) Continue; 
/////////////////////////////////////////////////////////////////////////////////RESTART
$nickr = trim(clearnamex($i_name));
$x_nickx = trim(clearnamex($nickr));
$findgi3   = ixz.'xmap ';
$posvok3 = strpos($msgr, $findgi3);
if (($posvok3 !== false) || ($msgr == $cmdyes) || ($msgr == $cmdyes.$cmdyes)) { 
   $xtee = date("dmYHis");
   
   //echo 'ye!';
   
 if (($msgr == $cmdyes) || ($msgr == $cmdyes.$cmdyes))
{
$fhr=file($log_cash."/".$server_ip."_".$server_port."_temp_mapvote.txt");
foreach ($fhr as $flinx) {
$flmc=explode("%",$flinx);
$idgz = $flmc[1];
}

} 
else
 list($x_cmd, $idgz) = explode(' ', $msgr);   // !RESTART 5 ( 5 = id)	
 
  if (strpos($msgr, $cmdyes)!== false)
{
$fhr=file($log_cash."/".$server_ip."_".$server_port."_temp_mapvote.txt");
foreach ($fhr as $flinx) {
$flmc=explode("%",$flinx);
$x_mapname = $flmc[1];
}

} 
else
 list($x_cmd, $x_mapname) = explode(' ', $msgr);   // !map carentan 
 

//
//$getinf = 'sv_mapRotation';
//require $cpath.'ReCodMod/functions/getinfo/_main_getinfo.php';
//fclose($connx);

/*$x_mpt = $x_mapname;


if (preg_match("/$x_mapname/i", $maps)) {
     echo '====='.$x_mpt;
	 $x_newmapz = $x_mpt;

}else { 
if ($x_stop_lp == 0 ) {
$x_newmapz = '^1False Map!';   

$maps = preg_replace('/(\b[\pL0-9]++\b)(?=.*?\1)/siu', '', $maps);
rcon('say ^1False! ^2Only: ^7'.$maps.'', ''); ++$x_stop_lp;
} 
}
*/

$x_mpt = mpt($x_mapname);
if(mapmprs($x_mapname) == $x_mapname || $x_mpt == 'mp_harbor' || $x_mpt == 'mp_carentan' || $x_mpt == 'mp_logging_mill'
|| $x_mpt == '^5abbey'|| $x_mpt == 'mp_pavlov'|| $x_mpt == 'mp_hurtgen'
|| $x_mpt == 'mp_railyard'|| $x_mpt == 'mp_eisberg'|| $x_mpt == 'xp_standoff'
|| $x_mpt == 'mp_rocket'|| $x_mpt == 'mp_brecourt'|| $x_mpt == 'mp_chateau'
|| $x_mpt == 'mp_ship' || $x_mpt == 'mp_depot'|| $x_mpt == 'mp_powcamp'
|| $x_mpt == 'mp_dawnville' || $x_mpt == 'x_valley' || $x_mpt == 'mp_burgundy'){
     echo '====='.$x_mpt;
	 $x_newmapz = $x_mpt;
}else { $x_newmapz = '^1False Map!';   } 


 $inamex = clearSymbols($i_name);	
  $oo = $i_id . ' / ' . $inamex . ' / ' . $i_ip . ' / ' . $i_ping;
	$x_kk = explode(" / ", $oo); 	   
	$result = $db1->query("SELECT * FROM x_cmd_kck");
    foreach($result as $row)
    {
$xbm = $row['z_time'];	 
echo 'vvvvvvvvvvvvvv '.$xbb = $row['z_counts'];		
	} 
	  
if($x_votg == 0)
	     {	
$votm = "";
$razn = $xtee - $xbm;
///////////////////////////////////////////VOTE
if($player_cnt == 0)
$plggx = 1;
else if($player_cnt == 1)
$plggx = 1;
else if($player_cnt == 2)
$plggx = 2;
else if($player_cnt == 3)
$plggx = 2;
else if($player_cnt == 5)
$plggx = 3;
else if($player_cnt == 6)
$plggx = 4;
else if($player_cnt == 7)
$plggx = 4;
else if($player_cnt == 8)
$plggx = 5;
else if($player_cnt == 9)
$plggx = 5;
else if($player_cnt == 10)
$plggx = 6;
else if($player_cnt == 11)
$plggx = 6;
else if($player_cnt == 12)
$plggx = 7;
else if($player_cnt == 13)
$plggx = 7;
else if($player_cnt == 14)
$plggx = 7;
else if($player_cnt == 15)
$plggx = 8;
else if($player_cnt >= 16)
$plggx = round($player_cnt/3);

if(($razn < $v_time_map) && (strpos($msgr,ixz.'xmap ') !== false)) 
  {  
  
  $xcnnn = 0;	
  $xtee = date("dmYHis");
  $db1->exec("UPDATE x_cmd_kck SET z_counts='$xcnnn',z_time='$xtee'");
  
  rcon('say '. $votm . ' "^2Vote reset. Dont use '.ixz.'xmap command in vote time!', '');

$fh=fopen($log_cash."/".$server_ip."_".$server_port."_temp_mapvote.txt" ,"w+");
$hg12 = '----.';
fwrite($fh, $hg12.'%'.$hg12);
fclose($fh); 
  
VoteCashresetMap("null"); 
++$x_stop_lp;    //return;
  }
  
  if ($x_newmapz == '^1False Map!')
  {
  

 if (($msgr == $cmdyes) || ($msgr == "++") || ($msgr == "+++")){
  rcon('say ^2Vote time is over, get starting vote with ^7'.ixz.'xmap ^2command!', '');
 }else{
  //rcon('say '. $votm . '"'.$x_newmapz.'" - ^1Map^3 Dosnt Exist!!!', '');	
}

  }else{


if(($razn < $v_time_map) && ($xbb < $plggx)) 
  {
    $razn = $xtee - $xbm;
  $razn2 = ($v_time_map - $razn); 
 $db1->exec("UPDATE x_cmd_kck SET z_counts=z_counts +1");
  
  rcon('say '. $votm . ' "^2Vote: ^7"'.$cmdyes.'" ^2for ^7 '.$idgz.'"^1Map^5  ^8Seconds Left:^3 '.$razn2.'', '');	 
VoteCashMap("".$nickr."");	
  }
      else if(($razn < $v_time_map) && ($xbb >= $plggx))   
  { 
    usleep($sleep_rcon*5);
    rcon('say ^3Vote completed!', '');
    usleep($sleep_rcon*5);
    rcon('say ^3Players changed map to '.$x_newmapz, '');
		
if ($x_mpt == 'wawa_3dAim')
{

rcon('set g_gametype '.$mapfix.'', '');
}	sleep(1);	
    rcon('map '. $x_newmapz, '');
	
		//AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ^3Players changed map to $x_newmapz</font> "); 
	AddToLog("[".$datetime."] MAPVOTE: " . $i_ip . " (" . $nickr . ") (" . $i_id . ") BY: (" . $nickr . ")  R ");    
  $xcnnn = 0;
  $xtee = date("dmYHis");
 $db1->exec("UPDATE x_cmd_kck SET z_counts='$xcnnn',z_time='$xtee'");
VoteCashresetMap("null");
	++$x_number; 	 
  }
      else if($razn > $v_time_map) 
  {
  
  
$fh=fopen($log_cash."/".$server_ip."_".$server_port."_temp_mapvote.txt" ,"w+");
fwrite($fh, $nickr.'%'.$idgz);
fclose($fh);  
  
  $xcnnn = 0;	
  $xtee = date("dmYHis");
 $db1->exec("UPDATE x_cmd_kck SET z_counts='$xcnnn',z_time='$xtee'");
  
  rcon('say '. $votm . ' "^2Vote Activated!: ^7'.ixz.'xmap '.$idgz.'"^1<- Vote with ^7"'.$cmdyes.'"^2 or ^7'.$cmdnoo.' ^2for change to ^3'.$idgz.'', '');

if(1 == $plggx) 
  {
    
    rcon('say ^3You not alone with console, you changed map!', '');
    usleep($sleep_rcon*5); 
    rcon('say ^3You changed map to '.$x_newmapz, '');
    usleep($sleep_rcon*7); 
if ($x_mpt == 'wawa_3dAim')
{

rcon('set g_gametype '.$mapfix.'', '');
}	
else
{
sleep(1);	
    rcon('map mp_'.$x_newmapz, '');
}


}
 
VoteCashresetMap("".$nickr.""); //VoteCashreset("".$nickr."");


  }


  }
	
++$x_votg;	
	}
	
} 
/////////////////////////////////////////////////////////////////////////////////KICK 
  }   ///end loop
//fclose($connect);
//fclose($fpX);
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }

echo '    '.$tfinishh = (microtime(true) - $start);
++$x_stop_lp;    //return;

}
}
?>
 
