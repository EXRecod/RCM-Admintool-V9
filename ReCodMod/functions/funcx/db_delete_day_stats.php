<?php
   $rule_clear_day_stats[0][0] = ' 00 : 00 ALL WEEK STATS DELETED!';		
if (isset($rule_clear_day_stats))
     {
      list($sh, $sm) = explode(' ', date('H i'));
      $sh = (int) $sh;
      $sm = (int) $sm;
      if ((isset($rule_clear_day_stats[$sh])) && (isset($rule_clear_day_stats[$sh][$sm])))
       {
        if (is_array($rule_clear_day_stats[$sh][$sm]))
         {
          foreach ($rule_clear_day_stats[$sh][$sm] as $c)
           {
try
{   
         if(empty(SqlDataBase))
    $dbm3day = new PDO('sqlite:' . $cpath .  'ReCodMod/databases/dbm3.sqlite');	
      else
   {      
    $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
 
    $dbm3day = new PDO($dsn, db_user, db_pass, $opt);        
   }
     
	$dbm3day->exec("DELETE from `db_stats_month` WHERE `id` BETWEEN 0 AND 70000");  
require $cpath . 'ReCodMod/functions/null_db_connection.php';  
	}
    catch(PDOException $e){die($e->getMessage());}
	echo $c;
	 }}}}