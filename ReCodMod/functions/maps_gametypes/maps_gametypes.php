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

?>