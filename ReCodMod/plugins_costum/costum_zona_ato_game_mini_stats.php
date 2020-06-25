<?php
/*  """""""""""""""""            KILLS       DEATHS       SKILL          """""""""""""""""   */
//  17876:29 J;2310346615247876621;18;cuccli
  
/*  """""""""""""""""     блок основной системы навыка       """""""""""""""""   */
//  $block_skill = 1;     // 1 - блок основной(включение плагина) 0 - основная система навыка (офф плагина)    
    $block_skill = 0; 
  
if($block_skill == 1)
{	
 if (strpos($parseline, " Q;") !== false){
 $nickname = ''; $idk = ''; $guid = '';
  list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
 if(!empty($guid)){	 
if (strlen($guid) == 17 )
 $rest = substr($guid, 9); 
else
 $rest = substr($guid, 11);
 
if((int)$rest){
	$file  =  dirname($mplogfile).'/playerInfo/'.$rest.'.db';
if (file_exists($file)) {
	$lines = file($file);		
 foreach ($lines as $line_num => $line) {	
$line = preg_replace("/[^a-z0-9'-_. ]/i", '~', $line);
//status~default~style~default~kills_id~1110~screenshots_id~296~deaths_id~803~prestige_all~33~lang~IT~skill_id~156.115~m_skill_id~-98.8775~ranked_id~37~~
if (strpos($line, "kills_id~") !== false){  
  list($emp,$stat0) = explode("kills_id~", $line);
  list($kills) = explode("~", $stat0);
}else $kills = 0;
if (strpos($line, "deaths_id~") !== false){  
  list($emp,$dth0) = explode("deaths_id~", $line);
  list($deaths) = explode("~", $dth0);
}else $deaths = 0; 
if (strpos($line, "skill_id") !== false){  
  list($emp,$skl0) = explode("skill_id~", $line);
  list($skill) = explode("~", $skl0);
}else $skill = 1000;
}
if (strpos($line, "kills_id") !== false){
	 
	try {
       $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
       if (empty($msqlconnect))		   
         $msqlconnect = new PDO($dsn, db_user, db_pass); 
  $db3 = $msqlconnect; 
  
                ///////////////////////////  ВАЖНО! ИНДEНТИФИКАТОР ИГРОКА  ////////////////////////////////////	   
					   $shid     = trim($server_port . $guid);
                     //$shid     = CRC16::calculate($shiddeath); //БЫЛА ИДЕЯ НА CRC16 / 50% МЕНЬШЕ БД
                       $shid     = dbGuid(4).(abs(hexdec(crc32($shid))));
                ///////////////////////////  ВАЖНО! ИНДEНТИФИКАТОР ИГРОКА  ////////////////////////////////////
		 
//$sql = "INSERT INTO db_stats_1 (s_pg,s_kills,s_deaths,s_heads,s_suicids,s_fall,s_melle,s_dmg) VALUES ('$shid','0','0','0','0','0','0','0')ON DUPLICATE KEY UPDATE s_pg='" . $shid . "', s_kills='" . $kills . "',s_deaths='" . $deaths . "'";	
//$sql = "UPDATE db_stats_1 SET s_kills=" . $kills . ",s_deaths=" . $deaths . " where s_pg='" . $shid . "'";
//$query1 = $db3->query($sql);
//$query1 = null;
 

if(!empty($skill)){
	$skill = $skill*10;
		 
//$sql = "INSERT INTO db_stats_2 (s_pg,s_port,w_place,w_skill,w_ratio,w_geo,w_prestige,w_fps,w_ip,w_ping,n_kills,n_deaths,n_heads,n_kills_min,n_deaths_min) VALUES ('" . $shid . "','$svipport','0','1000','0','','0','0','','0','0','0','0','0','0')ON DUPLICATE KEY UPDATE s_pg='" . $shid . "', w_skill='" . ((float)$skill*10) . "'";	
$sql = "UPDATE db_stats_2 SET w_skill=" . $skill . " where s_pg='" . $shid . "'";
$query2 = $db3->query($sql);
$query2 = null;}
$db3 = null;
    if (!file_exists($cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/')) {
        if (!file_exists($cpath . 'ReCodMod/databases/stats_register/')) mkdir($cpath . 'ReCodMod/databases/stats_register/', 0777, true);
        mkdir($cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/', 0777, true);
    } 
                $attacker_skill = search_values($shid, 'scores', 'skill', $stats_array);
                /////////////////////////////////////////// skill attacker    start  ////////////////////////////////////////////
                if (empty($attacker_skill)) {
                    if (!empty($attacker_skill = get_skill_from_log($shid, $server_ip, $server_port))) $istatl = 1;
                    else {
                        if (empty(get_skill_from_log($shid, $server_ip, $server_port))) {
                            $player_skill_reg = $cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/ID_SPG_' . $shid . '.log';
                            if (!file_exists($player_skill_reg)) touch($player_skill_reg);
                        }
                    }
                    if (empty($attacker_skill)) $attacker_skill = get_skill_from_database($shid);
                    if (!empty($attacker_skill = get_skill_from_log($shid, $server_ip, $server_port))) $istatl = 1;
                
                    $stats_array[$shid]['scores;skill'] = 1000;
                    $attacker_skill = 1000;				
				}
				
                if (!empty($skill))
               $stats_array[$shid]['scores;skill'] = $skill;  
 

     }
    catch(PDOException $e) {
     errorspdo('[' . $datetime . '] 38  ' . __FILE__ . '  Exception : ' . $e->getMessage());
 }}}}}
   $kills  = ''; $stat0 = ''; $deaths  = ''; $dth0 = ''; $skill  = ''; $skl0 = '';
}}
?>