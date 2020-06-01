<?php
  if (empty($Msql_support)){
if(file_exists($cpath . 'ReCodMod/databases/dbm3.sqlite')){
	$now   = time();
	$weekcday = $cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_weekcday.log'; 
	$datedayup = date('H');

	//echo "\n".$now - filemtime($weekcday)."\n";
	
	
   if(($datedayup == '00')||($datedayup == '0')||($datedayup == '24'))
   {
  
      if ($now - filemtime($weekcday) >= 120){
       
		
		unlink($cpath . 'ReCodMod/databases/dbm3.sqlite');
		
		
if(!file_exists($cpath . 'ReCodMod/databases/dbm3.sqlite'))		
		  file_put_contents($weekcday, ""); 	
		  
sleep(1);
         echo "\n UP DAY STATS";
if(!file_exists($cpath . 'ReCodMod/databases/dbm3.sqlite')){
try
  {
    $dbm3 = new PDO('sqlite:'. $cpath . 'ReCodMod/databases/dbm3.sqlite');
    $dbm3->exec("CREATE TABLE db_stats_day 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(80)  NOT NULL,
			s_pg BIGINT(20) NOT NULL,			
			w_guid varchar(32)  NOT NULL,
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
    errorspdo('['.$datetime.'] 662 ' . __FILE__ . '  Exception : ' . $e->getMessage());
       }
     }
   }
  }
}  
}
else
{
	$now   = time();
	$weekcday = $cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_weekcday.log'; 
	$datedayup = date('H');

   if(($datedayup == '00')||($datedayup == '0')||($datedayup == '24'))
   {
  
      if ($now - filemtime($weekcday) >= 120){
       
		
try
  {
 $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";	 
 if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); 
 $db3 = $msqlconnect;
 
 $db3->query("TRUNCATE TABLE db_stats_day");
 $db3 = null;
require $cpath . 'ReCodMod/functions/null_db_connection.php';   
  
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  691 ' . __FILE__ . '  Exception : ' . $e->getMessage());
   }
		 	
		  file_put_contents($weekcday, "-"); 	
		  
sleep(1);
         echo "\n UP DAY STATS";		
}}}	