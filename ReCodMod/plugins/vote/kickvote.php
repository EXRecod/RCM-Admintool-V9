<?php	
if ($x_stop_lp == 0 ) {

if (strpos($msgr, $ixz.'k ') !== false)
{
  echo "\n[cmk] : [",$datetime, "] : ".$nickr." : ".$msgr;   
//*//	
	$xtee = date("dmYHis");
try
  {
 if(empty($Msql_support))
{
 
        if (empty($adminlists))
            $db1 = new PDO('sqlite:' . $cpath .  'ReCodMod/databases/db1.sqlite');
        else
            $db1 = new PDO('sqlite:' . $adminlists);
               
} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass, $opt); $db1 = $msqlconnect;
 
   }
    $result = $db1->query("SELECT * FROM x_cmd_kck");
 
    foreach($result as $row)
    {
$xbm = $row['z_time'];	 
$xbb = $row['z_counts'];	
 }
 $razn = $xtee - $xbm;

 if($razn > 50) 
  {
  VoteCashreset("null");
  }
 
 //*///
$fd = fopen($rules_log_vote, "r");
$bufer = fread($fd, filesize($rules_log_vote));
fclose($fd);    
 
$strtmp = explode("\n", $bufer); 

$v = $nickr;
 
foreach($strtmp as $word) {
if($v == $word){

require $cpath.'ReCodMod/functions/inc_functions2.php';
//for ($i=0; $i<1; $i++)
	{
//require $cpath  .  'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
if ((! $valid_id) || (! $valid_ping)) Continue; 
/////////////////////////////////////////////////////////////////////////////////KICK
$nickr = trim(clearnamex($i_name));
	  
		rcon('say ^3Voted!', '');
	}	
		
echo '  golosoval  '.$tfinishh = (microtime(true) - $start);

 echo "" .$v. "\n";

sqlite_close($db); sqlite_close($db2); sqlite_close($db3); sqlite_close($db4);	
require $cpath . 'ReCodMod/functions/null.php'; return;}
}
$vote_cgu = 0;		
$x_number = 0;	
require $cpath.'ReCodMod/functions/inc_functions2.php';
foreach ($rconarray as $j => $e)
	{
//require $cpath  .  'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
if ((! $valid_id) || (! $valid_ping)) Continue; 
/////////////////////////////////////////////////////////////////////////////////KICK
$nickr = trim(clearnamex($i_name));
$x_nickx = trim(clearnamex($nickr));
$findgi3   = $ixz.'k ';
$posvok3 = strpos($msgr, $findgi3);
if ($posvok3 !== false) { 
   $xtee = date("dmYHis");
 list($x_cmd, $idgz) = explode(' ', $msgr); 	

 $inamex = clearSymbols($i_name);	
  $oo = $i_id . ' / ' . $inamex . ' / ' . $i_ip . ' / ' . $i_ping;
	$x_kk = explode(" / ", $oo); 	  
    foreach($result as $row)
    {
$xbm = $row['z_time'];	 
$xbb = $row['z_counts'];	
 }
	  if($x_kk[0] == $idgz)
	     {	
$votm = "";
$razn = $xtee - $xbm;
///////////////////////////////////////////VOTE
if($player_cnt = 2)
$plgg = 5;
if($player_cnt = 3)
$plgg = 2;
else if($player_cnt = 4)
$plgg = 2;
else if($player_cnt = 5)
$plgg = 2;
else if ($player_cnt = 6)
$plgg = 3;
else if ($player_cnt = 7)
$plgg = 3;
else if ($player_cnt = 8)
$plgg = 3;
else if ($player_cnt = 9)
$plgg = 3;
else if($player_cnt > 10)
$plgg = round(($player_cnt/4)+1);

if(($razn < 50) && ($xbb < $plgg)) 
  {
    $razn = $xtee - $xbm;
  $razn2 = (50 - $razn); 
  $db1->exec("UPDATE x_cmd_kck SET z_counts=z_counts +1");
  
  rcon('say '. $votm . ' "^2Vote: ^7'.$ixz.'k '.$idgz.'"^1Kick^5 '.$inamex.' ^8Seconds Left:^3 '.$razn2.'', '');	 
VoteCash("".$nickr."");	
  }
      else if(($razn < 50) && ($xbb >= $plgg))   
  { 
	
	rcon('clientkick '. $idgz, '');
	AddToLog("[".$datetime."] KICK: " . $i_ip . " (" . $nickr . ") (" . $i_id . ") BY: (" . $nickr . ")  R ");    
  $xcnnn = 0;
  $xtee = date("dmYHis");
  $db1->exec("UPDATE x_cmd_kck SET z_counts='{$xcnnn}',z_time='{$xtee}'");
VoteCashreset("".$nickr."");
	++$x_number; 	 
  }
      else if($razn > 50) 
  {
  $xcnnn = 0;	
  $xtee = date("dmYHis");
  $db1->exec("UPDATE x_cmd_kck SET z_counts='{$xcnnn}',z_time='{$xtee}'");

  rcon('say '. $votm . ' "^2Vote Activated!: ^7'.$ixz.'k '.$idgz.'"^1<- Vote: to Kick^5 '.$inamex.'', ''); 
VoteCashreset("".$nickr."");
  } 
	}
} 
/////////////////////////////////////////////////////////////////////////////////KICK 
  }   ///end loop
 echo '    '.$tfinishh = (microtime(true) - $start);
++$x_stop_lp;    //return;
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }

}
}
?>
 
