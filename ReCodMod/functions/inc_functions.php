<?php
 
$dircache = $cpath . "win_cache_ms/";
if (is_dir($dircache)) {
	$dircache = $cpath . "php/php.ini";
	if (!file_exists($dircache)) {
		if (!copy($cpath . 'ReCodMod/functions/php.ini', $cpath . 'php/php.ini')) echo " \n \033[37;1;41m  <<< NO COPY " . $cpath . "ReCodMod/functions/php.ini ... ! >>>   \n\n"; //red
		else echo " \n \033[38;5;15m  <<< COPY SUCCESS TO " . $cpath . "php/php.ini ... ! >>>   \n"; //
		
	}
}
if (empty($game_patch)) {
	function ghbfff($string) {
		$string = str_replace(array(
			"/^7"
		) , '', $string);
		$string = str_replace(array(
			"^7"
		) , '', $string);
		return $string . "";
		$game_patch                           = 'cod5';
	}
	if (file_exists($cpath . 'ReCodMod/cache/x_logs/g_gamename_' . $server_ip . '_' . $server_port . '.log')) {
		$fyf                                  = file($cpath . 'ReCodMod/cache/x_logs/g_gamename_' . $server_ip . '_' . $server_port . '.log');
		foreach ($fyf as $ryhfd) {
			$mpgamenname                          = ghbfff($ryhfd);
			if (file_exists($cpath . 'ReCodMod/cache/x_logs/g_shortversion_' . $server_ip . '_' . $server_port . '.log')) {
				$fyfx                                 = file($cpath . 'ReCodMod/cache/x_logs/g_shortversion_' . $server_ip . '_' . $server_port . '.log');
				foreach ($fyfx as $ryhfdv) {
					$mpshortver                           = ghbfff($ryhfdv);
					if (strpos($mpgamenname, '5') !== false) {
						$game_patch                           = 'cod5';
					}
					else if (strpos($mpgamenname, '4') !== false) {
						$game_patch                           = 'cod4';
					}
					else if (strpos($mpgamenname, '2') !== false) {
						$game_patch                           = 'cod2';
					}
					else if (strpos($mpgamenname, 'Call of Duty') !== false) {
						$game_patch                           = 'cod1_' . $mpshortver . '';
					}
					else {
						$game_patch                           = 'cod1_1.41';
					}
				}
			}
		}
	}
}
if (empty($game_patch)) $game_patch                           = 'codxxx';
$r_admi                               = false;
$ipt                                  = 0;
$rules_time_announce                  = array(
	0,
	5
); // everytime minute digits equal one of these, shows current time to all players;  // array() to disable
// settings
$filename                             = "error.log";
$log_folder                           = $cpath . "ReCodMod/cache/x_logs";
$log_cash                             = $cpath . "ReCodMod/cache/x_cache";
$rules_log_file1                      = $log_folder . '/' . $server_ip . '_' . $server_port . '_rcon-rules_commands.log';
$log_chat                             = $log_folder . '/' . $server_ip . '_' . $server_port . '_chat.log';
$log_chatcl                           = $log_folder . '/' . $server_ip . '_' . $server_port . '_chat.html';
$cnt_pl                               = $log_folder . '/' . $server_ip . '_' . $server_port . '_players_time_stats.log';
$rules_log_file                       = $log_folder . '/' . $server_ip . '_' . $server_port . '_kick_ban.log'; // path to a file containing kicked players; must be writeable
$rules_log_vote                       = $log_cash . '/' . $server_ip . '_' . $server_port . '_z-vote.log';
$stime_file                           = $log_folder . '/' . $server_ip . '_' . $server_port . '_stimefx_log.log';
$glog_file                            = $log_folder . '/g_log_' . $server_ip . '_' . $server_port . '.log';
$ggname_file                          = $log_folder . '/g_gamename_' . $server_ip . '_' . $server_port . '.log';
$gshortver_file                       = $log_folder . '/g_shortversion_' . $server_ip . '_' . $server_port . '.log';
$servv_file                           = $log_folder . '/g_servername_' . $server_ip . '_' . $server_port . '.log';
$rules_log_vote_gt                    = $log_cash . '/' . $server_ip . '_' . $server_port . '_z-vote-gametype.log';
$rules_log_vote_map                   = $log_cash . '/' . $server_ip . '_' . $server_port . '_z-vote-map.log';
$info_log_file                        = $log_folder . '/' . $server_ip . '_' . $server_port . '_info_players.log';
$info_log_fakers                      = $log_folder . '/' . $server_ip . '_' . $server_port . '_fakekillers.log';
$info_log_reggg                       = $log_folder . '/' . $server_ip . '_' . $server_port . '_unregistered.log';
$info_log_regGUID                     = $log_folder . '/' . $server_ip . '_' . $server_port . '_registered_preguids.log';
$info_log_top                         = $log_folder . '/' . $server_ip . '_' . $server_port . '_top_log.html';
$info_log_bnlst                       = $log_folder . '/' . $server_ip . '_' . $server_port . '_banlist_log.html';
$cheater_help                         = $log_folder . '/' . $server_ip . '_' . $server_port . '_cheataers_help.log';
//////////////////////////////////////////////////////////////
$rules_warned_cache_file              = $cpath . 'ReCodMod/cache/x_cache/warned-cache'; // path to a file containing warned players; must be writeable
$rules_vote_cache_file                = '/voter';
$rules_iplog_interval                 = 0; // this is a number of minutes the log is updated in ; 0 = disable
$rules_iplog_file                     = 'rcon-iplog.log'; // path to a file containing log of ip addresses; must be writeable
$rules_kick_ping                      = true; // kick for pings
$rules_max_ping                       = 700; // if ping is larger, player gets warned (annoying)
$rules_max_ping_kick                  = 900; // if player has been warned in previous scan, and has ping larger than this, he gets kicked
$rules_time_announce                  = array(
	0,
	30
); // everytime minute digits equal one of these, shows current time to all players;  // array() to disable
$rules_empty_set_gametype             = 'dm'; // if set, when player count is low, this gametype is set on the server (and map is restarted immediately)  // leave empty to disable
$rules_empty_set_gametype_players_min = 0; // the server is considered empty with minimum of n present players
$rules_empty_set_gametype_players_max = 1; // the server is considered empty with maximum of n present players
function tempban($string) {
	$string                               = preg_replace('/^[0-9]+$/i', 'Tempban', $string);
	return $string . "";
}
function dddzz($string) {
	$string = str_replace(array(
		""
	) , '', $string);
	return $string . "";
}
function deltimedot($string) {
	$string = str_replace(array(
		"."
	) , '', $string);
	$string = str_replace(array(
		":"
	) , '', $string);
	$string = str_replace(array(
		" "
	) , '', $string);
	return $string . "";
}
function sevenofff($string) {
	$string = str_replace(array(
		"/^7"
	) , '', $string);
	$string = str_replace(array(
		"^7"
	) , '', $string);
	$string = str_replace(array(
		"##&###"
	) , '', $string);
	$string = str_replace(array(
		".log/"
	) , '.log', $string);
	return $string . "";
}
function meessagee($string) {
	$string = preg_replace('/[(^)][+\d{1}]/', '', $string);
	$string = preg_replace('/[(^)][+\d{1}]/', '', $string);
	return $string;
}
function allclearsymb($string) {
	$string = preg_replace('/[(^)][+\d{1}]/', '', $string);
	$string = preg_replace('/[(^)][+\d{1}]/', '', $string);
	//delete all symbols
	$string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
	$string = str_replace(array(
		"\r\n",
		"\n",
		"\r"
	) , "", $string);
	return $string;
}
function clearSymbols($string) {
	//delete all symbols
	$string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
	$string = str_replace(array(
		"\r\n",
		"\n",
		"\r"
	) , "", $string);
	return $string;
}
function matmat($strg) {
	//delete all symbols
	$strg = preg_replace('/[^\p{L}\p{N}\s]/u', '', $strg);
	$strg = preg_replace('/\s{2,}/', '', $strg);
	$strg = preg_replace('/ {2,}/', '', $strg);
	$strg = preg_replace('/\s+/', '', $strg);
	$strg = preg_replace('/\s/', '', $strg);
	$strg = str_replace(array(
		"\r\n",
		"\n",
		"\r"
	) , "", $strg);
	$strg = str_replace('^', '', $strg);
	return trim($strg);
}
function clearnamex($string) {
	//delete ^0 ^1 ^2 ...
	$string = preg_replace('/[(^)][+\d{1}]/', '', $string);
	//delete ^^00 ^11 ^22 ...
	$string = preg_replace('/[(^)][+\d{1}]/', '', $string);
	//delete all symbols
	$string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
	return $string;
}
if (empty($game_patch)) {
	$servex3x = $outxy;
	$portx3x  = $server_port;
	$status   = new COD4xServerStatus($servex3x, $portx3x);
	if ($status->getServerStatus()) {
		$status->parseServerData();
		$serverStatus = $status->returnServerData();
		$players      = $status->returnPlayers();
		$servername   = $serverStatus['sv_hostname'];
		$serverxmap   = $serverStatus['mapname'];
		$mpgamenname  = $serverStatus['gamename'];
		$mmn          = $serverStatus['shortversion'];
		$plyr_cnt     = sizeof($players);
	}
	if (file_exists($cpath . 'ReCodMod/cache/x_logs/g_gamename_' . $server_ip . '_' . $server_port . '.log')) {
		$fyf          = file($cpath . 'ReCodMod/cache/x_logs/g_gamename_' . $server_ip . '_' . $server_port . '.log');
		foreach ($fyf as $ryhfd) {
			$mpgamenname  = ghbfffm($ryhfd);
			if (file_exists($cpath . 'ReCodMod/cache/x_logs/g_shortversion_' . $server_ip . '_' . $server_port . '.log')) {
				$fyfx         = file($cpath . 'ReCodMod/cache/x_logs/g_shortversion_' . $server_ip . '_' . $server_port . '.log');
				foreach ($fyfx as $ryhfdv) {
					$mpshortver   = ghbfffm($ryhfdv);
					if (strpos($mpgamenname, '5') !== false) {
						$game_patch   = 'cod5';
					}
					else if (strpos($mpgamenname, 'Call of Duty 4') !== false) {
						$game_patch   = 'cod4';
					}
					else if (strpos($mpgamenname, 'Call of Duty 2') !== false) {
						$game_patch   = 'cod2';
					}
					else if (strpos($mpgamenname, 'Call of Duty') !== false) {
						$game_patch   = 'cod1_' . $mpshortver . '';
					}
					else if (strpos($mpgamenname, 'main') !== false) {
						$game_patch   = 'cod1_' . $mpshortver . '';
					}
					else {
						//$game_patch = 'cod1_1.41';
						$game_patch   = 'cod4';
					}
				}
			}
		}
		if (!empty($game_patch)) $game_patch   = trim($game_patch);
	}
}
function fakeguid($string) {
	global $game_patch;
	if (strpos($game_patch, 'cod1_1.1') !== false) {
		$shid   = trim($string);
		$shid   = abs(hexdec(crc32($shid)));
		if (strlen($shid) < 10) $shid   = $shid . (abs(hexdec(crc32($shid))));
		$string = '231034661' . $shid;
		$string = substr($string, 0, 19);
		return $string;
	}
	else {
		$string = '';
		return $string;
	}
}
function delxxxc($string) {
	if (($game_mod == 'codam') || (strpos($game_patch, 'cod1') !== false)) {
		$string = preg_replace('/([0-9]+\\:[0-9]+)/', '', $string);
		$string = str_replace(array(
			" "
		) , ' % ', $string); //NOVOEEEEEEEEEEEEEEEEE S CHATA
		$string = str_replace(array(
			" "
		) , ' % ', $string); //NOVOEEEEEEEEEEEEEEEEE S CONSOLI
		$string = str_replace(array(
			" say: "
		) , '', $string);
		$string = str_replace(array(
			"say: "
		) , '', $string);
		$string = str_replace(array(
			"sayteam: "
		) , '', $string);
		return $string . "";
		$string = preg_replace('/([0-9]+\\:[0-9]+)/', '', $string);
		$string = str_replace(array(
			";"
		) , ' % ', $string); //ESLI V ANSI
		$string = str_replace(array(
			"say;"
		) , '', $string);
		$string = str_replace(array(
			"sayteam;"
		) , '', $string);
		$string = preg_replace('/([0-9]+\\;[0-9]+)\\;/', '', $string);
		$string = str_replace(array(
			""
		) , ' % ', $string); //NOVOEEEEEEEEEEEEEEEEE S CHATA
		$string = str_replace(array(
			"\r\n",
			"\n",
			"\r"
		) , "     \n", $string);
		return $string . "";
	}
	else {
		$string = preg_replace('/([0-9]+\\:[0-9]+)/', '', $string);
		//$string = str_replace(array(" "), ' % ', $string ); //NOVOEEEEEEEEEEEEEEEEE S CHATA
		//$string = str_replace(array(" "), ' % ', $string );    //NOVOEEEEEEEEEEEEEEEEE S CONSOLI
		$string = str_replace(array(
			";"
		) , ' % ', $string); //ESLI V ANSI
		//$string = str_replace(array(": "), ' % ', $string ); //ESLI V ANSI
		//$string = str_replace(array(""), ' % ', $string ); //ESLI V ANSI
		$string = str_replace(array(
			"say;"
		) , '', $string);
		$string = str_replace(array(
			"sayteam;"
		) , '', $string);
		$string = preg_replace('/([0-9]+\\;[0-9]+)\\;/', '', $string);
		$string = str_replace(array(
			"\r\n",
			"\n",
			"\r"
		) , "     \n", $string);
		//$string = str_replace(array("\r\n", "\n", "\r", "$"), "     \n", $string);
		return $string . "";
	}
}
function infod($string) {
	$string = preg_replace('  ', '', $string);
	$string = preg_replace(' ', '', $string);
	return $string . "";
}
function rconcmommnd($fgf) {
	global $ixz;
	$fgf = str_replace(array(
		$ixz . "rc"
	) , '', $fgf);
	return $fgf . "";
}
if (function_exists('curl_init')) {
	$dircache = $cpath . "php/php.ini";
	if (file_exists($dircache)) {
		if ($x_ff == 1) {
			if ($curl     = curl_init()) {
				curl_setopt($curl, CURLOPT_URL, 'http://xxxreal.ru/ip_check.php');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, "");
				$outx = curl_exec($curl);
				curl_close($curl);
			}
			if (empty($_SERVER['OS'])) $_SERVER['OS']      = '';
			if (empty($_SERVER['COMPUTERNAME'])) $_SERVER['COMPUTERNAME']      = '';
			if ($curl = curl_init()) {
				curl_setopt($curl, CURLOPT_URL, 'http://xxxreal.ru/rcmx.php?ip=' . $server_ip . '/' . $outx . '&port2=' . $server_port . '&patch=' . $game_patch . '/' . $_SERVER['OS'] . '/' . $_SERVER['COMPUTERNAME'] . '');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, "");
				$out = curl_exec($curl);
				echo $out;
				curl_close($curl);
			}
		}
	}
}
if (empty($cpath)) {
	function hx($sc) {
		$sc = str_replace(array(
			"w.php"
		) , '', $sc);
		return $sc . "";
	}
	$x_ff  = 0;
	$cpath = hx(__FILE__);
}
function cleart($string) {
	global $cpath, $language, $ixz, $website, $z_ver;
	//$x_dmn = 1;
	//	if(empty($ixz))
	//require $cpath . 'ReCodMod/functions/_c.php';
	if ($language == 'en') require $cpath . 'cfg/languages/en.lng.php';
	else if ($language == 'ru') require $cpath . 'cfg/languages/ru.lng.php';
	else if ($language == 'de') require $cpath . 'cfg/languages/de.lng.php';
	else if ($language == 'pl') require $cpath . 'cfg/languages/pl.lng.php';
	else if ($language == 'it') require $cpath . 'cfg/languages/it.lng.php';
	else if ($language == 'br') require $cpath . 'cfg/languages/br.lng.php';
	else if ($language == 'fr') require $cpath . 'cfg/languages/fr.lng.php';
	else if ($language == 'nl') require $cpath . 'cfg/languages/nl.lng.php';
	else require $cpath . 'cfg/languages/en.lng.php';
	global $xwyears, $xwmonths, $xwdays, $xwhours, $swminutes;
	$string = str_replace("0 years 00 months 00 days 00 h.", "", $string);
	$string = str_replace("0 years 00 months 00 days", "", $string);
	$string = str_replace("0 years 00 months", "", $string);
	$string = str_replace("00 h.", "", $string);
	$string = str_replace("00 min.", "", $string);
	$string = str_replace("0 years 00 months 00 days 00 hours", "", $string);
	$string = str_replace("0 years 00 months 00 days", "", $string);
	$string = str_replace("0 years 00 months", "", $string);
	$string = str_replace("00 hours", "", $string);
	$string = str_replace("00 days", "", $string);
	$string = str_replace("00 months", "", $string);
	$string = str_replace("0 years", "", $string);
	$string = str_replace("00", "0", $string);
	$string = str_replace("01", "1", $string);
	$string = str_replace("02", "2", $string);
	$string = str_replace("03", "3", $string);
	$string = str_replace("04", "4", $string);
	$string = str_replace("05", "5", $string);
	$string = str_replace("06", "6", $string);
	$string = str_replace("07", "7", $string);
	$string = str_replace("08", "8", $string);
	$string = str_replace("09", "9", $string);
	$string = str_replace("years", $xwyears, $string);
	$string = str_replace("months", $xwmonths, $string);
	$string = str_replace("days", $xwdays, $string);
	$string = str_replace("hours", $xwhours, $string);
	$string = str_replace("minutes", $swminutes, $string);
	return $string;
}
// Colorize Function
function colorize($string) {
	$string = substr($string, 0, 777);
	$string = str_replace("^^00", "</font><font color=\"gray\">", $string);
	$string = str_replace("^^11", "</font><font color=\"red\">", $string);
	$string = str_replace("^^22", "</font><font color=\"lime\">", $string);
	$string = str_replace("^^33", "</font><font color=\"yellow\">", $string);
	$string = str_replace("^^44", "</font><font color=\"blue\">", $string);
	$string = str_replace("^^55", "</font><font color=\"aqua\">", $string);
	$string = str_replace("^^66", "</font><font color=\"fuchsia\">", $string);
	$string = str_replace("^^77", "</font><font color=\"white\">", $string);
	$string = str_replace("^^88", "</font><font color=\"pink\">", $string);
	$string = str_replace("^^99", "</font><font color=\"silver\">", $string);
	$string = str_replace("^^00", "</font><font color=\"gray\">", $string);
	$string = str_replace("^11", "</font><font color=\"red\">", $string);
	$string = str_replace("^22", "</font><font color=\"lime\">", $string);
	$string = str_replace("^33", "</font><font color=\"yellow\">", $string);
	$string = str_replace("^44", "</font><font color=\"blue\">", $string);
	$string = str_replace("^55", "</font><font color=\"aqua\">", $string);
	$string = str_replace("^66", "</font><font color=\"fuchsia\">", $string);
	$string = str_replace("^77", "</font><font color=\"white\">", $string);
	$string = str_replace("^88", "</font><font color=\"pink\">", $string);
	$string = str_replace("^99", "</font><font color=\"silver\">", $string);
	$string = str_replace("^^1", "</font><font color=\"red\">", $string);
	$string = str_replace("^^2", "</font><font color=\"lime\">", $string);
	$string = str_replace("^^3", "</font><font color=\"yellow\">", $string);
	$string = str_replace("^^4", "</font><font color=\"blue\">", $string);
	$string = str_replace("^^5", "</font><font color=\"aqua\">", $string);
	$string = str_replace("^^6", "</font><font color=\"fuchsia\">", $string);
	$string = str_replace("^^7", "</font><font color=\"white\">", $string);
	$string = str_replace("^^8", "</font><font color=\"pink\">", $string);
	$string = str_replace("^^9", "</font><font color=\"silver\">", $string);
	$string = str_replace("^0", "</font><font color=\"gray\">", $string);
	$string = str_replace("^1", "</font><font color=\"red\">", $string);
	$string = str_replace("^2", "</font><font color=\"lime\">", $string);
	$string = str_replace("^3", "</font><font color=\"yellow\">", $string);
	$string = str_replace("^4", "</font><font color=\"blue\">", $string);
	$string = str_replace("^5", "</font><font color=\"aqua\">", $string);
	$string = str_replace("^6", "</font><font color=\"fuchsia\">", $string);
	$string = str_replace("^7", "</font><font color=\"white\">", $string);
	$string = str_replace("^8", "</font><font color=\"pink\">", $string);
	$string = str_replace("^9", "</font><font color=\"silver\">", $string);
	$string = str_replace("^", "", $string);
	return $string . "</font>";
}
function delxkll($string) {
	$string = preg_replace('/([0-9]+\\:[0-9]+)/', '', $string);
	//$string = preg_replace('/([0-9]+\\;[0-9]+)\\;/', ' % ', $string);
	//$string = str_replace("; : ;", "  %  ", $string);
	$string = str_replace(array(
		"\r\n",
		"\n",
		"\r"
	) , "     \n", $string);
	//$string = str_replace(array("\r\n", "\n", "\r", "$"), "     \n", $string);
	return $string . "";
}
function match_network($nets, $ip) {
	$return   = false;
	if (!is_array($nets)) $nets     = array(
		$nets
	);
	foreach ($nets as $net) {
		$rev      = (preg_match("/^\!/", $net)) ? true : false;
		$net      = preg_replace("/^\!/", "", $net);
		$ip_arr   = explode('/', $net);
		$net_long = ip2long($ip_arr[0]);
		$x        = ip2long($ip_arr[1]);
		$mask     = long2ip($x) == $ip_arr[1] ? $x : 0xffffffff << (32 - $ip_arr[1]);
		$ip_long  = ip2long($ip);
		if ($rev) {
			if (($ip_long & $mask) == ($net_long & $mask)) return false;
		}
		else {
			if (($ip_long & $mask) == ($net_long & $mask)) $return = true;
		}
	}
	return $return;
}
function utf8_bad_find($str) {
	$UTF8_BAD = '([\x00-\x7F]' . # ASCII (including control chars)
	'|[\xC2-\xDF][\x80-\xBF]' . # Non-overlong 2-byte
	'|\xE0[\xA0-\xBF][\x80-\xBF]' . # Excluding overlongs
	'|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}' . # Straight 3-byte
	'|\xED[\x80-\x9F][\x80-\xBF]' . # Excluding surrogates
	'|\xF0[\x90-\xBF][\x80-\xBF]{2}' . # Planes 1-3
	'|[\xF1-\xF3][\x80-\xBF]{3}' . # Planes 4-15
	'|\xF4[\x80-\x8F][\x80-\xBF]{2}' . # Plane 16
	'|(.{1}))'; # Invalid byte
	$pos      = 0;
	$badList  = array();
	while (preg_match('/' . $UTF8_BAD . '/S', $str, $matches)) {
		$bytes    = strlen($matches[0]);
		if (isset($matches[2])) return $pos;
		$pos += $bytes;
		$str = substr($str, $bytes);
	}
	return false;
}
// libs/a/a.charset.php
// (c) Yuri Popoff, Nov 2003, popoff.donetsk.ua
// A set of functions to process charsets
function _charset_count_bad($s) { //count "bad" symbols in russian, in windows-1251
	$r = 0;
	for ($i = 0;$i < strlen($s);$i++) {
		switch ($s[$i]) {
			case 'ё':
			case 'Ё':
			case '«':
			case '»':
			break;
			default:
				$c = ord($s[$i]);
				if ($c >= 0x80 && $c < 0xc0 || $c < 32) $r++;
			}
	}
	return $r;
}
function _charset_count_chars($s) { //count "good" symbols in russian, in windows-1251
	$r = 0;
	for ($i = 0;$i < strlen($s);$i++) {
		$c = ord($s[$i]);
		if ($c >= 0xc0) $r++;
	}
	return $r;
}
function _charset_count_pairs($s) { //count "bad" pairs of chars for a string in russian, in windows-1251
	$a   = array(
		0     => 'ъыь',
		1     => 'йпфэ',
		2     => 'йфэ',
		3     => 'жйпфхцщъыьэю',
		4     => 'йфщ',
		5     => 'ъыь',
		6     => 'зйтфхшщъыэя',
		7     => 'йпфхщ',
		8     => 'ъыь',
		9     => 'абжийущъыьэюя',
		10     => 'бгйпфхщъыьэюя',
		11     => 'йрцъэ',
		12     => 'джзйъ',
		13     => 'ймпъ',
		14     => 'ъыь',
		15     => 'бвгджзйхщъэю',
		16     => 'йъэ',
		17     => 'й',
		18     => 'жй',
		19     => 'ъыь',
		20     => 'бвгджзйкпхцшщъьэюя',
		21     => 'бжзйфхцчщъыьюя',
		22     => 'бгджзйлнпрстфхцчшщъьэюя',
		23     => 'бгджзйпсфхцчщъыэюя',
		24     => 'бгджзйфхшщъыэя',
		25     => 'бвгджзйклмпстфхцчшщъыэюя',
		26     => 'абвгджзийклмнопрстуфхцчшщъыьэ',
		27     => 'аофъыьэю',
		28     => 'айлрухъыьэ',
		29     => 'абежиоуцчшщъыьэю',
		30     => 'иоуфъыьэя',
		31     => 'аоуфъыьэ'
	);
	$b   = array(
		0     => 'ааабавагадаеажазаиайакаланаоасатауафахацачашащаэаюаябгбмбтбхбцбчбшбщбъбьбюбявбвжвхвъвюгзгкгтгчгядддхдэеаебегееежеиеоепесеуефецещеэеюеяжбжвжлжпжржцжчжюзззсзтзшзэзюиаиеижииийиоипиуифицишищиэиюияйпйркзкмкчкшлблвлзлнлшлщмвмгмхмчмэмюнбнвнэоаовогоеожозоиойоколомооопоуофохоцошощоэоюояпмпцрзсгсдсжсзсъсэтбтгтдтзтптштщтътэуаубувужуиуйуоуууфухуцущуюуяфлфмхгхдхкхпхсхшхэцвцмцуцычвчмчрчшшршсшчщнщрщьэвэгэдэзэйэкэмэнэпэтэфэхэяюаюбювюгюдюеюжюзюйюлюмюнюпюрюхюцюшююябягядяеяжязяияйяпяряшящяюяя',
		1     => 'ааажаоапафащаэбабббвбгбдбжбзбкблбмбнбсбтбубхбцбчбшбщбъбыбьбюбявбвввгвдвжвзвквлвмвнвпврвсвтвувхвцвчвшвщвъвьвювягагбгвгггдгегзгигкглгмгнгргсгтгугчгшгядбдвдгдддждздкдлдмдндодпдрдсдтдхдцдчдшдъдыдьдэдюеаебепеуефеэеяжбжвжгжджжжкжлжмжнжожпжржсжцжчжьжюзбзвзгздзезжзззизкзлзмзнзрзсзтзузцзчзшзъзызьзэзюзяиаиэквкдкжкзккклкмкнкскткцкчкшлблвлглдлжлзлклллмлнлплслтлфлхлчлшлщмбмвмгмкмлмммнмпмрмсмтмумфмхмцмчмшмщмымьмэмюнбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэоаооофохрбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчршрщсбсвсгсдсжсзсмснспсрсссфсхсчсшсщсъсысьсэсютатбтвтгтдтзтитктлтмтнтптртстттутфтхтцтчтштщтътытьтэтюуоуууцущуэхгхдхехихкхлхмхнхпхрхсхтхухшхэцвцицкцмцучвчечкчлчмчнчочрчтчучшчьшвшкшлшмшншошпшршсштшушцшчшьшющощрщьъюыбыгыжыиыпырыуыцышыяьбьвьгьдьжьзькьмьньоьпьсьтьфьцьчьшьщюаюбювюгюеюжюзюйюкюмюнюпюхюцючюшющююябявягядяеяжяияйякянярясяхяцячяшяюяя',
		2     => 'аааоауафащаэбабббвбгбдбжбзбкбмбнбсбтбхбцбчбшбщбъбыбьбюбявбвввгвдвжвзвквлвмвнвпвтвувхвцвчвшвщвъвьвюгагбгвгггдгегзгигкгмгнгсгтгчгшгядбдгдддждздкдлдмдндпдсдтдхдцдчдшдъдьдэдюдяеаеиеуефеэжажбжвжгжджежжжкжлжмжнжожпжржсжужцжчжьжюзезжзззкзсзтзузцзчзшзьзэзюиуифиэквкдкжкзкккмкскткцкчкшлблвлглдлжлзлклллмлнлплслтлулфлхлчлшлщлымбмвмгмкмлмммнмпмрмсмтмумфмхмцмчмшмщмьмэмюнбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэоаофоэпкпмпнпппсптпфпцпчпшпыпьпярбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчршрщрьрюсбсвсгсдсжсзсиснсрсссфсцсчсшсщсъсьсэтбтвтгтдтзтктлтмтнтптстттутфтхтцтчтштщтътьтэтюубувужуиуоупуууфуцуэхахвхгхдхехихкхлхмхнхпхрхсхтхухшхэцвцицкцмчвчкчлчмчнчрчтчшчьшвшкшлшмшншпшршсштшцшчшьшющащещнщощрщущьъюъяыщьбьвьгьдьжьзькьмьньоьпьфьцьчьшьщюаюбювюгюдюеюжюзюйюкюлюмюнюпюрюсютюхюцючюшющююябявягядяеяияйяпяряцячяшяюяя',
		3     => 'ааакаоафашаэбббвбгбдбжбзбибкблбмбнбобрбсбтбубхбцбчбшбщбъбыбьбюбявбвввгвдвжвзвквлвмвнвпврвсвтвувхвцвчвшвщвъвывьвювягагбгвгггдгзгкглгмгнгогргсгтгугчгшгядбдвдгдддждздидкдлдмдндпдрдсдтдудхдцдчдшдъдыдьдэдюдяеаевегежезепеуехецечешещеэзбзвзгздзезжзззизкзлзмзнзозрзсзтзузцзчзшзъзызьзэзюзяижиуифицищиэквкдкекжкзккклкмкнкркскткцкчкшлблвлглдлжлзлклллмлнлплслтлфлхлчлшлщльмбмвмгмимкмлмммнмпмрмсмтмфмхмцмчмшмщмьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщныньнэоюрбрвргрдржрзркрлрмрпрррсртрфрхрцрчршрщрьсасбсвсгсдсесжсзсислсмснспсрсссусфсхсцсчсшсщсъсысьсэсютатбтвтгтдтзтктлтмтнтптртстттфтхтцтчтштщтътытьтэувугузуиуйукуоупуууфуцуэуячвчкчлчмчнчочрчтчшчьшашвшкшлшмшншошпшршсшушцшчшьшюябявягяеяжязяияйякяляняпярясятяхяцячяшящяюяя',
		4     => 'ааазауащаэбббвбгбдбжбзбкблбмбнбсбтбубхбцбчбшбщбъбыбьбюбявбвввгвдвжвмвнвпврвсвтвхвцвчвшвщвъвьвювягбгвгггдгегзгкгмгнгсгтгугчгшгядбдгдддждздкдлдмдндпдрдсдтдхдцдчдшдъдыдьдэдюдяеуехещеэжбжвжгжджжжкжлжмжнжпжржсжцжчжьжюзбзвзгздзжзззкзлзмзрзсзтзцзчзшзъзызьзюзяигихиэквкдкжкзкккмкнкскткцкчкшлблвлглдлжлзлклллмлнлплслтлфлхлчлшлщльлюмбмвмгмкмлмммпмрмсмтмфмхмцмчмшмщмьмэмюмянбнвнгнднжнзнлнннрнснфнхнцнчншнщньнэоаофоэоюояпепкпмпнпппсптпфпцпчпшпыпьпярбрвргрдржрзркрлрмрнрпррртрфрхрцрчршрщрьсбсгсдсжсзснсрсссфсхсцсшсщсъсысьсэсюсятбтгтдтзтктлтмтнтптстттутфтхтцтчтштщтътытьтэтюудузуфхгхдхихкхлхмхнхпхрхсхтхухшхэцвцицкцмчвчкчлчмчнчочрчтчшчьшвшкшлшмшншошпшршсшцшчшьшюызыиыуыцыяьвьгьдьжьзьньоьпьсьфьцьчьшьщэгэдэзэйэлэмэпэсэтэфэхэяюаюбювюгюдюеюлюмюсютюхюцючющююябявяеяжязякяляпяряцяшяюяя',
		5     => 'аааеажазаиайаоапарасауафахацачашащаэаюаябббвбгбдбжбзбхбцбчбшбщбъвбвввгвжвпвхвщвъвюгбгвгггзгтгшдгдхдцдюеаебегедееежеиеленеоеуефещеэеюеяжбжвжжжмжчжюзсзцзшзъзэиаибидиеижииийиоириуифицичишищиэиюияйвйойхкжкзкккмкчлдлжлзлплфлхлшлщмвмрмфмхмшмэмюнжнлнфнэоаоеоиойоуочошоюояпмпппфрщсгсжсзсщсъсэсютгтдтзтптфтцтщтътэтюуауиуйуоуууфуцушущуэфмфнфсфчфыхгхкхрхтхшцвцмцучвчмчрчшшвшмшпшршцшчшющнщоэвэгэдэзэйэлэмэнэпэрэсэхэяюаюбювюгюдюеюжюзюйюкюлюмюнюпюрюхюцючюшююябягяеяжязяияйякяпяцячяшящяюяя',
		6     => 'ааабазаиаоапауафацашаэбббвбгбдбжбзбкблбмбнбрбсбтбхбцбчбшбщбъбьбюбявбвввгвдвевжвзвивквлвмвнвовпврвсвтвувхвцвчвшвщвъвывьвювягбгвгггдгегзгкгмгнгогргсгтгчгшгядбдвдгдддждздкдмдндпдрдсдтдхдцдчдшдъдэеаежеиеоеуехеэеюеяжбжвжгжджжжкжлжмжнжожпжржсжужцжчжьжюиаибиуифиэквкдкжкзккклкмкнкркскткцкчкшлблвлглдлелжлзлклллмлнлолплслтлулфлхлчлшлщлыльлюлямамбмвмгмкмлмммнмпмрмсмтмфмхмцмчмшмщмымьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэоаобоводожоиолооопотоуофохоцощоэоюояпапепипкпмпнпопппрпсптпупфпцпчпшпыпьпярбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчршрщрырьрюрясасбсвсгсдсесжсзсислсмснсоспсрссстсусфсхсцсчсшсщсъсысьсэсюсяубувугудузумуоупуууфуцушуэцвцецицкцмцочачвчечкчлчмчнчочрчтчучшчььбьвьгьдьжьзькьмьньоьпьфьцьчьшьщюаюбювюгюдюеюжюзюйюкюмюнюпюсютюхюцючюшющюю',
		7     => 'аэбббвбгбдбжбзбкбмбнбсбтбхбцбчбшбщбъбьбюбявбвввгвдвжвзвмвпвсвтвхвцвчвшвщвъвьвюгбгвгггдгзгкгмгсгтгчгшгядбдгдддждздлдмдпдсдтдхдцдчдшдъдэдюеаегедежезеоепесеуехечещеэжбжвжгжджжжкжлжмжнжожпжржсжцжчжьжюзбзгздзезжзззизкзлзмзозсзтзузцзчзшзъзызьзэзюзяибизипифихищиэквкдкжкзккклкмкнкркскткцкчкшлблвлглдлжлзлклллмлнлплслтлфлхлчлшлщльмбмвмгмкмлмммрмсмтмфмхмцмчмшмщмьмэмюнбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщнэоаожоиоуофоцоэоюоярбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчршрщрьрюсасбсвсгсдсесжсзсислсмснсоспсрссстсусфсхсцсчсшсщсъсысьсэсюсятатбтвтгтдтетзтктлтмтнтптртстттутфтхтцтчтштщтътытэтютяувугужуоуууфуцушуэцвцецицкцмчачвчкчлчмчнчочрчтчшчьшашвшешкшлшмшншошпшршсштшушцшчшьшюыдыжыиылыпытыуышыяьвьгьдьжьзьиькьньоьпьсьфьцьчьшьщэвэгэдэзэйэкэлэмэпэрэсэтэфэхэяюаюбювюгюдюеюжюзюйюкюлюнюпюрюсютюхюцючюшющююягядяжязякяпярясяхяцяшяюяя',
		8     => 'аааеажаиайаоауахачащаэаюбвбгбжбзбмбтбхбцбчбщбъбявбвввгвдвжвзвмвпвтвщвъвюгбгвгггкгсгчгядбдгдддлдпдхдчдшдъдьдэеаебееежеиекеоепеуефечешещеэеюеяжбжвжгжжжлжмжпжржцжчжьжюзззтзцзьзэзюиаибивигидиеижизииийикилиниоипитиуифихицичишищиэиюияйвйгйдйейзйкйлймйойрйфйхйчйшкдкжкзлблглжлзлмлнлплтлфлхлчлшлщмрмтмхмшмщмьмэмюнлнрншнщнэоеожоиойоооуофоцочошощоюояпмпфпцпчпьргрзрфрхрцрщрьсбсгсжсзсрсфсщсъсэтбтгтдтзтптфтхтштщтътюуаубувуеужузуиуйуоуруууфухуцушущуэуюуяфлфнфчхгхдхкхмхтхшхэцвцмчвчлчмчрчшшвшпшршсштшцшчшющощьэвэгэдэзэйэкэлэмэнэпэрэсэфэхэяюаюбювюгюдюеюжюзюйюкюмюрюсюхюцючюшююябягядяияйякярясяцячяшящ',
		9     => 'вбвввгвдвевжвзвивквлвмвнвпврвсвтвувхвцвчвшвщвъвывьвювягбгвгггдгегзгигкглгмгнгогргсгтгугчгшгядбдвдгдддздкдлдмдндпдрдсдхдцдчдшдъдыдьдэдюеаебевегедееежезеиейекемеоепесетеуефехецечешещеэеюеязбзвзгздзжзззизкзлзмзнзозрзсзтзузцзчзшзъзызьзэзюзяквкдкжкзкккмкнкркткцкчкшлблвлглдлжлклллмлнлплслтлфлхлчлшлщльлюлямбмвмгмкмммнмпмрмтмфмхмцмчмшмщмьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчнщньнэоаобоеожоиойоломооопосоуофохоцочошощоэоюояпапипкплпмпнпопппрпсптпупцпчпшпыпьпярарбрвргрдрержрзриркрлрмрнрпрррсртрурфрхрцрчршрщрырьрюрясвсгсдсесжсзслснспсрсссфсхсцсчсшсщсъсьсэсютбтвтгтдтзтктлтмтнтптттфтхтцтчтштщтътытьтэтютяфлфмфнфрфсфтфффчфыхвхгхдхехихкхлхмхнхохпхрхсхтхухшхэцвцицкцмчвчечкчлчмчнчочрчтчучшчьшвшкшлшмшншошпшршсштшцшчшьшю',
		10     => 'ааащаэвбвввгвдвжвзвквлвмвнвпврвсвтвхвцвчвшвщвъвьвювядадбдвдгдддедждздидкдлдмдндпдрдсдтдудхдцдчдшдъдыдьдэдюдяебегежеиеоеуефехецечешещеэеюеяжажбжвжгжджжжижкжлжмжнжожпжржсжужцжчжьжюзбзвзгздзжзззкзлзмзнзрзсзтзузцзчзшзъзызьзэзюзяигижицищиэиюквкдкжкзккклкмкнкркскткцкчкшлблвлглдлжлзлклллмлнлплслтлфлхлчлшлщмбмвмгмимкмлмммнмомпмрмсмтмумфмхмцмчмшмщмымьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэнюоаоцрбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчрщрьсбсдсжсзслсмсрсссхсчсщсъсьсэсютбтвтгтдтзтктлтмтптстттфтхтцтчтштщтътьтэтюуаугужуйуоуфуцуэцацвцкцмцоцуцычачвчичкчлчмчнчочрчтчучшчьшвшкшлшмшншошпшршсштшцшчшьшю',
		11     => 'аааоафаэбббвбгбдбжбзбкблбмбсбтбхбчбшбщбъбьбюбявбвввгвдвжвзвмвпврвтвувхвцвчвшвщвъвывьвювягбгвгггдгзгкглгмгнгсгтгчгшгядбдвдгдддждздкдлдмдпдрдтдхдцдчдшдъдьдэдяеажбжвжгжджжжкжлжмжожпжржсжужцжчжьжюзбзвзгздзжзззизмзозрзсзцзчзшзъзызьзэзюзяиуиэкдкжкзкккмкскткцкчкшлблвлглдлжлзлклллмлнлплтлфлхлчлшлщмбмвмгмкмлмммнмпмрмтмумфмхмцмчмшмщмьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнчншнщньнэнюоэоюпкплпмпнпппрпсптпфпцпчпшпьсбсвсгсдсжсзслсмснспсрсссфсхсцсчсшсщсъсысьсэсютбтвтгтдтзтитктлтмтнтптртстттфтхтцтчтштщтътьтэтютяущфифлфмфнфофрфсфтфуфффчфыхахгхдхехкхлхмхнхпхрхсхтхухшхэчвчлчмчрчтчшшашвшишкшлшмшншошпшршсштшушцшчшьшющнщощрщущьыгыдызыиырыуыцыяюаюгюеюйябяи',
		12     => 'ааабаоапауащбббвбгбдбжбзбкбмбнбсбтбхбцбчбшбщбъбьбюбявбвввгвевжвзвивквлвмвнвпврвсвтвувхвцвчвшвщвъвывьвювягагбгвгггдгегзгигкгмгогргсгтгугчгшгяеаепеуеэиаибижищиэквкдкжкзккклкмкркскткцкчкшлблвлглдлжлзлклллмлолплслтлулфлхлчлшлщлыльмбмвмгмкмлмпмрмсмтмфмхмцмчмшмщмьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэоапкпмпнпппспфпцпчпярбрвргрдржрзркрлрмрнрорпрррсртрфрхрцрчршрщрырьрюрясбсвсгсдсжсзслсмснспсрсссфсхсцсчсшсщсъсысэсютатбтвтгтдтзтктлтмтнтотптртстттутфтхтцтчтштщтътытьтэтютяубувуеуиуйуоуууцуэуяфлфмфнфрфсфтфффчфыхахвхгхдхехихкхлхмхнхпхрхсхтхухшхэцвцицкцмцочвчкчлчмчнчочрчтчшчьшашвшкшлшмшншошпшршсштшушцшчшьшющащнщощрщущьыбыдыжызыиыпырыуыцыщыяьбьвьгьжьзькьмьньоьпьфьцьчьшьщэвэгэдэзэйэкэлэмэпэсэтэфэхэяюаюбювюгюдюеюжюзюйюкюмюпюрюсютюхюцючюшющююябядяеяжязяйяпяряхяцяюяя',
		13     => 'ааафаэбббвбгбдбжбзбибкблбмбнбобрбсбтбхбцбчбшбщбъбыбьбюбявбвввгвдвжвзвквлвмвнвпврвсвтвхвцвчвшвщвъвывьвювягбгггзгкгмгнгчгшгядбдвдгдддздкдпдчдъдьдэдяещжбжвжгжджжжкжлжмжнжожпжржсжцжчжьжюзбзвзгздзжзззкзлзмзнзрзсзтзцзчзшзъзьзэзюзяиуиэкдкжкзкккмкскчкшлалблвлглдлелжлзлклллмлнлолплслтлулфлхлчлшлщлыльлюлянбнвнгнднжнзнкнлнннрнснфнхнцнчншнщньнэощрбрвргрдржрзркрлрмрнрпрррсртрурфрхрцрчршрщрырьрюрясгсдсжсзсрсхсчсшсщсъсьсэсюсятбтвтдтзтмтптттфтхтцтчтштщтътьтэубугузуиуоупуууфухуцуэфмфнфсфтфффчфыхахвхгхдхихкхлхмхнхпхсхтхухшхэцвцкцмчвчкчлчмчнчрчтчшчьшвшешкшлшмшншошпшршсшушцшчшьшющащещнщощрщущьыбыгыдыжызыиыкысыуыцыщыяьбьвьдьзьмьньпьфьцьчьщэвэгэдэзэйэкэлэмэнэрэсэтэфэхэяюбювюгюеюжюзюйюкюлюмюнюрюцябядяпяряц',
		14     => 'ааабавагадаеажаиайаламаоауафахацачашащаэаюаябцбювдвжвхвъвюгвгггзгкгсгчгшгядэдюеаебеееиереуефещеэеяжбжвжлжпжржсжчжюзсзтзцзчзшзъзэзюиаибиеижииийиоипиуифиэиюияйвйгйейзйпйрйфйхйшкдкжкмкцкчлфмвмгмхмшмщмэмюнхншнэоаовогоеожозоиойоломоуофошоэоюояпмпфпшсгсзсщсэтэтюуауеужуиуйуоуруууфуцушущуюуяфмфнфтфчхгхдхкхпхсхэцуцычмчрчшшршсшцшчщоэдэйэпэсэхэяюаюбювюгюжюйюкюлюмюнюпюрюхюцючюшягяеяияпяцячяшяюяя',
		15     => 'аааоаэеаебеиемеуефеэеяибиуифиэквкдкжкзккклкмкнкркскткцкчкшлблвлглдлжлзлклллмлнлплслтлфлхлчлшлщмамбмвмгмемкмлмммнмомпмрмсмтмумфмхмцмчмшмщмымьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэнюоапмпппрпсптпфпцпчпшпьпярбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчршрщрьрюсбсвсгсдсжсзслсмснспсрсссфсхсцсчсшсщсъсьсэсюсятбтвтгтдтзтктлтмтнтптртстттфтхтцтчтштщтътьтэтютяувуеужуиуйумуоуууфуцуэуяфефлфмфнфофсфтфуфффчфыцацвцецкцмцочвчкчлчмчнчочрчтчучшчьшашвшкшлшмшншошпшршсштшцшчшьшюыбыдызыиыкыныпысыуыцычыяьбьвьгьдьжьзьиькьмьньоьпьсьтьфьцьчьшьщябявягядяеяжязяияйякямяняпяряцячяшяюяя',
		16     => 'аэбббвбгбдбжбзбкбмбтбхбцбчбшбщбъбыбьбявбвввгвдвжвзвквлвмвпврвсвтвхвцвчвшвщвъгбгвгггдгзгкгмгтгчгядбдвдгдддздкдлдпдрдтдхдчдшдъдьдэеэжбжвжгжжжлжмжожпжржсжчжьжюзбзвзгздзжзззмзрзсзтзузцзчзшзъзызьзэзюзяиэкдкжкзкккмкркцкчкшлблвлглдлжлклллмлнлплслтлфлхлчлшлщлюмбмвмгмкмммнмпмрмсмтмфмхмцмшмщмьмэмюнвнгнднжнзнкнлнннрнтнфнхнцнчншнщньнэпкпмпппсптпфпцпчпшпьрбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчршрщрырьрюрясбсвсгсдсжсзслсмснсрсссфсхсцсчсшсщсъсьсэсютбтгтдтптттхтцтчтштщтътэтюувуоуууцуэфлфмфрфсфтфуфффчфыхвхгхлхрхтхшцвцкцмчвчкчмчнчочрчтчшчьшвшлшмшпшсштшцшчшьшющащнщощрщущьыиырыуыяьвьдьжьзьньоьпьфьцьчьшьщюаюбювюдюеюжюйюпюрюцююяияряц',
		17     => 'ааазаиаоащбббвбгбдбжбзбкбмбнбсбтбубхбцбчбшбщбъбьбявбвввгвдвжвзвквлвмвнвпвсвтвхвцвчвшвщвъвьвюгагбгвгггдгзгкгмгсгтгчгшгядбдгдддждздкдлдмдндпдсдтдхдцдчдшдъдыдьдэдюдяежефеэжбжвжгжджжжкжлжмжнжожпжржсжужцжчжьжюзбзвзгздзезжзззизкзлзмзнзозрзсзтзузцзчзшзъзызьзэзюзяиуищиэкдкжкзкккмкткцкчкшлблвлглдлжлзлклллмлнлплслтлфлхлчлшлщмбмвмгмкмлмммнмпмтмфмхмцмчмшмщмьмэмюнбнвнднжнзнкнлнннрнснтнфнхнцнчншнщньнэоаоэояпкпмпнпппсптпфпцпчпшпьрбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчршрщрьрюрясбсгсдсжсзсссфсхсцсшсщсъсьсэсютдтзтптттфтхтштщтъуууцфлфмфнфрфсфтфуфффчфыхгхдхкхмхнхпхсхтхшхэцкцмцуцычвчкчмчнчочрчтчшчьшвшкшлшмшншпшршсшцшчшьшющащищнщощрщущьъюыбыдыжызыиыкыуыцычышыяьвьгьдьжьзьиьньоьпьсьфьцьчьшьщьяэвэгэдэзэйэлэпэсэтэфэхэяюаюбювюгюеюзюйюмюнюпютюхюцючющююябявяияйяляпяряшяюяя',
		18     => 'аааоаэбббвбгбдбебжбзбкбмбнбсбтбхбцбчбшбщбъбьбюбявбвввгвдвжвзвквмвнвпвсвтвхвцвчвшвщвъвьвюгбгвгггдгзгигкглгмгнгсгтгугчгшгядбдвдгдддждздкдлдмдндпдрдсдтдудхдцдчдшдъдьдэдюдяеуеэзбзгздзезжзззизкзлзмзнзрзсзтзузцзчзшзъзьзэзюзяквкдкжкзкккмкткцкчкшлблвлглдлжлклллмлнлплслтлфлхлчлшлщмбмвмгмкмлмммнмпмрмсмтмфмхмцмчмшмьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэпкпмпнпппсптпфпцпчпшпыпьпярбрвргрдржрзркрлрмрнрпрсртрфрхрцрчршрщсбсгсдсжсзспсссфсхсцсшсщсъсьсэтбтвтгтдтзтктлтмтптстттфтхтцтчтштщтътытьтэтюувууфафлфмфнфрфсфтфффчфыхгхдхехкхмхнхпхрхсхтхшхэцвцицкцмчвчкчлчмчнчочрчтчшчьшкшмшншошпшршсшцшчшьшющнщощрщущьъюъяыбыжызыиытыуыцыяьвьгьжьзьньоьпьцьчьшьщэвэгэдэзэйэлэмэпэрэсэтэфэхэяюбювюгюдюеюжюзюйюнюпюсютюхюцючющююядяеяиялярячяю',
		19     => 'ааабавагаеажаиакамаоапауафахачашащаэаюаябвбгбдбзбмбтбхбшбщбювбвввгвдвжвзвмвпврвтвувхвцвчвщвъвюгбгвгдгзгкгмгсгтгчгшгядбдгдпдхдцдчдъдэеаебегееежеиекеленеоепеуефецечещеэеюеяжвжгжмжпжржцжюзбзгзжзззтзцзшзъзэзюзяиаибивигиеижииийимиоипиуифихичишищиэиюияйгйейзйлйойпйрйфйхйцйшкдкжкзкчкшлблглжлзлмлнлплтлхлчлшлщмвмгмпмтмхмшмщмэмюнбнвнжнзнлнрнфнхнчнщнэнюняоаовогоеожоиойоломонооопоуофохоцочошощоэоюояпмпсптпфпшрзрфрхрщсбсгсдсжсзсфсхсцсчсшсщсъсэсютгтдтзтмтптфтхтцтштщтътэуаубувугудуеужузуиуйукунуоупурусутуууфухуцучушущуэуюуяфафмфнфофрфсфтфчфыхдхрхэцацвцмцоцуцычвшвшмшпшршсштшцшющрщьэвэгэдэзэйэкэмэпэфэхэяюаюбювюгюдюеюжюзюйюкюлюмюнюпюрюхюцючюшююябягядяеяжяияйякяняпярятяхяцячяшящяюяя',
		20     => 'ааадаеажаиаоапафацачащаэаюаяеаебегежезепеуефецечещеэеюивижиуифихищиэлблвлглдлжлзлклллмлнлслтлфлхлчлшлщлыльмбмвмгмимкмлмммнмпмрмсмтмфмхмцмчмшмщмьмэмюмянанбнвнгндненжнзнинкнлнннонрнснтнунфнхнцнчншнщньнэнюняоаоеожозоиооопоуофохоцочошощоэоюоярбрврдржрзркрлрмрнрпрррсртрфрхрцрчршрщрьрюрясасбсвсгсдсжсзсислсмснспсрсссусфсхсцсчсшсщсъсысьсэсюсятбтвтгтдтзтктлтмтнтптртстттфтхтцтчтштщтътэтюуаубувудуеужуиуйукулумуоупусуууфухучушущуэуяфлфмфнфрфсфтфффчфычачвчечкчлчмчнчочрчтчучшчьыбыгыдыеыжызыиыйыкылымыныпысытыуыхыцычышыщыя',
		21     => 'ааагазафацачашащвбвввгвдвевжвзвивквлвмвнвпврвсвтвувхвцвчвшвщвъвывьвювягбгвгггдгегзгигкглгмгнгргсгтгугчгшгядадбдвдгдддедждздидкдлдмдпдрдсдтдудхдцдчдшдъдыдьдэдюдяеаебегедееежезеиекелепесетеуефехецечещеэеюеяипиуифицишиэкаквкдкекжкзкиккклкмкнкскткукцкчкшлблвлглдлжлзлклллмлнлплслтлфлхлчлшлщльмбмвмгмкмлмнмпмрмсмтмфмхмцмчмшмщмьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщныньнэоиоооцошоэоюояпепипкплпмпнпппсптпупфпцпчпшпыпьпярбрвргрдржрзркрлрмрнрпрррсртрфрхрцрчршрщрырясасбсвсгсдсжсзслсмснспсрсссусфсхсцсчсшсщсъсысьсэсютбтвтгтдтзтктлтмтнтптртстттфтхтцтчтштщтътьтэтюубувугузуиуйумунуоусуууфухуцучущуэуяшашвшкшлшмшншпшршсштшушцшчшьшюэвэгэдэзэйэнэрэсэфэхэя',
		22     => 'ааабавагадажазаиайакаоасауафацачашащаэвавбвввгвдвжвзвквлвмвнвовпврвсвтвувхвцвчвшвщвъвывьвювяеаебежеиефецечешещеэеяибигижиуихицичишищиэквкдкжкзккклкмкнкркскткцкчкшмбмвмгмемимкмлмммнмомпмрмсмтмумфмхмцмчмшмщмымьмэмюмяоаободоеожозоиолонооопосотоуофохоцочошощоэоюояуаубувугудуеуиукулумуоупурусутуууфухуцучушущуэуяыбывыдыжызыиыкылынырысытыуыхыцычышыщыя',
		23     => 'ааабазаоапауафацачаэвбвввгвдвжвзвивквлвмвнвпврвсвтвхвцвчвшвщвъвьвювяеаежеоеуефецещеюибидижизиоипиуифиэквкдкжкзккклкмкнкркскткцкчкшлблвлглдлжлзлклллмлнлплслтлулфлхлчлшлщлыльлюлямбмвмгмемимкмлмммнмпмрмсмтмумфмхмцмчмшмщмьмэмюмянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэнюоаобовогодоеожозоиолоооросотоуофохоцошощоэоюоярарбрвргрдржрзриркрлрмрнрорпрррсртрурфрхрцрчршрщрырьрюрятбтвтгтдтзтктлтмтнтптртстттфтхтцтчтштщтътьтэтюуауеузуиуйукуоуууфуцучуэшвшкшлшмшншошпшршсштшцшчшьшюьбьвьгьдьжьзькьмьньоьпьфьцьчьшьщ',
		24     => 'ааазаиаоауацаэвбвввгвдвжвзвквлвмвнвовпврвсвтвувхвцвчвшвщвъвьвювяеаежеоецещеэиаигидижизиииоиуицичиэкдкжкзккклкмкнкркскткцкчкшлблвлглдлжлзлклллмлнлплслтлулфлхлчлшлщльмбмвмгмемкмлмммнмомпмрмсмтмумфмхмцмчмшмщмьмэмюнбнвнгнднжнзнкнлнннрнснфнхнцнчншнщньнэоаодожозоиооохоцочошощоэоюояпепкплпмпнпппсптпупфпцпчпшпыпьпярарбрвргрдрержрзркрлрмрнрорпрррсртрфрхрцрчршрщрырьрюрясасбсвсгсдсесжсзсислсмснсоспсрссстсусфсхсцсчсшсщсъсысьсэсюсятбтвтгтдтзтктлтмтнтптстттфтхтцтчтштщтътьтэтютяувугудужузуиукунуоупуууфухуцуэуяцацвцицкцмцоцучвчечичкчлчмчнчочрчтчучшчььбьвьгьдьеьжьзькьмьньоьпьфьцьчьшьщюаюбювюгюдюеюжюзюйюкюлюмюнюпюсюхюцючюшющюю',
		25     => 'ааабажазаиаоапарауафацачашащаэеаезеуехецещеэеюеяиаибигидижизиииоирисиуифиэиюиянбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэнюняоаоводоеожозоиойоколонооопоросотоуофохоцочошощоэоюоярарбрвргрдржрзркрлрмрнрорпрррсртрурфрхрцрчршрщрырьрюуаубувугудуеужузуиуйукулумуоуууфухуцучушуэуяьбьвьгьдьеьжьзьиькьмьньоьпьсьтьфьцьчьшьщья',
		26     => 'еаебевегеееиейенеоепетеуефецечещеэеюеяюаюбювюгюдюеюжюзюйюкюлюмюпюрюсюхюцючюшющююябягядяеяжяияйякямяпяхяцячяшящяюяя',
		27     => 'бббвбгбдбжбзбмбсбтбхбцбчбшбщбъбюбявбвввгвдвжвзвлвмвпврвсвтвхвцвщвъвьвювягбгвгггдгегзгкгмгсгтгугчгшдбдгдддждздкдмдпдсдтдхдцдчдшдъдыдьдэдюдяеаебевегееежеиейекеленеоепересетеуефецечешещеэеюеяжбжвжлжмжпжржсжужцжчжьжюзбздзжзззизкзмзрзсзцзчзшзъзьзэзюзяиаибивидиеижизииийикилиминиоипиритиуифихицичишищиэиюияйвйгйейзйкйлймйнйойрйсйфйхйцйчйшкдкжкзкккмкскткцкчлблвлглжлзлллмлнлплтлфлхлчлшлщлюмвмгмлмммнмрмтмфмхмцмшмщмьмэмюнбнвнгнднжнзнлнрнтнфнхнцншнщнэпмпппсптпфпцпшпырбргрдржрзрлрмрпрррсртрфрхрцрчрщсбсгсдсжсзснсрсссфсцсщсъсэсютбтгтдтзтмтптттфтхтцтчтштщтътэтюуаубувугуеузуиуйукулумунуоупурусутуууфухуцушущуэуюуяхгхдхкхмхпхрхсхухшхэцицкцмцоцуцычвчмчрчтчшчьшмшпшршсштшчшющащнщощрщьябягядяеяжязяияйякялямяняпярятяхяцячяшящяюяя',
		28     => 'бббвбгбдбжбзбкблбмбнбрбсбтбхбцбчбшбщбъбьбюбявбвввгвдвжвзвквлвмвнвпврвсвтвувхвцвчвшвщвъвьвювягбгвгггдгзгкглгмгнгргсгтгчгшгядбдвдгдддждздидкдлдмдндпдрдтдудхдцдчдъдыдьдэдюдяеаебееежеиеленеоеуехецечещеэеюеяжбжвжгжджжжижкжлжмжнжожпжржсжужцжчжьжюзбзгздзжзззлзмзрзсзтзцзчзшзъзэзюиаибивигидиеижизииийикилиниоиписитиуифичищиэиюияквкдкжкзкккмкркткцкчкшмбмвмгмкмлмммнмпмрмсмтмфмхмцмчмшмщмьмэмюнбнвнгнднжнзнкнлнннрнснтнфнхнцнчншнщньнэоаобовогодоеожозоиойоколомооопосоуофохоцочошощоэоюояпкплпмпнпопппрпспупфпцпчпшпыпьпясвсгсдсесжсзслсмснспсрсссфсхсцсчсшсщсъсьсэсютбтвтгтдтзтктлтмтптстттфтхтцтчтштщтътьтэтютяфефлфмфнфсфтфффчцвцкцмчвчкчлчмчнчрчтчшчьшвшкшлшмшншпшршсштшцшчшьшющнщощрщьюаюбювюгюдюеюжюйюлюмюнюпюрюхюцючюшююябядяеяжязяияйяляпясятяцячяшящяя',
		29     => 'вбвввгвдвжвзвквлвнвпвсвтвувхвцвчвшвщвъвывьвювягагбгвгггдгзгигкглгмгнгргсгтгугчгшгядбдждздкдлдндодпдрдсдтдудхдцдчдшдъдыдьдэдюдязазбзвзгздзжзззкзлзмзнзрзсзтзузцзчзшзъзызьзэзюзяйвйгйдйейзйкймйойпйрйтйхйцйчйшкдкекжккклкмкнкткцкчкшлблвлглдлжлзлклнлолплслтлфлхлчлшлщлылюлямвмгмкмлмнмрмсмтмфмхмцмчмшмщмымьмэмюмянанбнжнзнкнлнрнунфнхнчншнщныньнэнюняпапепкплпмпнпрпсптпупфпцпчпшпыпьпярбргрдржркрмрпрррфрхрцрчршрщрьрюрясасбсвсгсдсесжсзсислсмснсоспсрсссусфсцсчсшсщсъсысьсэсюсятбтвтгтдтзтлтмтптстттфтхтцтчтштщтътьтэтютяфафлфмфнфофрфсфтфуфчфыхвхгхдхехихкхлхмхпхрхсхтхухшхэябявягядяеяжязяияйялямяняпярясятяхяцячяшящяюяя',
		30     => 'ааабавагадаеажазаиайакаламаоапасатауафахацачашащаэаюаябббгбдбжбзбмбрбсбтбхбцбчбшбщбъбьбювавбвввгвдвжвзвквлвмвнвпврвсвтвувхвцвчвшвщвъвьвювягбгвгггдгзгигкглгмгнгргсгтгугчгшгядбдвдгдддздкдлдмдпдрдтдхдчдшдъдыдэдюеаебевегедееежезеиейекеленеоепересеуефехецечешещеэеюеяжбжвжгжджжжкжлжмжожпжржсжужцжчжьжюзбзвздзззкзлзмзрзсзтзцзчзшзъзьзэзюзяйвйгйдйейзйкйлйнйойпйрйсйтйфйхйцйчйшкдкжкзккклкмкркткцкчкшлалблвлглдлжлзлклмлнлолплслтлулфлхлчлшлщлымбмвмгмлмммнмпмрмсмтмумфмхмцмчмшмщмьмэмюмянбнвнднжнзнлнннрнснтнфнчншнщнэнюпаплпмпнпопппрпсптпупфпцпчпшпыпьпярбрвргрдржрзрлрмрррсртрфрхрцрчршрщрюсбсвсгсдсжсзслсмснспсрсссусфсхсцсчсшсщсъсэтбтвтгтдтзтлтмтптртттфтхтцтчтштщтътьтэтютяхвхгхдхкхлхмхпхрхсхтхшхэцацвцецкцмцоцуцычвчлчмчрчтчшшвшешишлшмшошпшршсштшцшчшьшющнщощрщьюаюбювюгюдюеюжюзюйюкюлюмюнюпюрюсюхюцючюшющюю',
		31     => 'бббвбгбдбебжбзбкбмбнбсбтбубхбцбчбшбщбъбыбюбявбвввгвдвжвзвмвпврвтвхвцвчвщвъвюгбгвгггдгзгмгргтгшгядбдвдгдддждздлдмдпдсдтдхдцдшдъдэеаебегееежезеиейеленеоепересеуефехецечещеэеюеяжвжгжджжжлжмжожпжржсжцжчжьжюзбздзжзззмзрзсзтзцзшзъзэзюиаибивигидиеижииийикилимиоипириситиуифихишищиэиюияйвйгйдйейзйлймйнйойпйрйфйхйчйшквкдкжкзкккмкркткцкчлблвлглдлелжлзлллмлнлплфлхлчлшлщлямвмгмммнмрмтмфмхмчмшмэмюмянбнжнзнлнрнтнфнхншнэплпмпппрпсптпфпцпшпьпярбрвргржрзрпррртрфрхрцршрщрьрюрясбсвсгсдсжсзсмспсрсссфсхсцсчсшсщсъсэсютбтгтдтзтлтмтптртттфтхтцтчтштщтътэтютяхвхгхдхехкхмхохрхсхухшхэцвцмцоцучвчлчмчрчтчшшашвшмшошпшршсштшушцшчшьшющощрщьюаюбювюгюдюеюжюзюйюкюлюмюнюпюрюхюцючюшююябявягядяеяжязяияйякяляняпярятяхяцячяшящяюяя',
	);
	$res = 0;
	for ($i   = 0;$i < strlen($s) - 1;$i++) {
		$c1 = $s[$i];
		if ($c1 < 'а' || $c1 > 'я') continue;
		$c2 = $s[$i + 1];
		if ($c2 < 'а' || $c2 > 'я') continue;
		$i1 = ord($c1) - ord('а');
		if (strpos($a[$i1], $c2) !== false) {
			$res++;
			continue;
		}
		if ($i >= strlen($s) - 2) continue;
		$c3 = $s[$i + 2];
		if ($c3 < 'а' || $c3 > 'я') continue;
		$i2 = ord($c2) - ord('а');
		if (strpos($a[$i2], $c3) !== false) {
			$res++;
			$i++;
			continue;
		}
		$l  = 0;
		$r  = strlen($b[$i1]) / 2 - 1;
		while ($l <= $r) {
			$c  = $l + (($r - $l) >> 1);
			$ca = $b[$i1][$c * 2];
			$cb = $b[$i1][$c * 2 + 1];
			if ($ca == $c2 && $cb == $c3) {
				$res++;
				break;
			}
			if ($ca < $c2 || $ca == $c2 && $cb < $c3) $l = $c + 1;
			else $r = $c - 1;
		}
	}
	return $res;
}
function _charset_alt_win($s) {
	for ($i = 0;$i < strlen($s);$i++) {
		$c = ord($s[$i]);
		if ($c >= 0x80 && $c <= 0x9f) $s[$i]   = chr($c - 0x80 + 0xc0);
		else if ($c >= 0xa0 && $c <= 0xaf) $s[$i]   = chr($c - 0xa0 + 0xe0);
		else if ($c >= 0xc0 && $c <= 0xdf) $s[$i]   = chr($c - 0xc0 + 0x80);
		else if ($c >= 0xf0 && $c <= 0xff) $s[$i]   = chr($c - 0xf0 + 0xa0);
	}
	return $s;
}
function _charset_koi_win($s) {
	$kw = array(
		//00   01   02   03   04   05   06   07   08   09   0a    0b   0c    0d   0e   0f
		0x80,
		129,
		130,
		131,
		132,
		133,
		134,
		135,
		136,
		137,
		138,
		139,
		140,
		141,
		142,
		143, //0x80 - 0x8f
		144,
		145,
		146,
		147,
		148,
		149,
		150,
		151,
		152,
		153,
		154,
		0xbb,
		156,
		0xab,
		158,
		159, //0x90 - 0x9f
		160,
		161,
		162,
		184,
		164,
		165,
		166,
		167,
		168,
		169,
		170,
		171,
		172,
		173,
		174,
		175, //0xa0 - 0xaf
		176,
		177,
		178,
		179,
		180,
		181,
		182,
		183,
		184,
		185,
		186,
		187,
		188,
		189,
		190,
		191, //0xb0 - 0xbf
		254,
		224,
		225,
		246,
		228,
		229,
		244,
		227,
		245,
		232,
		233,
		234,
		235,
		236,
		237,
		238, //0xc0 - 0xcf
		239,
		255,
		240,
		241,
		242,
		243,
		230,
		226,
		252,
		251,
		231,
		248,
		253,
		249,
		247,
		250, //0xd0 - 0xdf
		222,
		192,
		193,
		214,
		196,
		197,
		212,
		195,
		213,
		200,
		201,
		202,
		203,
		204,
		205,
		206, //0xe0 - 0xef
		207,
		223,
		208,
		209,
		210,
		211,
		198,
		194,
		220,
		219,
		199,
		216,
		221,
		217,
		215,
		218
		//0xf0 - 0xff
		
	);
	for ($i  = 0;$i < strlen($s);$i++) {
		$c = ord($s[$i]);
		if ($c >= 128) $s[$i]   = chr($kw[$c - 128]);
	}
	return $s;
}
function _charset_utf8_win($s) {
	$r     = '';
	$state = 1;
	for ($i     = 0;$i < strlen($s);$i++) {
		$c = ord($s[$i]);
		switch ($state) {
			case 1: //not a special symbol
				if ($c <= 127) {
					$r .= $s[$i];
				}
				else {
					if (($c >> 5) == 6) {
						$c1    = $c;
						$state = 2;
					}
					else $r .= chr(128);
				}
				break;
			case 2: //an utf-8 encoded symbol has been meet
				$new_c2 = ($c1 & 3) * 64 + ($c & 63);
				$new_c1 = ($c1 >> 2) & 5;
				$new_i  = $new_c1 * 256 + $new_c2;
				switch ($new_i) {
					case 1025:
						$out_c  = 'Ё';
					break;
					case 1105:
						$out_c = 'ё';
					break;
					case 0x00ab:
						$out_c = '«';
					break;
					case 0x00bb:
						$out_c = '»';
					break;
					default:
						$out_c = chr($new_i - 848);
				}
				$r .= $out_c;
				$state = 1;
				break;
			}
	}
	return $r;
}
function _charset_prepare($s) {
	$r = 0;
	$k = 0;
	for ($i = 0;$i < strlen($s) && $r < 255;$i++) {
		$c = ord($s[$i]);
		if ($c >= 0x80) {
			$r++;
			$k = $i;
		}
	}
	return substr($s, 0, $k + 1);
}
function charset_win_lowercase($s) {
	for ($i = 0;$i < strlen($s);$i++) {
		$c = ord($s[$i]);
		if ($c >= 0xc0 && $c <= 0xdf) $s[$i]   = chr($c + 32);
		else if ($s[$i] >= 'A' && $s[$i] <= 'Z') $s[$i]   = chr($c + 32);
	}
	return $s;
}
function charset_x_win($s) {
	// returns a string converted from a best encoding (windows-1251 or koi-8r) to windows-1251
	$sa = _charset_prepare($s);
	$s1 = charset_win_lowercase($sa);
	$r1 = 'windows-1251';
	$c1 = _charset_count_chars($s1);
	$b1 = _charset_count_bad($s1);
	$p1 = _charset_count_pairs($s1);
	$w1 = $p1 * 32 + $b1 * 64 - $c1;
	$s2 = charset_win_lowercase(_charset_koi_win($sa));
	$w2 = - $c1; //Особенность кодировки koi-8r: тот же диапазон символов, что и для windows-1251
	if ($w2 < $w1) {
		$b2 = _charset_count_bad($s2);
		$w2 += 64 * $b2;
		if ($w2 < $w1) {
			$p2 = _charset_count_pairs($s2);
			$w2 += 32 * $p2;
			if ($w2 < $w1) {
				$r1 = 'koi-8r';
				$w1 = $w2;
			}
		}
	}
	$s2 = charset_win_lowercase(_charset_utf8_win($sa));
	$c2 = _charset_count_chars($s2);
	$w2 = - $c2;
	if ($w2 < $w1) {
		$b2 = _charset_count_bad($s2);
		$w2 += 64 * $b2;
		if ($w2 < $w1) {
			$p2 = _charset_count_pairs($s2);
			$w2 += 32 * $p2;
			if ($w2 < $w1) {
				$r1 = 'utf';
				$w1 = $w2;
			}
		}
	}
	switch ($r1) {
		case 'alt':
			return _charset_alt_win($s);
		case 'koi-8r':
			return _charset_koi_win($s);
		case 'utf':
			return _charset_utf8_win($s);
		default:
			return $s;
	}
	return $s;
}
function rcon($sz, $zreplace    = '') {
	global $connect, $server_rconpass, $server_ip, $server_port, $sleep_rcon;
		usleep($sleep_rcon);	
	if ((strpos($sz, 'tell') !== false) || (strpos($sz, 'say') !== false)) {
		if (!is_resource($connect)) {	
			$server_addr = "udp://" . $server_ip;
			@$connect     = fsockopen($server_addr, $server_port, $re, $errstr, 30);
		}
		$sz          = charset_x_win($sz);
		stream_set_timeout($connect, 0, 36000); //1e5
		fwrite($connect, "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" ' . strtr($sz, array(
			'%s'        => $zreplace
		)));
		$output = fread($connect, 1); //512
		//usleep(500*1000);
		//usleep(200);
		//echo 'DEBUG => ' . $output . "\n";
		return $output;
	}
}
function xcon($sz, $zreplace    = '') {
	global $connect, $server_rconpass, $server_ip, $server_port,$sleep_rcon;
	usleep($sleep_rcon);	
	if (!is_resource($connect)) {
		$server_addr = "udp://" . $server_ip;
		@$connect     = fsockopen($server_addr, $server_port, $re, $errstr, 30);
	}
	$sz          = charset_x_win($sz);
	stream_set_timeout($connect, 0, 36000); //1e5
	fwrite($connect, "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" ' . strtr($sz, array(
		'%s'        => $zreplace
	)));
	$output = fread($connect, 1); //512
	//usleep(500*1000);
	//usleep(200);
	//echo 'DEBUG => '.$output."\n";
	return $output;
}
// var_dump(rcon('pb_sv_ver'));
function AddToLog($s) {
	global $rules_log_file;
	$fp = fopen($rules_log_file, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToparsser($s) {
	global $glog_file;
	$fp = fopen($glog_file, 'w+');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
/////////
function Prgamename($s) {
	global $ggname_file;
	$fp = fopen($ggname_file, 'w+');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function Prshortver($s) {
	global $gshortver_file;
	$fp = fopen($gshortver_file, 'w+');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function Prservv($s) {
	global $servv_file;
	$fp = fopen($servv_file, 'w+');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
//////////
function AddTopsdpp($s) {
	global $stime_file;
	$fp = fopen($stime_file, 'w+');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function errorzz($s) {
	global $xerrrors, $filename;
	$fp = fopen($xerrrors, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function errorspdo($s) {
	global $cpath;
	$fp = fopen($cpath . 'ReCodMod/cache/x_errors/sql_pdo_errors.log', 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLogfakerz($s) {
	global $info_log_fakers;
	$fp = fopen($info_log_fakers, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLogInfo($s) {
	global $info_log_file;
	$fp = fopen($info_log_file, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function Addregggx($s) {
	global $info_log_reggg;
	$fp = fopen($info_log_reggg, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLogTOP($s) {
	global $info_log_top;
	$fp = fopen($info_log_top, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLogTOPreset($s) {
	global $info_log_top;
	$fp = fopen($info_log_top, 'w+');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLogbanlist($s) {
	global $info_log_bnlst;
	$fp = fopen($info_log_bnlst, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLogbanlistreset($s) {
	global $info_log_bnlst;
	$fp = fopen($info_log_bnlst, 'w+');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLogGUID($s) {
	global $info_log_regGUID;
	$fp = fopen($info_log_regGUID, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddCheatHelp($s) {
	global $cheater_help;
	$fp = fopen($cheater_help, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddPlayerCnt($s) {
	global $cnt_pl;
	$fp = fopen($cnt_pl, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function VoteCash($s) {
	global $rules_log_vote;
	$fp = fopen($rules_log_vote, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
//////////////////////////////MAPVOTE
function VoteCashMap($s) {
	global $rules_log_vote_map;
	$fp = fopen($rules_log_vote_map, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function VoteCashresetMap($s) {
	global $rules_log_vote_map;
	$fp = fopen($rules_log_vote_map, 'w');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
//////////////////////////////MAPVOTE
//////////////////////////////GT
function VoteCashGT($s) {
	global $rules_log_vote_gt;
	$fp = fopen($rules_log_vote_gt, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function VoteCashresetGT($s) {
	global $rules_log_vote_gt;
	$fp = fopen($rules_log_vote_gt, 'w');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
//////////////////////////////GT
function FludCash($s) {
	global $rules_log_flud_chat;
	$fp = fopen($rules_log_flud_chat, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function FludCashreset($s) {
	global $rules_log_flud_chat;
	$fp = fopen($rules_log_flud_chat, 'w');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function VoteCashreset($s) {
	global $rules_log_vote;
	$fp = fopen($rules_log_vote, 'w');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLog1($s) {
	global $log_chatcl;
	$fp = fopen($log_chatcl, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLog1clear($s) {
	global $log_chat;
	$fp = fopen($log_chat, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function AddToLog2($s) {
	global $rules_log_file2;
	$fp = fopen($rules_log_file2, 'a');
	fwrite($fp, $s . "\n");
	fclose($fp);
}
function stringrpos($haystack, $needle, $offset = NULL) {
	if (strpos($haystack, $needle, $offset) === false) return false;
	return strlen($haystack) - strpos(strrev($haystack) , strrev($needle) , $offset) - strlen($needle);
}
$local_dir = $cpath . 'ReCodMod/cache/x_logs/';
function do_upload($dir       = 'upload') {
	global $conn_id, $ftp_root, $transfer_mode, $local_dir;
	$ftp_dir   = preg_replace('~^' . $local_dir . '\/?~', '', $dir);
	if ($ftp_dir != '') echo 'Folder ' . $ftp_dir . ((ftp_mkdir($conn_id, $ftp_root . $ftp_dir)) ? ' создана' : ' не создана') . "\n";
	$filelist = glob(($dir != '') ? $dir . '/*' : '*');
	if ($filelist == array()) return 0;
	foreach ($filelist as $file) {
		if (is_file($file)) {
			$transfer_mode = (preg_match('~\.(htX|log)$~', $file)) ? FTP_BINARY : FTP_ASCII;
			echo 'File ' . $file . ((ftp_put($conn_id, $ftp_root . preg_replace('~^' . $local_dir . '\/~', '', $file) , $file, $transfer_mode)) ? ' загружен' : ' не загружен') . "\n";
		}
		else do_upload($file);
	}
	return 0;
}
function do_upload_getss($dir     = 'upload') {
	global $conn_id, $ftp_root_getss, $transfer_mode, $local_dir_getss;
	$ftp_dir = preg_replace('~^' . $local_dir_getss . '\/?~', '', $dir);
	if ($ftp_dir != '') echo 'Folder ' . $ftp_dir . ((ftp_mkdir($conn_id, $ftp_root_getss . $ftp_dir)) ? ' создана' : ' не создана') . "\n";
	$filelist = glob(($dir != '') ? $dir . '/*' : '*');
	if ($filelist == array()) return 0;
	foreach ($filelist as $file) {
		if (is_file($file)) {
			$transfer_mode = (preg_match('~\.(gif|jpg|png)$~', $file)) ? FTP_BINARY : FTP_ASCII;
			echo 'File ' . $file . ((ftp_put($conn_id, $ftp_root_getss . preg_replace('~^' . $local_dir_getss . '\/~', '', $file) , $file, $transfer_mode)) ? unlink("$file") . ' загружен' : ' не загружен') . "\n";
		}
		else do_upload_getss($file);
	}
	return 0;
}
function do_upload_databases($dir     = 'upload') {
	global $conn_id, $ftp_root_databases, $transfer_mode, $local_dir_databases;
	$ftp_dir = preg_replace('~^' . $local_dir_databases . '\/?~', '', $dir);
	if ($ftp_dir != '') echo 'Folder ' . $ftp_dir . ((ftp_mkdir($conn_id, $ftp_root_databases . $ftp_dir)) ? ' создана' : ' не создана') . "\n";
	$filelist = glob(($dir != '') ? $dir . '/*' : '*');
	if ($filelist == array()) return 0;
	foreach ($filelist as $file) {
		if (is_file($file)) {
			$transfer_mode = (preg_match('~\.(sqlite|db|database)$~', $file)) ? FTP_BINARY : FTP_ASCII;
			//echo 'File ' . $file . ((ftp_put($conn_id, $ftp_root_databases . preg_replace('~^'.$local_dir_databases.'\/~', '', $file), $file, $transfer_mode)) ? unlink("$file").' загружен' : ' не загружен')."\n";
			echo 'File ' . $file . ((ftp_put($conn_id, $ftp_root_databases . preg_replace('~^' . $local_dir_databases . '\/~', '', $file) , $file, $transfer_mode)) ? ' загружен' : ' не загружен') . "\n";
		}
		else do_upload_databases($file);
	}
	return 0;
}
function do_upload_databases2($dir     = 'upload') {
	global $conn_id, $ftp_root_databases2, $transfer_mode, $local_dir_databases2;
	$ftp_dir = preg_replace('~^' . $local_dir_databases2 . '\/?~', '', $dir);
	if ($ftp_dir != '') echo 'Folder ' . $ftp_dir . ((ftp_mkdir($conn_id, $ftp_root_databases2 . $ftp_dir)) ? ' создана' : ' не создана') . "\n";
	$filelist = glob(($dir != '') ? $dir . '/*' : '*');
	if ($filelist == array()) return 0;
	foreach ($filelist as $file) {
		if (is_file($file)) {
			$transfer_mode = (preg_match('~\.(sqlite|db|database)$~', $file)) ? FTP_BINARY : FTP_ASCII;
			//echo 'File ' . $file . ((ftp_put($conn_id, $ftp_root_databases2 . preg_replace('~^'.$local_dir_databases2.'\/~', '', $file), $file, $transfer_mode)) ? unlink("$file").' загружен' : ' не загружен')."\n";
			echo 'File ' . $file . ((ftp_put($conn_id, $ftp_root_databases2 . preg_replace('~^' . $local_dir_databases2 . '\/~', '', $file) , $file, $transfer_mode)) ? ' загружен' : ' не загружен') . "\n";
		}
		else do_upload_databases2($file);
	}
	return 0;
}
////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
$fuckmatch    = 0;
function netMatch($network, $ip) {
	$network      = trim($network);
	$orig_network = $network;
	$ip           = trim($ip);
	if ($ip == $network) {
		echo "used network ($network) for ($ip)\n";
		return true;
	}
	$network = str_replace(' ', '', $network);
	if (strpos($network, '*') !== false) {
		if (strpos($network, '/') !== false) {
			$asParts = explode('/', $network);
			$network = @$asParts[0];
		}
		$nCount  = substr_count($network, '*');
		$network = str_replace('*', '0', $network);
		if ($nCount == 1) {
			$network .= '/24';
		}
		else if ($nCount == 2) {
			$network .= '/16';
		}
		else if ($nCount == 3) {
			$network .= '/8';
		}
		else if ($nCount > 3) {
			return true; // if *.*.*.*, then all, so matched
			
		}
	}
	//echo "from original network($orig_network), used network ($network) for ($ip)\n";
	$d      = strpos($network, '-');
	if ($d === false) {
		$ip_arr = explode('/', $network);
		if (!preg_match("@\d*\.\d*\.\d*\.\d*@", $ip_arr[0], $matches)) {
			$ip_arr[0] .= ".0"; // Alternate form 194.1.4/24
			
		}
		$network_long = ip2long($ip_arr[0]);
		$x            = ip2long($ip_arr[1]);
		$mask         = long2ip($x) == $ip_arr[1] ? $x : (0xffffffff << (32 - $ip_arr[1]));
		$ip_long      = ip2long($ip);
		return ($ip_long & $mask) == ($network_long & $mask);
	}
	else {
		$from = trim(ip2long(substr($network, 0, $d)));
		$to   = trim(ip2long(substr($network, $d + 1)));
		$ip   = ip2long($ip);
		return ($ip >= $from and $ip <= $to);
	}
}
function ech($b) {
	global $fuckmatch;
	if ($b) {
		//echo "MATCHED";
		$fuckmatch   = true;
	}
	else {
		//echo "DID NOT MATCH";
		$fuckmatch   = false;
	}
}
class CRC16 {
	private static $CRC16_Table = array(
		0x0000,
		0x2110,
		0x4220,
		0x6330,
		0x8440,
		0xa550,
		0xc660,
		0xe770,
		0x0881,
		0x2991,
		0x4aa1,
		0x6bb1,
		0x8cc1,
		0xadd1,
		0xcee1,
		0xeff1,
		0x3112,
		0x1002,
		0x7332,
		0x5222,
		0xb552,
		0x9442,
		0xf772,
		0xd662,
		0x3993,
		0x1883,
		0x7bb3,
		0x5aa3,
		0xbdd3,
		0x9cc3,
		0xfff3,
		0xdee3,
		0x6224,
		0x4334,
		0x2004,
		0x0114,
		0xe664,
		0xc774,
		0xa444,
		0x8554,
		0x6aa5,
		0x4bb5,
		0x2885,
		0x0995,
		0xeee5,
		0xcff5,
		0xacc5,
		0x8dd5,
		0x5336,
		0x7226,
		0x1116,
		0x3006,
		0xd776,
		0xf666,
		0x9556,
		0xb446,
		0x5bb7,
		0x7aa7,
		0x1997,
		0x3887,
		0xdff7,
		0xfee7,
		0x9dd7,
		0xbcc7,
		0xc448,
		0xe558,
		0x8668,
		0xa778,
		0x4008,
		0x6118,
		0x0228,
		0x2338,
		0xccc9,
		0xedd9,
		0x8ee9,
		0xaff9,
		0x4889,
		0x6999,
		0x0aa9,
		0x2bb9,
		0xf55a,
		0xd44a,
		0xb77a,
		0x966a,
		0x711a,
		0x500a,
		0x333a,
		0x122a,
		0xfddb,
		0xdccb,
		0xbffb,
		0x9eeb,
		0x799b,
		0x588b,
		0x3bbb,
		0x1aab,
		0xa66c,
		0x877c,
		0xe44c,
		0xc55c,
		0x222c,
		0x033c,
		0x600c,
		0x411c,
		0xaeed,
		0x8ffd,
		0xeccd,
		0xcddd,
		0x2aad,
		0x0bbd,
		0x688d,
		0x499d,
		0x977e,
		0xb66e,
		0xd55e,
		0xf44e,
		0x133e,
		0x322e,
		0x511e,
		0x700e,
		0x9fff,
		0xbeef,
		0xdddf,
		0xfccf,
		0x1bbf,
		0x3aaf,
		0x599f,
		0x788f,
		0x8891,
		0xa981,
		0xcab1,
		0xeba1,
		0x0cd1,
		0x2dc1,
		0x4ef1,
		0x6fe1,
		0x8010,
		0xa100,
		0xc230,
		0xe320,
		0x0450,
		0x2540,
		0x4670,
		0x6760,
		0xb983,
		0x9893,
		0xfba3,
		0xdab3,
		0x3dc3,
		0x1cd3,
		0x7fe3,
		0x5ef3,
		0xb102,
		0x9012,
		0xf322,
		0xd232,
		0x3542,
		0x1452,
		0x7762,
		0x5672,
		0xeab5,
		0xcba5,
		0xa895,
		0x8985,
		0x6ef5,
		0x4fe5,
		0x2cd5,
		0x0dc5,
		0xe234,
		0xc324,
		0xa014,
		0x8104,
		0x6674,
		0x4764,
		0x2454,
		0x0544,
		0xdba7,
		0xfab7,
		0x9987,
		0xb897,
		0x5fe7,
		0x7ef7,
		0x1dc7,
		0x3cd7,
		0xd326,
		0xf236,
		0x9106,
		0xb016,
		0x5766,
		0x7676,
		0x1546,
		0x3456,
		0x4cd9,
		0x6dc9,
		0x0ef9,
		0x2fe9,
		0xc899,
		0xe989,
		0x8ab9,
		0xaba9,
		0x4458,
		0x6548,
		0x0678,
		0x2768,
		0xc018,
		0xe108,
		0x8238,
		0xa328,
		0x7dcb,
		0x5cdb,
		0x3feb,
		0x1efb,
		0xf98b,
		0xd89b,
		0xbbab,
		0x9abb,
		0x754a,
		0x545a,
		0x376a,
		0x167a,
		0xf10a,
		0xd01a,
		0xb32a,
		0x923a,
		0x2efd,
		0x0fed,
		0x6cdd,
		0x4dcd,
		0xaabd,
		0x8bad,
		0xe89d,
		0xc98d,
		0x267c,
		0x076c,
		0x645c,
		0x454c,
		0xa23c,
		0x832c,
		0xe01c,
		0xc10c,
		0x1fef,
		0x3eff,
		0x5dcf,
		0x7cdf,
		0x9baf,
		0xbabf,
		0xd98f,
		0xf89f,
		0x176e,
		0x367e,
		0x554e,
		0x745e,
		0x932e,
		0xb23e,
		0xd10e,
		0xf01e
	);
	public static function calculate($buffer) {
		$length      = strlen($buffer);
		$crc         = 0;
		$i           = 0;
		while ($length--) {
			$crc         = (($crc >> 8) & 0xff) ^ (self::$CRC16_Table[(ord($buffer[$i++]) ^ $crc) & 0xFF]);
		}
		return (($crc & 0xFFFF) ^ 0x8000) - 0x8000;
	}
}
function antimat($mat) {
	global $cpath;
	include_once ($cpath . 'ReCodMod/functions/core/classes/antimat.class.php');
	include_once ($cpath . 'ReCodMod/functions/core/classes/ReflectionTypehint.php');
	include_once ($cpath . 'ReCodMod/functions/core/classes/UTF8.php');
	//$mat = Censure::parse($mat,'10','',true,'%CENSORED%','CP1251');
	$mat = Censure::parse($mat, '10', '', true, '%CENSORED%');
	return $mat;
}
function getDirContents($dir, &$results = array()) {
	$files   = scandir($dir);
	foreach ($files as $kei     => $value) {
		$path    = realpath($dir . DIRECTORY_SEPARATOR . $value);
		if (!is_dir($path)) {
			$results[]         = $path;
		}
		else if ($value != "." && $value != "..") {
			getDirContents($path, $results);
			$results[] = $path;
		}
	}
	return $results;
}
function slowscript($low) {
	global $start, $cpath;
	$fin      = microtime(true) - $start;
	$datetime = date('Y.m.d H:i:s');
	if ($fin > 2.5) {
		$reg      = $cpath . 'ReCodMod/cache/x_errors/time_errors.log';
		if (!file_exists($reg)) touch($reg);
		$info = '[' . $datetime . '] time; ' . $fin . ' location; ' . $low;
		$fpl  = fopen($reg, 'a');
		fwrite($fpl, $info . "\n");
		fclose($fpl);
	}
	return $low;
}
function typeparser($low) {
	global $parseline, $cpath;
	$counttdot = substr_count($parseline, ';');
	if ($counttdot < 5) {
		if ((preg_match('/say;/', $parseline, $xm)) || (preg_match('/tell;/', $parseline, $xm)) || (preg_match('/sayteam;/', $parseline, $xm))) {
			$low       = 'command';
		}
	}
	else {
		$low       = 'parser';
	}
	return $low;
}
function dbGuid($uid = '') {
	global $server_ip, $uid, $odin_ip_u_vseh_serverov;
	if (!empty($odin_ip_u_vseh_serverov)) {
		$uid = '';
		return $uid;
	}
	else {
		if (strpos($server_ip, '.') !== false) {
			$pipip = explode(".", $server_ip);
			$guib  = $pipip[2] . $pipip[3];
			return $guib;
		}
		else return abs(hexdec(crc32($uid)));
	}
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
function setTimezone($default) {
	$timezone      = "";
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$comp_timezone = exec('systeminfo | findstr  /C:"Time Zone"');
		//Time Zone: (UTC +01:00) Lisbon
		//we match the last word of $comp_timezone
		preg_match_all('/(\w+)$/', $comp_timezone, $rawTz, PREG_PATTERN_ORDER);
		$rawTz = $rawTz[1][0]; //Lisbon
		foreach (DateTimeZone::listIdentifiers() as $timezone) {
			if (preg_match("/.*?\/$rawTz/", $timezone)) {
				//echo $timezone;
				date_default_timezone_set($timezone);
				echo "\033[38;5;50m Server time zone : " . $timezone;
				//Europe/Lisbon
				
			}
		}
	}
	else {
		// On many systems (Mac, for instance) "/etc/localtime" is a symlink
		// to the file with the timezone info
		if (is_link("/etc/localtime")) {
			// If it is, that file's name is actually the "Olsen" format timezone
			$filename = readlink("/etc/localtime");
			$pos      = strpos($filename, "zoneinfo");
			if ($pos) {
				// When it is, it's in the "/usr/share/zoneinfo/" folder
				$timezone = substr($filename, $pos + strlen("zoneinfo/"));
			}
			else {
				// If not, bail
				$timezone = $default;
			}
		}
		else {
			// On other systems, like Ubuntu, there's file with the Olsen time
			// right inside it.
			$timezone = file_get_contents("/etc/timezone");
			if (!strlen($timezone)) {
				$timezone = $default;
			}
		}
		date_default_timezone_set($timezone);
		echo "\033[38;5;50m Server time zone : " . $timezone;
	}
}
function get_ftp_mode($file) {
	$path_parts = pathinfo($file);
	if (!isset($path_parts['extension'])) return FTP_BINARY;
	switch (strtolower($path_parts['extension'])) {
		case 'am':
		case 'asp':
		case 'bat':
		case 'c':
		case 'cfm':
		case 'cgi':
		case 'conf':
		case 'cpp':
		case 'css':
		case 'dhtml':
		case 'diz':
		case 'h':
		case 'hpp':
		case 'htm':
		case 'html':
		case 'in':
		case 'inc':
		case 'js':
		case 'm4':
		case 'mak':
		case 'nfs':
		case 'log':
		case 'nsi':
		case 'pas':
		case 'patch':
		case 'php':
		case 'php3':
		case 'php4':
		case 'php5':
		case 'phtml':
		case 'pl':
		case 'po':
		case 'py':
		case 'qmail':
		case 'sh':
		case 'shtml':
		case 'sql':
		case 'tcl':
		case 'tpl':
		case 'txt':
		case 'vbs':
		case 'xml':
		case 'xrc':
			return FTP_ASCII;
	}
	return FTP_BINARY;
}
function time_elapsed_B($secs) {
	$bit = array(
		' year'     => $secs / 31556926 % 12,
		//' month'          => floor(($secs / 604800 % 52)/4.1),
		' week'     => $secs / 604800 % 52,
		' day'     => $secs / 86400 % 7,
		' h.'     => $secs / 3600 % 24,
		' min.'     => $secs / 60 % 60,
		//' second'    => $secs % 60
		
	);
	foreach ($bit as $k   => $v) {
		if ($v > 1) $ret[]     = $v . $k . 's';
		if ($v == 1) $ret[]     = $v . $k;
	}
	array_splice($ret, count($ret) - 1, 0, 'and');
	//$ret[] = 'ago.';
	return join(' ', $ret);
}
function findKey($array, $keySearch) {
	foreach ($array as $key => $item) {
		if ($key == $keySearch) {
			return true;
		}
		elseif (is_array($item) && findKey($item, $keySearch)) {
			return true;
		}
	}
	return false;
}
/////////////////////////////////////////###############//////////////////////////////////////////
/////////////////////////////////////////#     RCM     #//////////////////////////////////////////
//#################################         version 9         ##################################//
/////////////////////////////////////////#     ARRAY   #//////////////////////////////////////////
/////////////////////////////////////////###############//////////////////////////////////////////
function userStatus($name) {
	switch ($name) {
		case 101:
			echo "administrator";		
		case 0:
			echo "admin";
		break;
		case 1:
			echo "clan";
		break;		
		case 2:
			echo "vip";
		break;
		case 3:
			echo "registered";
		break;
		case 4:
			echo "pro";
		break;		
		case 5:
			echo "special guest";
		break;
		case 111:
			echo "developer";
		break;
		case 555:
			echo "moderator";
		break;
		case 'administrator':
			echo "101";
		break;		
		case 'admin':
			echo "0";
		break;
		case 'clan':
			echo "1";
		break;		
		case 'vip':
			echo "2";
		break;
		case 'registered':
			echo "3";
		break;
		case 'pro':
			echo "4";
		break;		
		case 'special guest':
			echo "5";
		break;
		case 'developer':
			echo "111";
		break;
		case 'moderator':
			echo "555";
		break;
	}
}
function rconExplodeNickname($num) {
	global $cpath,$server_ip,$server_port,$server_rconpass,$game_patch;
	$i_ip = '';
	require $cpath . 'ReCodMod/functions/inc_functions2.php';
	foreach ($rconarray as $j       => $e) {
		$i_id    = $e["num"];
	    $i_ping  = $e["ping"];
		$i_ip    = $e["ip"];
	 	$i_name  = $e["name"];
		$i_guid  = $e["guid"];
		 	
		if (trim(allclearsymb($num)) == trim(allclearsymb($i_name))) {
			$gi      = geoip_open($cpath . "ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
			$record  = geoip_record_by_addr($gi, $i_ip);
			if (!empty($record)) $xxccode = ($record->country_code);
			     else $xxccode = '?';
			return $i_id . ';' . $i_ping . ';' . $i_ip . ';' . $i_name . ';' . $i_guid . ';' . $xxccode;
		}
	}
	if (empty($i_ip)) return '0;0;0;0;0;0';
}
function rconExplodeIdnum($num) {
	global $cpath,$server_ip,$server_port,$server_rconpass,$game_patch;
	require $cpath . 'ReCodMod/functions/inc_functions2.php';
	foreach ($rconarray as $j       => $e) {
		$i_id    = $e["num"];
		$i_ping  = $e["ping"];
		$i_ip    = $e["ip"];
		$i_name  = $e["name"];
		$i_guid  = $e["guid"];
		if (trim($num) == trim($i_id)) {
			$gi      = geoip_open($cpath . "ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
			$record  = geoip_record_by_addr($gi, $i_ip);
			if (!empty($record)) $xxccode = ($record->country_code);
			else $xxccode = '?';
			return $i_id . ';' . $i_ping . ';' . $i_ip . ';' . $i_name . ';' . $i_guid . ';' . $xxccode;
		}
	}
	if (empty($xxccode)) return '0;0;0;0;0;0';
}
function rconExplode($guidin) {
	global $cpath,$server_ip,$server_port,$server_rconpass,$game_patch;
	if (strpos($game_patch, 'cod1') !== false)
	usleep(645000);
	include $cpath . 'ReCodMod/functions/inc_functions2.php';
/*	
echo "\n -----------------------------\n ";
var_dump($rconarray);
echo "\n -----------------------------";
*/
	foreach ($rconarray as $j       => $e) {
		$i_ping  = $e["ping"];
		$i_ip    = $e["ip"];
		$i_name  = $e["name"];
	    $i_guid  = $e["guid"];
		if (trim($i_guid)== trim($guidin)) {
			$gi      = geoip_open($cpath . "ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
			$record  = geoip_record_by_addr($gi, $i_ip);
			if (!empty($record)) 
				$xxccode = ($record->country_code);
			else $xxccode = '?';
			return $i_ping . ';' . $i_ip . ';' . $i_name . ';' . $i_guid . ';' . $xxccode;
		}
	}
	if (empty($i_ip)) return '0;0;0;0;0';
}
function inix($IniFileName, $enabler) {
	global $cpath;
	if (file_exists($cpath . 'cfg/' . $IniFileName.'.ini')) {	
	$stopscp   = 0;
	$ar        = parse_ini_file($cpath . 'cfg/' . $IniFileName.'.ini', true);
	foreach ($ar as $construct => $gq) {
		foreach ($gq as $const     => $stringq) {
			if ((strpos($const, $enabler) !== false) && ($stringq == 1)) {
				if (empty($stopscp)) $stopscp   = 1;
			}
		}
	}
	if (!empty($stopscp)) return 1;
	else return 0;
	}
}
 
////////////////////############################################/////////////////////////
////////////////////###                                      ###/////////////////////////
////////////////////###       STOCK COD1 - COD5 WEAPONS      ###/////////////////////////
if (!file_exists($cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/')) {
	if (!file_exists($cpath . 'ReCodMod/databases/player_insert/')) mkdir($cpath . 'ReCodMod/databases/player_insert/', 0777, true);
	mkdir($cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/', 0777, true);
}
require_once $cpath . 'ReCodMod/functions/weapons/cod.php';
function stock_weapons($arrayin) {
	global $cpath;
	$table_n = array();
	if (!empty($wp)) unset($wp);
	require $cpath . 'ReCodMod/functions/weapons/cod.php';
	$wps   = array_chunk($wp, 23, true);
	foreach ($wps as $numb  => $wph) {
		foreach ($wph as $wprg  => $wpnm) {
			$vow   = array(
				"-",
				"."
			);
			foreach ($arrayin as $wprgi => $wpnmi) {
				if (!empty($arrayin[$wprg])) {
					if ($wprg == $wprgi) {
						//$wprgi = str_replace($vow, "_", $wprgi);
						$wprg  = str_replace($vow, "_", $wprg);
						$table_n[$numb][$wprg]       = $wpnmi;
					}
				}
			}
		}
	}
	return $table_n;
}
////////////////////###                                      ###/////////////////////////
////////////////////###       STOCK COD1 - COD5 WEAPONS      ###/////////////////////////
////////////////////############################################/////////////////////////
$stats_array = array();
function search_values($uid, $intable, $input_value, $input_array) {
	$iy          = ';';
	foreach ($input_array as $key         => $v) {
		if ($key == $uid) {
			foreach ($v as $g           => $o) {
				if ((strpos($g, 'weapons' . $iy) !== false) || (strpos($g, 'scores' . $iy) !== false) || (strpos($g, 'damage' . $iy) !== false) || (strpos($g, 'hitzones' . $iy) !== false)) {
					list($table, $weap)              = explode(';', $g);
					//echo $table;
					if (strpos($table, $intable) !== false) {
						if ($input_value == $weap) return $o;
					}
				}
				else if (($g == 'nickname') || ($g == 'guid')) {
					if ($g == $intable) return $o;
				}
			} //}else return 'nothing';
			
		}
	}
	return null;
}
function search_values_series($uid, $intable, $input_value, $input_array) {
	$iy  = ';';
	foreach ($input_array as $key => $v) {
		if ($key == $uid) {
			foreach ($v as $g   => $o) {
				if (strpos($g, 'scores' . $iy) !== false) {
					if (strpos($g, 'series') !== false) {
						list($table, $weap)      = explode(';', $g);
						//echo $table;
						if (strpos($table, $intable) !== false) {
							if ($input_value == $weap) return $o;
						}
					}
				}
			}
		}
	}
	return null;
}
function data_values_input($uid, $intable, $input_value, $input_array) {
	$iy           = ';';
	$if           = 0;
	foreach ($input_array as $key          => $v) {
		if ($key == $uid) {
			foreach ($v as $g            => $o) {
				if ((strpos($g, 'weapons' . $iy) !== false) || (strpos($g, 'scores' . $iy) !== false) || (strpos($g, 'damage' . $iy) !== false) || (strpos($g, 'hitzones' . $iy) !== false)) {
					list($table, $weap)               = explode(';', $g);
					//echo $table;
					if (strpos($table, $intable) !== false) {
						if ($input_value == $weap) $if           = $o;
					}
				}
				else if (($g == 'nickname') || ($g == 'guid') || ($g == 'ip_adress') || ($g == 'date') || ($g == 'map') || ($g == 'city')) {
					if ($g == $intable) $if           = $o;
				}
			}
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	if ((strpos($intable, 'weapons') !== false) || (strpos($intable, 'scores') !== false) || (strpos($intable, 'hitzones') !== false) || (strpos($intable, 'damage') !== false)) $g            = $intable;
	$intable      = $intable . $iy;
	if (!empty($if)) {
		if (($g == 'nickname') || ($g == 'guid') || ($g == 'ip_adress') || ($g == 'date') || ($g == 'map') || ($g == 'city')) $input_array[$uid][$intable . $input_value]              = $input_value;
		//else if($g=='skill')
		//  $input_array[$uid][$intable.$input_value] = $input_value;
		else $input_array[$uid][$intable . $input_value]              = $if + 1;
	}
	else $input_array[$uid][$intable . $input_value]              = 1;
	// new array
	$output_array = $input_array;
	return $output_array;
}
function get_skill_from_log($playeruniqueuid, $server_ip, $server_port) {
	global $cpath;
	if (empty($istatl)) {
		$player_skill_reg = $cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/ID_SPG_' . $playeruniqueuid . '.log';
		if (file_exists($player_skill_reg)) {
			$cran             = fopen($player_skill_reg, "r");
			if ($cran) {
				while (($line             = fgets($cran)) !== false) {
					if (!empty($line)) {
						$expl             = explode("%", $line);
						$e_skill          = $expl[0];
						$e_s_pg           = $expl[1];
						////////////////////////////////////////ABS -FIX////////////////////////////////////////
						if ($e_skill < 0) $e_skill          = abs($e_skill);
						////////// skill minus fix //////////
						if (!empty($e_skill)) {
							if ($e_skill <= 100) $e_skill          = 100;
							if ($e_skill >= 2750) $e_skill          = 2750;
						}
						////////////////////////////////////////ABS -FIX////////////////////////////////////////
						if ((!empty($e_skill)) && (!empty($e_s_pg))) {
							return $e_skill;
						}
						else return null;
					}
				}
			}
		}
	}
}
function SKILLcalculation($killer_player_name, $attacker_uid, $attacker_skillc, $player_killer_guid, $death_player_name, $damaged_uid, $damaged_skill, $death_player_guid) {
	global $cpath, $skillog, $server_ip, $server_port, $egtxrun, $g_gametype, $parselinetxt;
	$new_attacker_skill = '';
	$new_damaged_skill  = '';
	/*
	                         Дельта рассчитывается по формуле: 
	                         Delta = 1/(1 + 10^((k-v)/100)). 
	                         В числителе единица, в знаменателе 1+10 в степени (k-v)/100). 
	                         k — скилл убийцы, v — скилл убитого.			
	*/
	$deltaa             = 1 / (1 + (pow(10, ((($attacker_skillc - $damaged_skill) / 1000)))));
	$delta              = substr($deltaa, 0, 8);
	if ($delta > 500) $delta              = 50;
	$new_delta          = $delta;
	$new_delta          = (floor($new_delta * 100000) / 100000) + 0.001;
	$new_delta          = substr($new_delta, 0, 8);
	$new_damaged_skill  = $damaged_skill - $new_delta;
	if ($new_damaged_skill <= 100) $new_damaged_skill  = 100;
	if ($new_damaged_skill >= 2750) $new_damaged_skill  = 2750;
	$new_attacker_skill = $attacker_skillc + $new_delta;
	if ($new_attacker_skill <= 101) $new_attacker_skill = 100;
	if ($new_attacker_skill >= 2750) $new_attacker_skill = 2750;
	if (!empty($skill_log)) {
		$skillog            = $cpath . 'ReCodMod/cache/x_logs/' . $server_ip . '_' . $server_port . '_players_skill.log';
		if (!file_exists($skillog)) touch($skillog);
		if (empty($egtxrun)) $egtxrun    = '';
		if (empty($g_gametype)) $g_gametype = '';
		$fpl        = fopen($skillog, 'a');
		fwrite($fpl, $parselinetxt . "\n");
		fwrite($fpl, "[" . $death_player_guid . "] : [$egtxrun/$g_gametype] " . $death_player_name . " : [" . $new_damaged_skill . " = " . $damaged_skill . "] Delta[ -" . $new_delta . "]  <=kill== [" . $player_killer_guid . "] : " . $killer_player_name . " : [" . $new_attacker_skill . " = " . $attacker_skillc . "] Delta[ +" . $new_delta . "]  \n\n");
		fclose($fpl);
	}
	///////////////////////////////////////////////////
	return $new_attacker_skill . ';' . $new_damaged_skill;
}
function STATS_name_replace($p) {
	$p = str_replace("'", "", $p);
	$p = str_replace("~", "", $p);
	$p = str_replace('"', '', $p);
	$p = str_replace(';', '', $p);
	$p = str_replace('*', '', $p);
	$p = str_replace('`', '', $p);
	return $p;
}
function get_skill_from_database($playeruniqueuid) {
	global $Msql_support, $db3, $msqlconnect, $host_adress, $db_name, $charset_db, $db_user, $db_pass;
	$e_skill     = '';
	try {
		if (empty($Msql_support)) {
			if (empty($db3)) $db3         = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
			$sqlup       = "SELECT * FROM db_stats_2 WHERE s_pg='$playeruniqueuid' LIMIT 1";
		}
		else {
			$dsn         = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
			if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass);
			$db3         = $msqlconnect;
			$sqlup       = "SELECT s_pg,w_skill FROM db_stats_2 WHERE s_pg='$playeruniqueuid' LIMIT 1";
		}
		$result      = $db3->query($sqlup)->fetch(PDO::FETCH_LAZY);
		if (!empty($result)) {
			foreach ($result as $key         => $value) {
				if (!empty($key)) {
					if ($key == 'w_skill') $e_skill     = $value;
					if ($key == 's_pg') $e_s_pg      = $value;
				}
			}
		}
		else {
			$e_skill     = "1000";
		}
	}
	catch(PDOException $e) {
		echo "\n\n\n ERROR 440 --------------" . $e->getMessage();
		errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
	}
	return $e_skill;
}
function txt_db($server_ip, $server_port, $guid, $name, $value, $status) {
	if (!empty($guid)) {
		global $cpath;
		// if $status = 1 write,  0 = read
		if (strpos($name, 'weapons;') !== false) $distuspl = $cpath . 'ReCodMod/databases/players_db_weapons/';
		else if (strpos($name, 'hitzones;') !== false) $distuspl = $cpath . 'ReCodMod/databases/players_db_hitzones/';
		else $distuspl = $cpath . 'ReCodMod/databases/players_db_score/';
		if ((strpos($name, 'weapons;') !== false) || (strpos($name, 'hitzones;') !== false)) list($yname, $name)           = explode(';', $name);
		if (!file_exists($distuspl)) mkdir($distuspl, 0777, true);
		$a = $distuspl . $server_ip . '_' . $server_port . '/';
		if (!file_exists($a)) mkdir($a, 0777, true);
		$mc = $a . $guid . '.txt';
		if (!file_exists($mc)) {
			$fp = fopen($mc, 'a');
			fwrite($fp, '');
			fclose($fp);
		}
		$fp   = fopen($mc, 'a+');
		$g    = 0;
		while (($line = fgets($fp, 8096)) !== false) {
			$g    = 1;
			if (strpos($line, $name) === false) {
				if ($status == 1) fwrite($fp, $name . ';' . $value . '%');
			}
			else if (strpos($line, $name) !== false) {
				//////////////////////////////////////////////////////////////
				preg_match('/' . $name . ';\d+(?:\.\d+)?%/', $line, $m);
				$expll = $m[0];
				list($fnaame, $fvalue)        = explode(';', $expll);
				$inff  = str_replace('%', '', $fvalue);
				//////////////////////////////////////////////////////////////
				if (strpos($name, 'skill') !== false) {
					$line  = str_replace($expll, $name . ';' . $value . '%', $line);
					if ($status == 1) {
						file_put_contents($mc, '');
						fwrite($fp, $line);
					}
					else {
						return $inff;
					}
				}
				else if (strpos($name, '_series_') !== false) {
					if ($value > $inff) {
						$line = str_replace($expll, $name . ';' . $value . '%', $line);
						if ($status == 1) {
							file_put_contents($mc, '');
							fwrite($fp, $line);
						}
						return $inff;
					}
				}
				else {
					$j    = (int)$value + (int)$inff;
					$line = str_replace($expll, $name . ';' . $j . '%', $line);
					if ($status == 1) {
						file_put_contents($mc, '');
						fwrite($fp, $line);
					}
					else {
						return $inff;
					}
					if ($status == 0)
					return $j;
					
				}
			}
		}
		if ($g == 0) {
			if ($status == 1) 
			{
				fwrite($fp, $name . ';' . $value . '%');
			return $name;
			}
			else
				return $g;
		}
		fclose($fp);
	}
}
 
 
function groupsIni($IniFileName, $groupname, $guid) { //rcm global path
    global $cpath;
    if (file_exists($cpath . "cfg/" . $IniFileName . ".ini")) {
        $t = 0;
        $ini_array = parse_ini_file($cpath . "cfg/" . $IniFileName . ".ini", true);
        foreach ($ini_array as $f => $r) {
            foreach ($r as $s => $ff) {
                if (is_array($ff)) {
                    foreach ($ff as $d => $dd) {
                        if ((strpos($f, $groupname) !== false) && ($guid == trim($dd))) {
                            //$f . "=" . $dd;
							if ($t == 1) return $dd;
                        }
                    }
                }
                else {
                    if ((strpos($s, 'enable') !== false) && ($ff == 1)) {
                        //return $s.">".$ff;
                        $t = 1;
                    }
                }
            }
        }
    }
}
 
function sectorIniarray($IniFileName, $groupname) { 
    global $cpath;
    if (file_exists($cpath . "cfg/" . $IniFileName . ".ini")) {
$ini_array = parse_ini_file($cpath . "cfg/" . $IniFileName . ".ini", true);
foreach($ini_array[$groupname] as $f => $r)
{ if(is_array($r)){
foreach($r as $s => $ff)
{		 
							 if ($y == 1) 
								$array[] = $ff;

} } else{ 
	   if ((strpos($f, 'enable') !== false) && ($r == 1))	
	   $y=1;
	}	
}
if(is_array($array))
return $array; 
else
return	$array = array(1,2,3);
    }
}


function costum_group_ini($config_file, $server_ip, $groupname, $guid) {
	global $cpath; $null = 'nothing.';
	if (file_exists($cpath . "cfg/" . $config_file . ".ini")) {
    $config_data = parse_ini_file($cpath . "cfg/" . $config_file . ".ini", true);
	if(!empty($config_data[$groupname][$server_ip."_".$guid]))
return $config_data[$groupname][$server_ip."_".$guid];
else
	return $null;
	}
}
 
 
function config_ini_set($config_file, $section, $key, $value) {
	global $cpath;
	if (file_exists($cpath . "cfg/" . $config_file . ".ini")) {
    $config_data = parse_ini_file($cpath . "cfg/" . $config_file . ".ini", true);
    $config_data[$section][$key] = $value;
    $new_content = '';
    foreach ($config_data as $section => $section_content) {
        $section_content = array_map(function($value, $key) {
            return "$key = $value";
        }, array_values($section_content), array_keys($section_content));
        $section_content = implode("\n", $section_content);
        $new_content .= "\n[$section]\n$section_content\n";
    }
    file_put_contents($cpath . "cfg/" . $config_file . ".ini", $new_content);
	}
}

function config_ini_del($config_file, $section, $key, $value) {
	global $cpath;
	if (file_exists($cpath . "cfg/" . $config_file . ".ini")) {
$content = file_get_contents($cpath . "cfg/" . $config_file . ".ini");
$content = str_replace($key.' = '.$value, '', $content);
file_put_contents($cpath . "cfg/" . $config_file . ".ini", $content);
	}
}

 function costumgroupsInivalues($configxe, $groupname, $varr) {
  global $cpath;	 
 $array = array(1,2,3);
 if (file_exists($cpath . "cfg/" . $configxe . ".ini")) {
 $config_data = parse_ini_file($cpath . "cfg/" . $configxe.".ini", true);
 foreach($config_data as $allgroups => $n)
 {
if($allgroups == 'costum_commands_'.$groupname)	
{
	if(is_array($n))
	{	
 foreach($n as $command => $variable)
 { 
     if($varr == 0)
	     $array[] = $command."=".$variable;
     else if($varr == 1)
		 $array[] = $command;
     else if($varr == 2)
		 $array[] = $variable;
 }}}}
return $array;
 }
}
/////////////////////////////////////////###############//////////////////////////////////////////
/////////////////////////////////////////#     RCM     #//////////////////////////////////////////
//#################################         version 9         ##################################//
/////////////////////////////////////////#     ARRAY   #//////////////////////////////////////////
/////////////////////////////////////////###############//////////////////////////////////////////

?>