<?php
if (strpos($parseline, " J;") !== false) {
    $counttdot = substr_count($parseline, ';');
    if ($counttdot == 2)
        list($noon, $idk, $nickname) = explode(';', $parseline);
    else
        list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
    if (empty($guid))
        $guid = '0';
    //echo '-' . $guid . '-' . $idk . '-' . $nickname;
    if (!empty($guid)) {
        $distuspl = $cpath . 'ReCodMod/databases/players_usernames/';
        if (!file_exists($distuspl))
            mkdir($distuspl, 0777, true);
        if (!file_exists($distuspl . $server_ip . '_' . $server_port . '/'))
            mkdir($distuspl . $server_ip . '_' . $server_port . '/', 0777, true);
        $fp = fopen($distuspl . $server_ip . '_' . $server_port . '/' . $guid . '.log', 'a+');
        if ($fp) {
            while (!feof($fp)) {
                $text = fgets($fp, 9999999);
                if (strpos($text, $nickname . '%') === false) {
                    fwrite($fp, $nickname . '%'); /// IN ONE LINE !!!!!!!!!!!!
                    try {
                        if (empty(SqlDataBase))
                            $db4 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db4.sqlite');
                        else {
                            $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
                            if (empty($msqlconnect))
                                $msqlconnect = new PDO($dsn, db_user, db_pass);
                            $db4 = $msqlconnect;
                        }
                        if (!empty($nickname)) {
                            $nicknameBD = htmlentities($nickname);
                            $stoparr    = 0;
                            
        foreach ($stats_array as $player_server_uid => $v)
        {
            $g = '';
            $o = '';
            $counter = 0;			
					$czr     = count($v); 
                    foreach ($v as $g => $o)
                    {
                        $t_guid = '';
                        $nickname = '';
                        $ip = ''; 
                        if (strpos($g, 'guid') !== false) $t_guid = $o;
                        else if (strpos($g, 'nickname') !== false) $nickname = $o;
						else if (strpos($g, 'ip_adress') !== false) $ip = $o;
						 
                        ++$counter;
						
						if($counter == $czr)
						{
						 if ($stoparr == 0) {
                                            if (trim($t_guid) == trim($guid)) { 
                                                $stoparr = 1;
                                                $rf      = $db4->query("INSERT INTO x_up_players (name, ip, guid) VALUES ('" . $nicknameBD . "','" . $ip . "','$guid')");
                                                $rf      = NULL;
                                            }
                                        }	
		}}}	 	
                        }
                        require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
                    }
                    catch (PDOException $e) {
                        die($e->getMessage());
                    }
                }
            }
        }
        fclose($fp);
    }
}
?>