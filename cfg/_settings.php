<?php

/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
//  РУ  => Если админмод будет на другом сервере (отдельный, удаленный хостинг) 
//  в servers.cfg   ftp://имя:пароль@айпи/путь до лога/games_mp.log

//  ENG => If adminmod is on another server (separate, remote hosting) 
//  in servers.cfg ftp://name:password@ip/path to log/games_mp.log



/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
//=======================        Msql  database        ====================
 
 
	$Msql_support = 1; // 1 - Msql  0 - SqLite3
	//////////////// Under this line for $Msql_support = 1; ONLY

	$host_adress = 'localhost:3306';
    $db_name   = 'recodmod';
    $db_user = 'root';
    $db_pass = 'rootpassword';
    $charset_db = 'utf8';
	
	
	
	
	$odin_ip_u_vseh_serverov = 1; /// ЕСЛИ СТАРАЯ СИСТЕМА СТАТИСТИКИ ТО 1 СТАВИМ
	$stats_cron_database = 30;
	$banlist_v2_sync = 0;  // 1- on, 0 - off, banlist_v2.dat cod4 sync with rcm database
  
//=======================  CHAT SqLite3 Database Limit  ====================
$chatdbsize = 15; // 15.MB
//=======================  CHAT SqLite3 Database ====================
$chatdb = 'C:\______TESTER_\RCM\ReCodMod\databases\chatdb.sqlite';



/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
//********************** AUTO SCREENSHOTS ***************************
$auto_getss          = 0;  // 0 - OFF,  ON -> $auto_getss = '28960/28961/28963'; OR $auto_getss = 1; ONE SERVER/OR FOR ALL
$auto_getss_time     = 5;  // Check players every 5 MINUTES
$players_access_xget = 2;  // time limit in minutes for players !xget command access - command spam protecting!
//*******************************************************************





/*******************************************************************/
/************* AUTO DEMO + AUTO SCREENSHOTS + AUTOBAN **************/
/*******************************************************************/
/* Защита от аймеров № - 1                                         */
$procent_in_head_status  = 1;  // Псевдо защита от аймеров 1 - on  0 - Off
$procent_in_head_time    = 2;  // Частота сканирования в минутах
$procent_in_head         = 65; // Процент в голову, за   количество [procent_in_head_frags]  фрагов делает автобан
$procent_in_head_frags   = 80; // Сколько фрагов надо набить для автобана -  (не более 450 - стоит лимит)
$procent_in_head_autoban = 1;  // АУТОБАН 1 - on  0 - Off
$in_time_head            = 60;   // За сколько секунд, набиваем количество $in_time_head_total хедов
$in_time_head_total      = 7;    // Сколько хедов набиваем за время $in_time_head


/* Защита от аймеров № - 2                                         */
$headshots_1_minute = 5;                    // сколько хедов в минуту
$headshots_1_minute_autoban = 0;            // автобан 1 - да, 0 - нет
$headshots_1_minute_auto_demo = 1;          // авто демка 1 - да, 0 - нет
$headshots_1_minute_auto_screenshot = 1;    // авто скрин 1 - да, 0 - нет
$headshots_1_minute_auto_warning_chat = 0;  // ворнинг в чат) 1 - да, 0 - нет
//*******************************************************************










/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
///STATS SYSTEM - ADD BOTS IN STATS
$reg_guid_stats = 0;  // 0 - OFF(DO NOT ADD) 1 - ON(ADD BOTS IN STATISTICS SYSTEM)

$weapon_stats_system = 1;  // 0 -ОФФ  1 - ВКЛ
$stats_system = 1;         // 0 -ОФФ  1 - ВКЛ











/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */	
//=======================  Discord REPORT AND SUPORT  =======================
/* Create new webhook in your Discord channel settings and copy&paste URL                */

$webhookurl = "https://discordapp.com/api/webhooks/....";   // если пусто, типо так $webhookurl = ""; значит отключили

//======================= VKONTAKTE REPORT AND SUPORT =======================
/*
 Create new token in your vkontakte.com
 https://vkhost.github.io/ => VK API => 
Инструкция
    1.Выберите приложение
    2.Нажмите на него
    3.Затем нажмите "разрешить"
    4.Скопируйте часть адресной строки от access_token= до &expires_in                         */

$vk_token = "a8fthfthcb1f135ac3rtyryrya7dfa1e74e8fthfthfthb2f2c0c27e"; //наш токен
// если пусто, типо так $vk_token = ""; значит отключили
$vk_owners = array("98753126441");  // Можно посылать другим:  array("35312467846441","3465657647","567856869","346356735735","3737373575373");










/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
//LANGUAGES  en - english, ru - russian, de - germany, fr - france, it - italy, pl - polish, br - brazil, nl -...
$language = 'en';  







/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
//FTP SENT FILES TO ANOTHER WEB HOSTING or localhost!
$ftp_server    = '72.43.26.70';
$ftp_login     = 'ruoikketkhgkii';
$ftp_password  = '7BpKkjnjaPSk8';
//Local path to logs
$local_dir = '/media/Game_Servers/RCM/COD1_1_4_RO_SQL3/ReCodMod/cache/x_logs/';
//Local path to screenshots
$local_dir_getss = '';
//Local paths to databases
$local_dir_databases = '/media/Game_Servers/RCM/COD1_1_4_RO_SQL3/ReCodMod/databases/';
$local_dir_databases2 = '/media/Game_Servers/RCM/BAN_DATABASE/';

///SERVER ROOT FOLDERS, FOR LOGS $ftp_root, FOR IMAGES $ftp_root_getss.
$ftp_root      = '/recod.ru/public_html/rcm_logfiles/COD1_1_4_RO_SQL3/LOGS/';
$ftp_root_getss   = '/recod.ru/public_html/rcm_logfiles/COD1_1_4_RO_SQL3/GETSS/';
$ftp_root_databases   = '/recod.ru/public_html/rcm_logfiles/COD1_1_4_RO_SQL3/DATABASES/';
$ftp_root_databases2   = '/recod.ru/public_html/rcm_logfiles/COD1_1_4_RO_SQL3/BAN_DATABASE/';

////////////////////////////////////ftp autouploader////////////////////////////////////////////////
// DATABASES auto Backup
// to do  -> minimal time 5 sec to ftp host (chat.logs) 500kb autofile, 
// databases minimal time upload 2 hours
// ban database minimal time 20 minutes


//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////










/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
//rcon geo wellcome message OFF - 0, ON - 1
$geo_welcome_message = 1;
//Fast geo welcome when player connecting - 1 / When player connected - 0
$fast_geowelcome = 1;
// geo information ($geox = 1  - geo info with country and city)  ($geox = 0 - only country)
$geox = 1;
//*********** GLOBAL GEO welcome TRANSLATE *********** 
 // 0 - off   
 // 1 - on  
 $translater = 1; 
//********************************************











/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */
// Prefix for chat commands, you can use ! @ # $ % ^ * ~ ,  or letter - q w r t o r y .
$ixz = "!";   
$ixzadmins = "@";

/*

COD4x in game cfg 

add

set b3Prefix "@"
b3HideLvl "0"

*/




// KIck who want to try use admin commands!
$kicknotingrp = 1;

// game server DOMAIN NAME //clan website
$website = "xxxreal.ru"; 
 

 
 
 
 
 

/*  ################################################################################  */
/*  ################################################################################  */
/*  ################################################################################  */ 
// Without autorized cd keys with guid = 0 need web server or website connection / with guid system add ($guids = 1;) // // Support only [cod1 p1.4, p1.5, cod uo all p, cod2 all p, cod4 all p] versions  - if use $guids = 1; change to  $code = 0;
$guids = 1;    

///1 protect players stats from name and ip(no guid system) fakers / 0 - OFF
$protect_stats = 0; //UP 20 PLAYERS IN SMALL MAP dm gametype SLOW RCM ADMINMOD LOGS READING 

/////////ANTIFAKE NAMES PROTECTING
//Using another players name - warning messages for players \\\\\ 1 - ON  , 0 - OFF
$fakealert = 0;
//Protect using another players nicknames \\\\\ 1 - ON  , 0 - OFF
$namefaker = 0;
//Protect using another players nicknames with kick from server \\\\\ 1 - ON  , 0 - OFF
$namefakerkick = 0;
           
// Kick blacklisted STOPFORUMSPAM.COM ip adress, known ip proxy users from database will be kicked!
$stopforumspam = 0;   
     
// Set to your time zone, for database and logs creating.
//date_default_timezone_set( 'Europe/Kaliningrad' );  
       
// scheduler, enter $rules_schedule[hour in 24h format 0-23][minute 0-59] = 'command';
// you can also enter more commands to the same timestamp in this format: $rules_schedule[hour][minute][] = 'say Welcome!';
$rules_schedule[6][0] = 'say RCM local time is 6:00';
$rules_schedule[9][0] = 'exec a__config_day.cfg';




// $chat_protect = 0 - OFF protection
// $chat_protect = 1 - CHAT FLOOD PROTECTING,  , 
$chat_protect = 1;  
$flood_time = 1; //1 second between messages  //false off
$flood_time_cmd = 2;    /// time between messages for flood protect
$flood_time_cmd2 = 3;   /// time between command messages for flood protect
//\\************************************************************************************//\\
$wflood = '5';    //\\ Flood warns limit, after this number limit - ban!
$wswear = '10';   //\\ Swearing warns limit, after this number limit - ban!
$wspams = '2';    //\\ Spam warns limit, after this number limit - ban!
$wdislk = '3';    //\\ Server dislike warns limit, after this number limit - ban!

$timewflood = '7200';    //\\ Flood time auto unban for players! - seconds
$timewswear = '10800';   //\\ Swearing  time auto unban for players! - seconds
$timewdisliker = '10800';   //\\ Disliker - cry  time auto unban for players! - seconds

$timewspams = '2';    //\\ Spam warns limit, after this number limit - ban!
$timewdislk = '3';    //\\ Server dislike warns limit, after this number limit - ban!



//\\************************************************************************************//\\
// Deadchat beta xD  Dead chat 1 - on, 0 - off/ Death chat / beta for cod 1.1
$deadchat = 0; 



// Player can be added in top list when player has 1000 frags. Better add 5000 kills limit for !top // Less of 1000 longer top updating)
$limm = "1";   

$v_time_gtx = 100;  //gametype vote time
$v_time_map = 100;  //map vote time
$v_time_ban = 100;  //ban vote time
$v_time_kick = 100; //kick vote time
/*############################################# Main configs #############################################*/ 







//********************************************************
/// Register from website sync. // if login from website use 1, no from website login = 0 - this line supporting only with special RCM web plugins
$registerx = '0';              
//********************************************************


//********************************************************
/// Скилл лог 0 - офф
$skill_log = 0;              
//********************************************************



///////////////////////////////////////   UPDATE 17,12,2016  ////////////////////////////////////////////////

//*********** BACKUPS ***********
 // CHAT ARCHIVATOR
 $cht_archive = '2'; // 2 mb , if chat log can be more 2mb, it's make archive in x_logs/archive/chat, and remove text from chat.html and chat.log
 
 // DATABASES auto Backup
 $cht_databases = '24'; // After where number 24 is 24 hours (ONLY HOURS SUPPORT - MIN: 1, MAX: 99940) , it's make backup in x_logs/backup/
 //*******************************

//GAME LOG REGISTER
$aqrcon = 1;

$debugmodx = 0; //DEV MODE 1 - ON 0 - OFF,
?>
