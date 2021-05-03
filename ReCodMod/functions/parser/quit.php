<?php  
if (strpos($parseline, " Q;") !== false) { 
 $x_stop_lpjk = 0;
 if ($x_stop_lp == 0) {
   
  if ($x_loopsv == 0) {
   $counttdot = substr_count($parseline, ';');
   if ($counttdot == 2) list($noon, $idk, $nickname) = explode(';', $parseline);
   else list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
   if (empty($guid)) $guid = '0';
   
                //Обновление статистики *Начало
				if(strpos($guid, 'bot') === false){
					if (!empty($guid)){
							$activate_opt = 2;
							$outofgame = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));
                            require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
				  unset($stats_array[$outofgame]);
				}}			
                //Обновление статистики *Конец
    
$nicknametrim = trim(clearnamex($nickname));
$searchnickname = $nicknametrim.'%'.$idk;

$antibotjoinX[''.$searchnickname.''] = ''.$nicknametrim.'';
$keylokX = array_search($nicknametrim, $antibotjoinX);
if(!empty($keylokX))
{
   $antijoin_explodeX = explode('%', $keylokX);
      $antijoin_id = $antijoin_explodeX[0];
	    $antijoin_gui = $antijoin_explodeX[1];
           //$antijoin_gui;
	           unset($antibotjoinX[$nicknametrim.'%'.$idk]);
}}
 //slowscript(__FILE__);
 
}  
						  if (!empty($stats_array[(dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))))]['user_status'])) 
                               unset($stats_array[(dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))))]['user_status']);
						  if (!empty($stats_array[(dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))))]['layerNUM'])) 
                               unset($stats_array[(dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))))]['layerNUM']);						   
		  echo "\n [Q;] guid:" , $guid , ' num:' , $idk , ' time: ' , $tfinishh = (microtime(true) - $start);
		  slowscript(__FILE__);
}
?>
