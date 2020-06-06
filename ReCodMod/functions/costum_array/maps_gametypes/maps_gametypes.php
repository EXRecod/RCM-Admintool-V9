<?php
///////////////////////////////////////////////////////MAPS
function mpt($string) {
$string = str_replace("harbor", "mp_harbor", $string);
$string = str_replace("carentan", "mp_carentan", $string);
$string = str_replace("lg", "mp_logging_mill", $string);
$string = str_replace("lm", "mp_logging_mill", $string);
$string = str_replace("pavlov", "mp_pavlov", $string);
$string = str_replace("abbey", "^5abbey", $string);
$string = str_replace("eisberg", "mp_eisberg", $string);
$string = str_replace("wawa", "wawa_3dAim", $string);
$string = str_replace("railyard", "mp_railyard", $string);
$string = str_replace("standoff", "xp_standoff", $string);
$string = str_replace("rocket", "mp_rocket", $string);
$string = str_replace("brecourt", "mp_brecourt", $string);
$string = str_replace("chateau", "mp_chateau", $string);
$string = str_replace("hurtgen", "mp_hurtgen", $string);
$string = str_replace("stalingrad", "mp_stalingrad", $string);
$string = str_replace("depot", "mp_depot", $string);
$string = str_replace("powcamp", "mp_powcamp", $string);
$string = str_replace("dawnville", "mp_dawnville", $string);
$string = str_replace("ship", "mp_ship", $string);
$string = str_replace("valley", "x_valley", $string);
$string = str_replace("burgundy", "mp_burgundy", $string);
$string = str_replace("westwall", "mp_westwall", $string);
return $string;
}
///////////////////////////////////////////////////////Gametypes
function gtt($string) {
$string = str_replace("actf", "actf", $string);
$string = str_replace("tdm", "tdm", $string);
$string = str_replace("htf", "htf", $string);
$string = str_replace("old", "^9old^5sdy", $string);
$string = str_replace("sd", "sd", $string);
$string = str_replace("sd", "^5sd", $string);
$string = str_replace("pam", "^5pam", $string);
$string = str_replace("pam", "pam", $string);
$string = str_replace("dem", "dem", $string);
$string = str_replace("rsd", "rsd", $string);
$string = str_replace("bash", "bash", $string);
$string = str_replace("osd", "^9old^5sd", $string);
$string = str_replace("gg", "gg", $string);
return $string;
}



function maprename($string) {
	global $language;
	if ($language == 'ru') {
		$list_of_maps[] = 'mp_convoy Засада';
		$list_of_maps[] = 'mp_backlot Площадка';
		$list_of_maps[] = 'mp_bloc Блок';
		$list_of_maps[] = 'mp_bog Болото';
		$list_of_maps[] = 'mp_broadcast Станция'; //1.6
		$list_of_maps[] = 'mp_carentan Чайнтаун'; //1.6
		$list_of_maps[] = 'mp_countdown Отчет';
		$list_of_maps[] = 'mp_crash Крушение';
		$list_of_maps[] = 'mp_creek Бухта'; //1.6
		$list_of_maps[] = 'mp_crossfire Перестрелка';
		$list_of_maps[] = 'mp_citystreets Район';
		$list_of_maps[] = 'mp_farm Ливень';
		$list_of_maps[] = 'mp_killhouse Мясорубка'; //1.6
		$list_of_maps[] = 'mp_overgrown Офис';
		$list_of_maps[] = 'mp_pipeline Трубопровод';
		$list_of_maps[] = 'mp_shipment Отправление';
		$list_of_maps[] = 'mp_showdown Занавес';
		$list_of_maps[] = 'mp_strike Удар';
		$list_of_maps[] = 'mp_vacant Офис';
		$list_of_maps[] = 'mp_cargoship Мокрое дело';
		$list_of_maps[] = 'mp_crash_snow Снежное крушение'; //1.4
		
	}
	else {
		$list_of_maps[] = 'mp_convoy Ambush';
		$list_of_maps[] = 'mp_backlot Backlot';
		$list_of_maps[] = 'mp_bloc Bloc';
		$list_of_maps[] = 'mp_bog Bog';
		$list_of_maps[] = 'mp_broadcast Broadcast'; //1.6
		$list_of_maps[] = 'mp_carentan Chinatown'; //1.6
		$list_of_maps[] = 'mp_countdown Countdown';
		$list_of_maps[] = 'mp_crash Crash';
		$list_of_maps[] = 'mp_creek Creek'; //1.6
		$list_of_maps[] = 'mp_crossfire Crossfire';
		$list_of_maps[] = 'mp_citystreets District';
		$list_of_maps[] = 'mp_farm Downpour';
		$list_of_maps[] = 'mp_killhouse Killhouse'; //1.6
		$list_of_maps[] = 'mp_overgrown Overgrown';
		$list_of_maps[] = 'mp_pipeline Pipeline';
		$list_of_maps[] = 'mp_shipment Shipment';
		$list_of_maps[] = 'mp_showdown Showdown';
		$list_of_maps[] = 'mp_strike Strike';
		$list_of_maps[] = 'mp_vacant Vacant';
		$list_of_maps[] = 'mp_cargoship Wet Work';
		$list_of_maps[] = 'mp_crash_snow Winter Crash'; //1.4
		
	}
	foreach ($list_of_maps as $pmpl) {
		if (strpos($pmpl, $string) !== false) {
			//$pmpl = explode(" ", $pmpl);
			//return $pmpl[1];
			return $pmpl;
		}
	}
}

?>