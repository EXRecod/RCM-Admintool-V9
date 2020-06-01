<?php
 
//Pause between CHAT ROTATION MESSAGES showing.
$msg_pause = '9999999999999999999999999999999'; //все)
 
 
 
/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
//SERVERINFO
/*	
FOR Disable => $server_info_messages = 0;
*/
  
$server_info_messages = 0;	

//SERVERINFO MESSAGES ROTATION
/*
{SERVER_IP} 
{SERVER_NAME}  
{SERVER_CURRENT_PLAYERS} 
{SERVER_MAX_PLAYERS} 
{SERVER_MAPNAME} 
{SERVER_GAMETYPE} 
*/
$servers_info_messages = '
localhost:28961#212.109.217.69:28960#91.240.86.167:28965#
[SERVERINFO] ^3{SERVER_IP} ^7{SERVER_NAME} ^7=> ^2{SERVER_CURRENT_PLAYERS} ^7/ ^2{SERVER_MAX_PLAYERS}';




//// top_week - top week players         top_day - top day players
///IN GAME CHAT ROTATION MESSAGES///

$message_center = "
^28961#28962#28963#28964#!репорт читера, !report cheater!;
^".$servers_info_messages.";
^28960#28961#top_total;
^28960#28961#28962#next_map;
^top_skill; 
^today;
^top_week; 
^top_day;
";
 
?>

