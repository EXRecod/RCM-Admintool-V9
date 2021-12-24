<?php


if (strpos($mplogfile, 'ftp:') !== false) {
            list($ftp_exp_user, $ftp_exp_password, $ftp_exp_ip, $ftp_exp_url, $gmlobame) = explode('%', ftp2locallog($mplogfile));
	$filei = $cpath."ReCodMod/cache/server_empty_ftp_log.log"; 
        $file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
	     $posftpe = ftp_to_upload_ftp($conn_idqnew, $ftp_q_url, $filei, $file);
	
if($posftpe != false)
 { 
debuglog((__FILE__)."\n * RCM DEBUG: ".$server_ip."_".$server_port." Обнуление фтп лога. УСПЕХ! ");
if(!empty($conn_idqnew))
{
        if (is_resource($conn_idqnew)) {
            ftp_quit($conn_idqnew);
        } 
}	
$ftp_fatal_error = 1;
$fileh = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($fileh, 'w');
fputs($fp, " ---\n");
						
                        $fpb = fopen($cpath . "ReCodMod/cache/x_cache/" . $server_ip . "_" . $server_port . "_pos.txt", "w+");
                        fputs($fpb, "0");
                        fclose($fpb);
						
                        $hu = fopen($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_pos_ftp.txt', 'w+');
                        fwrite($hub, "1");
                        fclose($hub);		
	
 }
 else
 {
debuglog((__FILE__)."\n * ФАТАЛЬНАЯ ОШИБКА: НЕ МОЖЕТ ЗАГРУЗИТЬ НУЛЕВОЙ ФАЙЛ $filei НА ЗАМЕНУ и НЕ ОБНУЛИЛО $file !!! ПРОШЛО $xftp_time СЕКУНД! ".$server_ip."_".$server_port.".");
 }
	
}




//.main cfg _settings.ini LOADER
$config_data = parse_ini_file($cpath . "cfg/_settings.ini", true);
foreach ($config_data as $section => $r) {
  foreach ($r as $string => $value) {
    if (!defined($string)) define($string, $value);
  }
}
$installok = 0;
$dircachew = $cpath . "cache_ms/";
if (!is_dir($dircachew)) {
  $dircache = $cpath . "php/";
  if (!is_dir($dircache)) mkdir($dircache, 0777, true);
  if (is_dir($dircache)) {
    if (!file_exists($cpath . 'php/php.ini')) {
      if (!copy($cpath . 'ReCodMod/functions/install/php.ini', $cpath . 'php/php.ini')) echo " \n \033[37;1;1m  <<< NO COPY " . $cpath . "ReCodMod/functions/install/php.ini ... ! >>>   \n\n"; //red
      else echo " \n \033[38;5;6m  <<< COPY SUCCESS TO " . $cpath . "php/php.ini ... ! >>>   \n"; //
      
    }
  }
  $dircache = $cpath . "php/php.ini";
  if (!file_exists($dircache)) {
    echo "\033[38;5;1m Install failed!";
    sleep(30);
    exit;
  }
}
if (strpos($mplogfile, 'ftp:') !== false) {
  $mplogfilei = str_replace(array(
    "ftp://"
  ) , '', $mplogfile);
  $ftp_user_explode = explode(':', $mplogfilei);
  $ftp_exp_user = $ftp_user_explode[0];
  $ftp_pass_explode = explode('@', $ftp_user_explode[1]);
  $ftp_exp_password = $ftp_pass_explode[0];
  $mssf = explode('@', $ftp_user_explode[1]);
  $mssy = explode('/', $mssf[1]);
  $ftp_exp_ip = $mssy[0];
  $mssy = explode($mssy[0], $mssf[1]);
  $ftp_exp_url = $mssy[1];
  $gmlobame = basename($ftp_exp_url);
  if (!file_exists($cpath . "ReCodMod/cache/" . $server_ip . "_" . $server_port . '_' . $gmlobame)) {
    $hu = fopen($cpath . "ReCodMod/cache/" . $server_ip . "_" . $server_port . '_' . $gmlobame, 'w+');
    fwrite($hu, "0");
    fclose($hu);
  }
}
if ((!file_exists($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_pos.txt')) || ((empty(SqlDataBase)) && (!file_exists($cpath . 'ReCodMod/databases/db1.sqlite'))) || ((empty(SqlDataBase)) && (!file_exists($cpath . 'ReCodMod/databases/db2.sqlite'))) || ((empty(SqlDataBase)) && (!file_exists($cpath . 'ReCodMod/databases/db3.sqlite'))) || ((empty(SqlDataBase)) && (!file_exists($cpath . 'ReCodMod/databases/db4.sqlite')))) {
  echo "\n RCM FIRST INSTALL......\n";
  sleep(1);
  require $cpath . 'ReCodMod/functions/install/folders.php';
  sleep(1);
  chmod($cpath . "ReCodMod/", 0777);
  chmod($cpath . "ReCodMod/cache/x_logs/backup", 0777);
  chmod($cpath . "ReCodMod/databases/", 0777);
  chmod($cpath . "ReCodMod/cache/x_crontime/", 0777);
  chmod($cpath . "ReCodMod/cache/x_errors/", 0777);
  chmod($cpath . "ReCodMod/cache/x_logs/", 0777);
  chmod($cpath . "ReCodMod/cache/x_logs/archive/", 0777);
  chmod($cpath . "ReCodMod/cache/x_logs/archive/chat/", 0777);
  chmod($cpath . "ReCodMod/cache/x_cron/", 0777);
  chmod($cpath . "ReCodMod/cache/x_update/", 0777);
  chmod($cpath . "ReCodMod/cache/x_cache/", 0777);


  echo " Install - Folders and cache files.\n";
  sleep(1);
  touch($cpath . 'ReCodMod/cache/x_logs/' . $server_ip . '_' . $server_port . '_chat.log');
  touch($cpath . 'ReCodMod/cache/x_logs/g_log_' . $server_ip . '_' . $server_port . '.log');
  touch($cpath . 'ReCodMod/cache/x_logs/archive/chat/none.log');
  touch($cpath . 'ReCodMod/cache/x_logs/' . $server_ip . '_' . $server_port . '_chat.html');
  touch($cpath . 'ReCodMod/cache/x_logs/g_serverinformation_' . $server_ip . '_' . $server_port . '.log');
  touch($cpath . 'ReCodMod/cache/x_crontime/cron_time_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_crontime/cron_time_alba_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_crontime/cron_time_message_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_crontime/cron_time_msg_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_crontime/cron_time_players_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_crontime/cron_time1_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/');
  sleep(1);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_q_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_dbx_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_y_' . $server_ip . '_' . $server_port . '.cron');
  touch($cpath . 'ReCodMod/cache/x_cron/cron_autoban_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_gts_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_idk_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_code_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_exec1_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_exec1z_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_kicker_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_message_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_msg_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_sd_' . $server_ip . '_' . $server_port);
  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_top_' . $server_ip . '_' . $server_port);
  sleep(1);
  $handlePos = fopen($cpath . "ReCodMod/cache/x_cache/" . $server_ip . "_" . $server_port . "_pos.txt", "w+");
  fwrite($handlePos, "0");
  fclose($handlePos);
  $handlePos = fopen($cpath . "ReCodMod/cache/x_cache/" . $server_ip . "_" . $server_port . "_pos2.txt", "w+");
  fwrite($handlePos, "0");
  fclose($handlePos);
  $handlePos = fopen($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_pos_ftp.txt', 'w+');
  fwrite($handlePos, "0");
  fclose($handlePos);
  $handlePos = fopen($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_position.txt', 'w+');
  fwrite($handlePos, "0");
  fclose($handlePos);
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_temp.txt');
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_temp_day.txt');
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_temp_week.txt'); 
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_temp0.txt');
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_temp3.txt');
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_temp5.txt');
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_temp6.txt');
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_temp8.txt');
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_weekcday.log');
  touch($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_weekcronn.log');
  touch($cpath . 'ReCodMod/cache/x_update/' . $server_ip . '_' . $server_port . '_update.log');
  touch($cpath . 'ReCodMod/cache/x_errors/sql_pdo_errors.log');
  ++$installok;
  //Обновление статистики *Начало
  $statscronx = $cpath . 'ReCodMod/databases/' . $server_ip . '_' . $server_port . '_statstimer.log';
  if (!file_exists($statscronx)) touch($statscronx);
  //Обновление статистики *Конец
  if (!file_exists($cpath . 'ReCodMod/cache/stats_register/')) mkdir($cpath . 'ReCodMod/cache/stats_register/', 0777, true);
  if (!file_exists($cpath . 'ReCodMod/cache/stats_register/' . $server_ip . '_' . $server_port)) mkdir($cpath . 'ReCodMod/cache/stats_register/' . $server_ip . '_' . $server_port, 0777, true);
  if (empty(SqlDataBase)) {
    echo ' SqlDataBase is 0 - SQLITE 3 ';
    if (!file_exists($cpath . 'ReCodMod/cache/x_cache/msqlinstallok')) {
      echo ' SUCCESS! ';
      if (!file_exists($cpath . 'ReCodMod/databases/db_status.sqlite')) {
        try {
          $dbst = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db_status.sqlite');
          $dbst->exec("CREATE TABLE player_status (
  id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  guid varchar(32) NOT NULL,
  time datetime NOT NULL,
  timeh datetime NOT NULL,
  text varchar(80) NOT NULL,
  status1 varchar(24) NOT NULL,
  status1days mediumint(6) NOT NULL,
  status2 varchar(24) NOT NULL,
  status2days mediumint(6) NOT NULL)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      ////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////
      //////////////////////                                        //////////////////////
      //////////////////////        CHAT SQLITE WALL ON SITE        //////////////////////
      //////////////////////                                        //////////////////////
      ////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////
      if (!file_exists(dirname(chatdb))) {
        echo "\n\n\033[38;5;1m ERROR: \n cfg/_settings.ini  \n " . dirname(chatdb) . "  \n is false FOLDER \033[38;5;255m";
        sleep(20);
        exit;
      }
      if (!file_exists(chatdb)) {
        try {
          if (empty(SqlDataBase)) $dbc = new PDO('sqlite:' . chatdb);
          else {
            $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
            $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
            if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
            $dbc = $msqlconnect;
          }
          $dbc->exec('CREATE table chat(
			id INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
			servername varchar(90)  NOT NULL,
			s_port varchar(45) NOT NULL,
			guid varchar(40)  NOT NULL,
			nickname varchar(90)  NOT NULL,
			time datetime  NOT NULL,
			timeh datetime  NOT NULL,			
			text varchar(175)  NOT NULL,			
			st1 varchar(40)  NOT NULL,
			st1days varchar(40)  NOT NULL,			
			st2 varchar(40)  NOT NULL,
            st2days varchar(40)  NOT NULL,			
			ip varchar(16)  NOT NULL,
			geo varchar(40)  NOT NULL,
			z varchar(10)  NOT NULL,
			t varchar(10)  NOT NULL,
			x varchar(10)  NOT NULL,
			c varchar(10)  NOT NULL
	)');
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          die($e->getMessage());
        }
        $pravanadbchat = substr(sprintf('%o', fileperms(chatdb)) , -4);
        if ($pravanadbchat != '0666') chmod(chatdb, 0666);
      }
      ////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////
      //////////////////////                                        //////////////////////
      //////////////////////        CHAT SQLITE WALL ON SITE        //////////////////////
      //////////////////////                                        //////////////////////
      ////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////
      sleep(1);
      if (!file_exists($cpath . 'ReCodMod/databases/db0.sqlite')) {
        try {
          $db0 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db0.sqlite');
          $db0->exec("CREATE TABLE configs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, admin varchar(100), guid varchar(32), ip int(50), uid int(50), password int(50), cfg int(50), serverip int(50), serverport int(50), time int(50))");
          $db0->exec("CREATE TABLE getss (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, e_admin varchar(100), e_guid varchar(32), e_nick int(50), e_ip varchar(16), e_uid int(50), e_geo int(50), e_counts(5), e_time int(50))");
          $db0->exec("INSERT INTO getss ( e_admin, e_guid, e_nick, e_ip, e_uid, e_geo, e_counts, e_time ) VALUES ('GODlevel999', 'u6fguhwystaywduf76drcvb', 'imhacker', '111.222.333.444','78035820','Island','7','2016.09.30');");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      $pravanadbchat0 = substr(sprintf('%o', fileperms($cpath . 'ReCodMod/databases/db0.sqlite')) , -4);
      if ($pravanadbchat0 != '0666') chmod($cpath . 'ReCodMod/databases/db0.sqlite', 0666);
      sleep(1);
      if (!file_exists($cpath . 'ReCodMod/databases/db1.sqlite')) {
        try {
          $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
          $db->exec("CREATE TABLE x_db_admins (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, s_adm varchar(50), s_dat varchar(50), s_group varchar(10), s_guid varchar(40))");
          $db->exec("CREATE TABLE z_counts (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, s_dat varchar(50), z_time varchar(200))");
          $db->exec("CREATE TABLE x_cmd_kck (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, z_counts varchar(50), s_dat varchar(50), z_time varchar(100))");
          $db->exec("INSERT INTO x_cmd_kck ( z_counts, s_dat, z_time ) VALUES ('1', '201601010', '201601010');");
          $db->exec("INSERT INTO x_db_admins (s_adm, s_dat, s_group, s_guid ) VALUES ('90.150.107.163', '2015-12-11 14:21:18', '5', '63d6695c321f8100c6f918b43d837f74')");
          $result = $db->query('SELECT * FROM x_db_admins');
          foreach ($result as $row) {
            //echo "\n ".$row['s_guid']." ";
            
          }
          $stat = $db->query('SELECT COUNT(id) FROM x_db_admins')
            ->fetchColumn();
          //echo '  -----------   '.$stat;
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      $pravanadbchat1 = substr(sprintf('%o', fileperms($cpath . 'ReCodMod/databases/db1.sqlite')) , -4);
      if ($pravanadbchat1 != '0666') chmod($cpath . 'ReCodMod/databases/db1.sqlite', 0666);
      sleep(1);
      if (!file_exists($cpath . 'ReCodMod/databases/db2.sqlite')) {
        try {
          $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
          $db2->exec("CREATE TABLE bans (
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	playername varchar(100), 
	ip varchar(100), 
	guid varchar(40), 
	reason varchar(100), 
	time varchar(100), 
	whooo varchar(100), 
	patch varchar(10))");
          $db2->exec("CREATE TABLE amnistia (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, playername1 varchar(100), ip1 varchar(100), guid1 varchar(40), reason1 varchar(100), time1 varchar(100), whooo1 varchar(100), patch1 varchar(10), whounban1 varchar(90))");
          $db2->exec("CREATE TABLE x_ranges (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ip_ranges varchar(100), ip_info varchar(250))");
          $db2->exec("CREATE TABLE x_words (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, z_names varchar(200), z_words varchar(250), z_cmdlist varchar(250))");
          $db2->exec("CREATE TABLE z_counts (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, s_dat varchar(50), z_time varchar(200))");
          $db2->exec("INSERT INTO bans ( playername, ip, guid, reason, time, whooo, patch ) VALUES ('axaxaxaxazz23^^3#//^', '95.28.81.110', '7yfc5w87ct5nwat85cra6wt5ca6wnt5v', 'WALLHACK', '2015-12-11 14:21:18', 'LAROCCA234', '1.4');");
          $result = $db2->query('SELECT * FROM bans');
          foreach ($result as $row) {
            //echo "\n ".$row['playername']." ";
            
          }
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      $pravanadbchat2 = substr(sprintf('%o', fileperms($cpath . 'ReCodMod/databases/db2.sqlite')) , -4);
      if ($pravanadbchat2 != '0666') chmod($cpath . 'ReCodMod/databases/db2.sqlite', 0666);
      sleep(1);
      if (!file_exists($cpath . 'ReCodMod/databases/db3.sqlite')) {
        /////////////////////////////  1  //////////////////////////////////
        try {
          $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
          $db3->exec("CREATE TABLE db_stats_0 (
			id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
			s_pg bigint(20) NOT NULL,			
			s_guid varchar(32)  NOT NULL,	
			s_port varchar(32) NOT NULL,
			servername varchar(90)  NOT NULL,
			s_player varchar(80)  NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
        try {
          $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
          $db3->exec("CREATE TABLE db_stats_1 (
			id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
			s_pg BIGINT(20) NOT NULL,			
			s_kills int(8) NOT NULL,
			s_deaths int(8) NOT NULL,
			s_heads int(8) NOT NULL,			
			s_suicids int(8)  NOT NULL,
			s_fall int(8)  NOT NULL,			
			s_melle int(8) NOT NULL,
			s_dmg int(8) NOT NULL)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
        /////////////////////////////  2  //////////////////////////////////
        try {
          $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
          $db3->exec("CREATE TABLE db_stats_2 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			s_pg BIGINT(20) NOT NULL,
            s_port varchar(32) NOT NULL,			
			w_place int(5)  NOT NULL,			
			w_skill varchar(20)  NOT NULL,
			w_ratio varchar(20)  NOT NULL,			
			w_geo varchar(5)  NOT NULL,
			w_prestige int(10)  NOT NULL,
			w_fps int(5) NOT NULL,
			w_ip varchar(20)  NOT NULL,
			w_ping int(4) NOT NULL,
			n_kills int(5) NOT NULL,
			n_deaths int(5) NOT NULL,
			n_heads int(5) NOT NULL,
			n_kills_min int(2) NOT NULL,
			n_deaths_min int(2) NOT NULL)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
        /////////////////////////////  3  //////////////////////////////////
        try {
          $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
          $db3->exec("CREATE TABLE db_stats_3 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			s_pg BIGINT(20) NOT NULL,		
			claymore int(10)  NOT NULL,
			c4 int(10) NOT NULL,			
			grenade int(8) NOT NULL,
			maps int(8) NOT NULL,
			heli	int(8) NOT NULL,			
			bombs	int(8) NOT NULL,			
			avia	int(8) NOT NULL,
            artillery	int(8) NOT NULL,
			camp mediumint(6) NOT NULL,
			flags mediumint(6) NOT NULL,
			saveflags mediumint(6) NOT NULL,
			bonus mediumint(6) NOT NULL,
			series mediumint(6) NOT NULL,
			bomb_plant mediumint(6) NOT NULL,
			bomb_defused mediumint(6) NOT NULL,
			juggernaut_kill mediumint(6) NOT NULL,
			destroyed_helicopter mediumint(6) NOT NULL,
			rcxd_destroyed mediumint(6) NOT NULL,
			turret_destroyed mediumint(6) NOT NULL,
			sam_kill mediumint(6) NOT NULL)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
        /////////////////////////////  4  //////////////////////////////////
        try {
          $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
          $db3->exec("CREATE TABLE db_stats_4 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			s_pg BIGINT(20) NOT NULL,					
			ak47_ int(8) NOT NULL,
			ak74u_ int(8) NOT NULL,
			deserteagle int(8) NOT NULL,
			m40a3_ int(8) NOT NULL,
			m4_ int(8) NOT NULL,
			m1014_ int(8) NOT NULL,
			uzi_ int(8) NOT NULL,
			g3_ int(8) NOT NULL,
			g36c_ int(8) NOT NULL,
			remington700_ int(8) NOT NULL,
			mp5_ int(8) NOT NULL,
			winchester1200_ int(8) NOT NULL,
			m16_ int(8) NOT NULL,			
			m14_ int(8) NOT NULL,
			rpd_ int(8) NOT NULL,	
			m60e4_ int(8) NOT NULL,
			rpg_ int(8) NOT NULL,
            saw_ int(8) NOT NULL,
			p90_ int(8) NOT NULL,
			barrett_ int(8) NOT NULL,
			mp44_ int(8) NOT NULL,
			beretta_ int(8) NOT NULL,
			colt45_ int(8) NOT NULL,
			usp_ int(8) NOT NULL,
			dragunov_ int(8) NOT NULL,
			skorpion_ int(8) NOT NULL
			)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
        /////////////////////////////  5  //////////////////////////////////
        try {
          $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
          $db3->exec("CREATE TABLE db_stats_5 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			s_pg BIGINT(20) NOT NULL,				
			ac130_ int(8) NOT NULL,
			airstrike_ int(8) NOT NULL,
			at4_mp int(8) NOT NULL,
			aw50_ int(8) NOT NULL,
			binoculars int(8) NOT NULL,
			cobra_ int(8) NOT NULL,
			defaultweapon_mp int(8) NOT NULL,
			destructible_car int(8) NOT NULL,
			destructible_bar int(8) NOT NULL,
			hind_ffar int(8) NOT NULL,
			helicopter_ int(8) NOT NULL,
			radar_ int(8) NOT NULL
			)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        try {
          $dbc = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
          require $cpath . 'ReCodMod/functions/costum_array/weapons/cod.php';
          $wps = array_chunk($wp, 23, true);
          foreach ($wps as $numb => $wph) {
            $xxx = $db3->exec("CREATE TABLE db_weapons_$numb 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			s_pg BIGINT(28) NOT NULL)");
            $xxx = null;
            foreach ($wph as $wprg => $wpnm) {
              echo $wpnm;
              $vow = array(
                "-",
                "."
              );
              $wprg = str_replace($vow, "_", $wprg);
              usleep(100000);
              $sth = $dbc->exec("ALTER TABLE `db_weapons_$numb` ADD `$wprg` mediumint(6) NOT NULL;");
              $sth = null;
            }
          }
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////// hit zones  //////////////////////////////////
        try {
          $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
          $db3->exec("CREATE TABLE db_stats_hits 
(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
  s_pg bigint(20) NOT NULL,
  head mediumint(7) NOT NULL,
  torso_lower mediumint(7) NOT NULL,
  torso_upper mediumint(7) NOT NULL,
  right_arm_lower mediumint(7) NOT NULL,
  left_leg_upper mediumint(7) NOT NULL,
  neck mediumint(7) NOT NULL,
  right_arm_upper mediumint(7) NOT NULL,
  left_hand mediumint(7) NOT NULL,
  left_arm_lower mediumint(7) NOT NULL,
  none mediumint(7) NOT NULL,
  right_leg_upper mediumint(7) NOT NULL,
  left_arm_upper mediumint(7) NOT NULL,
  right_leg_lower mediumint(7) NOT NULL,
  left_foot mediumint(7) NOT NULL,
  right_foot mediumint(7) NOT NULL,
  right_hand mediumint(7) NOT NULL,
  left_leg_lower mediumint(7) NOT NULL
  )");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      $pravanadbchat3 = substr(sprintf('%o', fileperms($cpath . 'ReCodMod/databases/db3.sqlite')) , -4);
      if ($pravanadbchat3 != '0666') chmod($cpath . 'ReCodMod/databases/db3.sqlite', 0666);
      sleep(1);
      if (!file_exists($cpath . 'ReCodMod/databases/dbw3.sqlite')) {
        try {
          $dbw3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/dbw3.sqlite');
          $dbw3->exec("CREATE TABLE db_stats_week 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(255)  NOT NULL,
			s_pg BIGINT(20) NOT NULL,			
			w_guid varchar(32)  NOT NULL,
			w_port varchar(32) NOT NULL,			
			s_player varchar(90)  NOT NULL,
			s_kills int(10) NOT NULL,
			s_killsweap int(10) NOT NULL,
			s_killsweap_min int(10) NOT NULL,
			s_deaths int(10) NOT NULL,	
			s_deathsweap_min int(10) NOT NULL,				
			s_heads int(8) NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      sleep(1);
      if (!file_exists($cpath . 'ReCodMod/databases/dbm3.sqlite')) {
        try {
          $dbm3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/dbm3.sqlite');
          $dbm3->exec("CREATE TABLE db_stats_day
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(255)  NOT NULL,
			s_pg BIGINT(20) NOT NULL,			
			w_guid varchar(32)  NOT NULL,
			w_port varchar(32) NOT NULL,			
			s_player varchar(90)  NOT NULL,
			s_kills int(10) NOT NULL,
			s_deaths int(10) NOT NULL,							
			s_heads int(8) NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      sleep(1);
      if (!file_exists($cpath . 'ReCodMod/databases/db4.sqlite')) {
        try {
          $db4 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db4.sqlite');
          $db4->exec("CREATE TABLE x_up_players 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	ip varchar(20), 
	name varchar(80), 
	guid varchar(32))");
          $db4->exec("CREATE TABLE x_db_players 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	s_port varchar(32), 
	x_db_name varchar(90), 
	x_up_name varchar(90),
	x_db_ip varchar(30), 
	x_up_ip varchar(20),
	x_db_ping int(5), 
	x_db_guid varchar(32), 
	x_db_conn int(6), 
	x_db_date varchar(50), 
	x_db_warn int(5), 
	x_date_reg varchar(50),
	stat SMALLINT(3))");
          $db4->exec("CREATE TABLE db_stats 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	servername varchar(160), 
	s_port varchar(32), 
	s_player varchar(90), 
	s_place int(5), 
	s_kills int(10), 
	s_deaths int(10), 
	s_grenade int(10), 
	s_skill varchar(20), 
	s_ratio varchar(20), 
	s_heads int(10), 
	s_time datetime, 
	s_lasttime datetime, 
	s_city varchar(40), 
	s_clear varchar(60), 
	s_guid varchar(40), 
	s_geo varchar(10), 
	s_suicids varchar(10), 
	s_fall varchar(10),
    new_bullets varchar(50),	
	new_prestige varchar(10), 
	new_fps int(5), 
	new_ip varchar(16), 
	new_ping varchar(4),
    n_kills int(3),
    n_deaths int(3), 
    s_c4 int(8),
    s_avia int(8),
    s_maps int(8), 	
	s_melle varchar(10))");
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      if (!file_exists($cpath . 'ReCodMod/databases/db5.sqlite')) {
        echo " Install - SQL3 Database.\n";
        sleep(1);
        try {
          $db5 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db5.sqlite');
          $i_id = '1';
          $i_name = '74th5cnjscytnchzsn7t5^4^$#$%^';
          $i_ip = '111.222.333.444';
          $i_ping = '139';
          if ((!empty($i_id)) && (!empty($i_name)) && (!empty($i_ip)) && (!empty($i_ping))) {
            $db5->exec("DELETE FROM playerlist");
            $db5->exec("CREATE TABLE playerlist (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, servername varchar(160), s_port varchar(32), idnum varchar(10), name varchar(250), ip int(40), ping varchar(4))");
            $db5->exec("INSERT INTO playerlist ( servername, s_port, idnum, name, ip, ping ) VALUES ('0', '0', '0', 'anotherjam', '111.222.333.444', '666');");
          }
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      if (!file_exists($cpath . 'ReCodMod/databases/translate.sqlite')) {
        echo " Install - SQL3 Database.\n";
        sleep(1);
        try {
          $dtranslate = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/translate.sqlite');
          $dtranslate->exec("CREATE TABLE tranlslate (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, servername varchar(160), s_port varchar(32)), idnum varchar(10), name varchar(250), ip varchar(16), activate int(40), iso_country int(40), country int(40), guid varchar(32), google int(40), yandex int(40), word varchar(100))");
          $dtranslate->exec("CREATE TABLE xactivator (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, servername varchar(160), s_port varchar(32), idnum varchar(10), name varchar(250), ip varchar(16), chat int(40), geo int(40), actone int(50), acttwo int(50), actthree int(50), screen int(40), cguid varchar(32), cgoogle int(40), cyandex int(40), cword varchar(100))");
          $dtranslate = NULL;
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
      echo " Install SQLITE3 DATABASES - Ok.\n";
      sleep(1);
      ++$installok;
    }
  }
  if (!file_exists($cpath . 'ReCodMod/cache/x_cache/tempx1.txt')) touch($cpath . 'ReCodMod/cache/x_cache/tempx1.txt');
  if (!file_exists($cpath . 'ReCodMod/cache/x_cache/tempx2.txt')) touch($cpath . 'ReCodMod/cache/x_cache/tempx2.txt');
  if (!file_exists($cpath . 'ReCodMod/cache/x_cache/tempx3.txt')) touch($cpath . 'ReCodMod/cache/x_cache/tempx3.txt');
  if (!file_exists($cpath . 'ReCodMod/cache/x_cache/tempx4.txt')) touch($cpath . 'ReCodMod/cache/x_cache/tempx4.txt');
  if (!file_exists($cpath . 'ReCodMod/cache/x_cache/tempx5.txt')) touch($cpath . 'ReCodMod/cache/x_cache/tempx5.txt');
  if (!file_exists($cpath . 'ReCodMod/cache/x_cache/tempx6.txt')) touch($cpath . 'ReCodMod/cache/x_cache/tempx6.txt');
  if (!file_exists($cpath . 'ReCodMod/cache/x_cache/tempx7.txt')) touch($cpath . 'ReCodMod/cache/x_cache/tempx7.txt');
  if (!file_exists($cpath . 'ReCodMod/cache/x_cron/cron_q_' . $server_ip . '_' . $server_port)) {
    touch($cpath . 'ReCodMod/cache/x_cron/cron_q_' . $server_ip . '_' . $server_port);
    touch($cpath . 'ReCodMod/cache/x_cron/cron_gts_' . $server_ip . '_' . $server_port);
    touch($cpath . 'ReCodMod/cache/x_cron/cron_idk_' . $server_ip . '_' . $server_port);
    touch($cpath . 'ReCodMod/cache/x_cron/cron_y_' . $server_ip . '_' . $server_port);
    touch($cpath . 'ReCodMod/cache/x_cron/cron_dbx_' . $server_ip . '_' . $server_port);
    $dir = $cpath . "ReCodMod/cache/x_logs/backup";
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    chmod($cpath . "ReCodMod/cache/x_logs/backup", 0777);
    if (empty(SqlDataBase)) {
      if (!file_exists($cpath . 'ReCodMod/databases/translate.sqlite')) {
        echo " Install - SQL3 Database.\n";
        sleep(1);
        try {
          $dtranslate = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/translate.sqlite');
          $dtranslate->exec("CREATE TABLE tranlslate (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, servername varchar(160), s_port varchar(32), idnum varchar(10), name varchar(250), ip varchar(16), activate int(40), iso_country int(40), country int(40), guid varchar(32), google int(40), yandex int(40), word varchar(100))");
          $dtranslate->exec("CREATE TABLE xactivator (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, servername varchar(160), s_port varchar(32), idnum varchar(10), name varchar(250), ip varchar(16), chat int(40), geo int(40), actone int(50), acttwo int(50), actthree int(50), screen int(40), cguid varchar(32), cgoogle int(40), cyandex int(40), cword varchar(100))");
          $dtranslate = NULL;
          require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
        }
        catch(PDOException $e) {
          errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
      }
    }
  }
}
if (!empty(SqlDataBase)) {
  if (!file_exists($cpath . 'ReCodMod/cache/x_cache/msqlinstallok')) {
    $cllect = 0;
    try {
      $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
      if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass);
      $dbc = $msqlconnect;
      $query = file_get_contents($cpath . "ReCodMod/functions/install/sql/adminmod_install_msql.sql");
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      require $cpath . 'ReCodMod/functions/costum_array/weapons/cod.php';
      $wps = array_chunk($wp, 23, true);
      foreach ($wps as $numb => $wph) {
        $querys = "CREATE TABLE IF NOT EXISTS `db_weapons_$numb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(28) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
        $xxx = $dbc->exec($querys);
        $xxx = null;
        foreach ($wph as $wprg => $wpnm) {
          echo $wpnm;
          $vow = array(
            "-",
            "."
          );
          $wprg = str_replace($vow, "_", $wprg);
          usleep(100000);
          $sth = $dbc->exec("ALTER TABLE `db_weapons_$numb` ADD `$wprg` mediumint(6) NOT NULL;");
          $sth = null;
        }
      }
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////
      sleep(1);
      $dbc->exec($query);
      if ($dbc) {
        print ("Created " . db_name . " Table.\n");
        $cllect = 24;
        touch($cpath . 'ReCodMod/cache/x_cache/msqlinstallok');
      }
      else {
        $cllect = 1;
        print ("Not created main Table.\n");
        sleep(1);
      }
      require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
    }
    catch(PDOException $e) {
      echo $e->getMessage(); //Remove or change message in production code
      
    }
    if (!file_exists(chatdb)) {
      try {
        $dbc = new PDO('sqlite:' . chatdb);
        $dbc->exec('CREATE table chat(
			id INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
			servername varchar(150)  NOT NULL,
			s_port varchar(32)  NOT NULL,
			guid varchar(40)  NOT NULL,
			nickname varchar(80)  NOT NULL,
			time datetime  NOT NULL,
			timeh datetime  NOT NULL,			
			text varchar(255)  NOT NULL,			
			st1 varchar(40)  NOT NULL,
			st1days varchar(40)  NOT NULL,			
			st2 varchar(40)  NOT NULL,
            st2days varchar(40)  NOT NULL,			
			ip varchar(20)  NOT NULL,
			geo varchar(50)  NOT NULL,
			z varchar(10)  NOT NULL,
			t varchar(10)  NOT NULL,
			x varchar(10)  NOT NULL,
			c varchar(10)  NOT NULL)');
        require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
      }
      catch(PDOException $e) {
        die($e->getMessage());
      }
    }
    if (!file_exists($cpath . 'ReCodMod/databases/dbw3.sqlite')) {
      try {
        $dbw3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/dbw3.sqlite');
        $dbw3->exec("CREATE TABLE db_stats_week 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(255)  NOT NULL,
			s_pg BIGINT(20) NOT NULL,			
			w_guid varchar(32)  NOT NULL,
			w_port varchar(20) NOT NULL,			
			s_player varchar(90)  NOT NULL,
			s_kills varchar(10) NOT NULL,
			s_killsweap varchar(10) NOT NULL,
			s_killsweap_min varchar(10) NOT NULL,
			s_deaths varchar(10) NOT NULL,	
			s_deathsweap_min varchar(10) NOT NULL,				
			s_heads varchar(8) NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)");
        require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
      }
      catch(PDOException $e) {
        errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
      }
    }
    sleep(1);
    if (!file_exists($cpath . 'ReCodMod/databases/dbm3.sqlite')) {
      try {
        $dbm3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/dbm3.sqlite');
        $dbm3->exec("CREATE TABLE db_stats_day
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(255)  NOT NULL,
			s_pg BIGINT(20) NOT NULL,			
			w_guid varchar(32)  NOT NULL,
			w_port varchar(32) NOT NULL,			
			s_player varchar(90)  NOT NULL,
			s_kills int(10) NOT NULL,
			s_deaths int(10) NOT NULL,							
			s_heads int(8) NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)");
        require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
      }
      catch(PDOException $e) {
        errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
      }
    }
    if (!file_exists($cpath . 'ReCodMod/databases/db_status.sqlite')) {
      try {
        $dbst = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db_status.sqlite');
        $dbst->exec("CREATE TABLE player_status (
  id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  guid varchar(32) NOT NULL,
  time datetime NOT NULL,
  timeh datetime NOT NULL,
  text varchar(80) NOT NULL,
  status1 varchar(24) NOT NULL,
  status1days mediumint(6) NOT NULL,
  status2 varchar(24) NOT NULL,
  status2days mediumint(6) NOT NULL)");
        require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
      }
      catch(PDOException $e) {
        errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
      }
    }
    if ($cllect == 24) {
      echo "Sucsess " . $cllect . " tables instaled from 24 tables! \n";
      touch($cpath . 'ReCodMod/cache/x_cache/msqlinstallok');
      ++$installok;
    }
    else {
      echo "ERROR!!! " . $cllect . " tables instaled from 24 tables! \n";
      sleep(20);
      exit;
    }
  }
}
if (!file_exists($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_pos.txt')) {
  echo "\033[38;5;1m Install failed!";
  sleep(10);
  exit;
}
$dircache = $cpath . "win_cache_ms/";
if (!is_dir($dircache)) {
  $key = array_search('mbstring', get_loaded_extensions());
  if ($key == 0) {
    sleep(5);
    die("\n\r Please install mbString! [ sudo apt-get install php7.0-mbstring ]");
  }
  if (!empty(SQLite3::version())) {
    $version = SQLite3::version();
    $arr['description'] = 'SQLite 3';
    $arr['version'] = $version['versionString'];
    if (empty($arr['version'])) {
      sleep(5);
      die("\n\r Please install SQLITE3! [ sudo apt-get install php7.0-sqlite ]");
    }
    if (empty($arr['version'])) {
      sleep(5);
      die("\n\r Please install SQLITE3! [ sudo apt-get install php7.0-sqlite3 ]");
    }
  }
  if (stripos(curl_version() ['version'], "version") !== false) {
    if (!curl_version() ['features'] & CURL_VERSION_KERBEROS4) {
      sleep(5);
      die("\n\r CURL is not available!. [ sudo apt-get install php7.0-curl ] ");
    }
  }
  if (ini_get("register_argc_argv")) {
    echo "";
  }
  else {
    sleep(5);
    die("\n\r It isn't set!  register_argc_argv  in php.ini");
    usleep(9999999);
  }
}
$dircache = $cpath . "win_cache_ms/";
if (!is_dir($dircache)) {
  $key = array_search('mbstring', get_loaded_extensions());
  if ($key == 0) {
    sleep(5);
    die("\n\r Please install mbString! [ sudo apt-get install php7.0-mbstring ]");
  }
  if (!empty(SQLite3::version())) {
    $version = SQLite3::version();
    $arr['description'] = 'SQLite 3';
    $arr['version'] = $version['versionString'];
    if (empty($arr['version'])) {
      sleep(5);
      die("\n\r Please install SQLITE3! [ sudo apt-get install php7.0-sqlite ]");
    }
    if (empty($arr['version'])) {
      sleep(5);
      die("\n\r Please install SQLITE3! [ sudo apt-get install php7.0-sqlite3 ]");
    }
  }
  if (stripos(curl_version() ['version'], "version") !== false) {
    if (!curl_version() ['features'] & CURL_VERSION_KERBEROS4) {
      sleep(5);
      die("\n\r CURL is not available!. [ sudo apt-get install php7.0-curl ] ");
    }
  }
  if (ini_get("register_argc_argv")) {
    echo "";
  }
  else {
    sleep(5);
    die("\n\r It isn't set!  register_argc_argv  in php.ini");
    usleep(9999999);
  }
}
$dircache = $cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat";
$geoudir[] = 'https://github.com/EXRecod/RCM-Admintool-V5/raw/master/RCM/ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat';
$geoudir[] = 'https://github.com/EXRecod/RCM-Admintool-V9/raw/master/ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat';
$geoudir[] = 'http://xxxreal.ru/GeoLiteCity.dat';


foreach ($geoudir as $geof => $d)
{
if (!file_exists($dircache)) {
  echo " \n \033[38;5;23m Try to download: GeoLiteCity.dat";
  if (file_put_contents($dircache, fopen($d, 'r'))) {
    echo " \n \033[38;5;10m Downloaded: GeoLiteCity.dat";
  }
}

if ((filesize($dircache)) != 20539238) {
  echo " \n \033[0;38;5;27m Try to reupload: GeoLiteCity.dat";
  if (file_put_contents($dircache, fopen($d, 'r'))) {
    echo " \n \033[38;5;10m Downloaded: GeoLiteCity.dat";
  }
}
}

if (!file_exists($dircache)) {
  echo "\033[37;1;1m Failed Download or install GeoLiteCity.dat !";
  slowscript("SLEEP 30: Failed Download or install GeoLiteCity.dat!");
  sleep(30);
  exit;
}
?>
