<?php

if (!file_exists($cpath . 'ReCodMod/databases/sqlitechat.sqlite')){
try
{   
	
$dbc = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/sqlitechat.sqlite');
$dbc->exec('CREATE table chat(
			id INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
			servername varchar(90)  NOT NULL,
			s_port int(6)  NOT NULL,
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
			c varchar(10)  NOT NULL)');
	/*	
	$st = $dbc->query('SELECT image FROM chat');
	$result = $st->fetch();
	if (sizeof($result) == 0)
	{echo 'Table created successfully' . "\n";}
	$st = null;
    $result = null;
*/	
	$dbc = null;
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
}
catch(PDOException $e){errorspdo('['.$datetime.'] 472 ' . __FILE__ . '  Exception : ' . $e->getMessage());}
}
if (file_exists($cpath . 'ReCodMod/databases/sqlitechat.sqlite')){
if(filesize($cpath . 'ReCodMod/databases/sqlitechat.sqlite')< 2000)
{
unlink($cpath . 'ReCodMod/databases/sqlitechat.sqlite');
try
{   
	
$dbc = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/sqlitechat.sqlite');
$dbc->exec('CREATE table chat(
			id INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
			servername varchar(90)  NOT NULL,
			s_port int(6)  NOT NULL,
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
			c varchar(10)  NOT NULL)');
	/*	
	$st = $dbc->query('SELECT image FROM chat');
	$result = $st->fetch();
	if (sizeof($result) == 0)
	{echo 'Table created successfully' . "\n";}
	$st = null;
    $result = null;
*/	
	$dbc = null;
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
}
catch(PDOException $e){errorspdo('['.$datetime.'] 472 ' . __FILE__ . '  Exception : ' . $e->getMessage());} exit;}}
?>