<?php
/////////////////////////////////////////////////demos 
if(!file_exists($cpath . 'ReCodMod/databases/demos1.db')){
try
  {
    $dbm3 = new PDO('sqlite:'. $cpath . 'ReCodMod/databases/demos1.db');
    $dbm3->exec("CREATE TABLE db_stats_day 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(80)  NOT NULL,
			s_pg BIGINT(20) NOT NULL,			
			w_guid varchar(32) NOT NULL,
			w_port int(5) NOT NULL,			
			s_player varchar(70)  NOT NULL,
			s_kills int(10) NOT NULL,
			s_deaths int(10) NOT NULL,							
			s_heads int(8) NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)");  
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.'] 849 ' . __FILE__ . '  Exception : ' . $e->getMessage());
       }
     }
if(!file_exists($cpath . 'ReCodMod/databases/demos2.db')){
try
  {
    $dbw3 = new PDO('sqlite:'. $cpath . 'ReCodMod/databases/demos2.db');
    $dbw3->exec("CREATE TABLE db_stats_week 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(80)  NOT NULL,
			s_pg bigint(50) NOT NULL,			
			w_guid bigint(32)  NOT NULL,
			w_port MEDIUMINT(10) NOT NULL,			
			s_player varchar(90)  NOT NULL,
			s_kills MEDIUMINT(6) NOT NULL,
			s_killsweap MEDIUMINT(6) NOT NULL,
			s_killsweap_min smallint(3) NOT NULL,
			s_deaths int(8) NOT NULL,	
			s_deathsweap_min smallint(3) NOT NULL,				
			s_heads MEDIUMINT(6) NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)");  
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.'] 875 ' . __FILE__ . '  Exception : ' . $e->getMessage());
       }
     }








if(!file_exists($cpath . 'ReCodMod/databases/dbm3.sqlite')){
try
  {
    $dbm3 = new PDO('sqlite:'. $cpath . 'ReCodMod/databases/dbm3.sqlite');
    $dbm3->exec("CREATE TABLE db_stats_day 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(80)  NOT NULL,
			s_pg BIGINT(20) NOT NULL,			
			w_guid varchar(32) NOT NULL,
			w_port int(5) NOT NULL,			
			s_player varchar(70)  NOT NULL,
			s_kills int(10) NOT NULL,
			s_deaths int(10) NOT NULL,							
			s_heads int(8) NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)");  
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.'] 906 ' . __FILE__ . '  Exception : ' . $e->getMessage());
       }
     }