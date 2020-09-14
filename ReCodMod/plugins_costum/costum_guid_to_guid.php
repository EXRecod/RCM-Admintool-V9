<?php
if (strpos($parseline, "J;") !== false) {
    $counttdot = substr_count($parseline, ';');
    if ($counttdot == 2)
        list($noon, $idk, $nickname) = explode(';', $parseline);
    else
        list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
    if (empty($guid))
        $guid = '0';
    //echo '-' . $guid . '-' . $idk . '-' . $nickname;
    $nickname = htmlentities($nickname);
    $allplugs = getDirContents($cpath . 'cfg/');
    foreach ($allplugs AS $va) {
        if (strpos($va, '.ini') !== false) {
            $ini_array = parse_ini_file($va, true);
            foreach ($ini_array as $construct => $gq) {
                $a = 0;
                foreach ($gq as $const => $stringq) {
							if(!is_array($stringq))
		{
                    if (($const . $stringq) == ("enable1")){
                         if (($construct) == ("guid2guid"))
                            $a = 1;
                    } else if ($a == 1) {
						
				    echo "\n[GUID2GUID]_".$construct;	
						
                        if (strpos($const, 'guid_') !== false) {
							   if(!empty($const))
							   {								   
                            $guidwhere = str_replace(" ", "", $stringq);
						if(!empty($guidwhere))
							   {
                            list($toguid, $fromguid) = explode(">", $guidwhere);
							
                            if (strpos($guid, $toguid) !== false) {
                                if (!empty($fromguid)) {
                                    if (!file_exists($cpath . 'ReCodMod/cache/guid2guid/'))
                                        mkdir($cpath . 'ReCodMod/cache/guid2guid/', 0777, true);
									    $stringip = str_replace(".", "_", $server_ip);
                                    if (!file_exists($cpath . 'ReCodMod/cache/guid2guid/ '.$stringip."_".$server_port.'_' . $fromguid . '_to_' . $toguid . '.log')) {
                                        $oldguidport = trim($server_port . $fromguid);
                                        $oldguid_uid = dbGuid(4) . (abs(hexdec(crc32($oldguidport))));
                                        $newguidport = trim($server_port . $toguid);
                                        $newguid_uid = dbGuid(4) . (abs(hexdec(crc32($newguidport))));
                                        try {
                                            if (empty(SqlDataBase)) {
                                                $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                                            } else {
                                                $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
                                                if (empty($msqlconnect))
                                                    $msqlconnect = new PDO($dsn, db_user, db_pass);
                                                $db3 = $msqlconnect;
                                            }
                                            $sql  = "select * FROM db_stats_0 where s_pg='" . $oldguid_uid . "' limit 1";
                                            $stat = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
                                            print_r($stat);
                                            if (!empty($stat)) {
                                                $gt  = $db3->query("DELETE FROM db_stats_0 WHERE db_stats_0.s_guid=" . $toguid . " and db_stats_0.s_port=".$svipport."");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_1 WHERE db_stats_1.s_pg=" . $newguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_2 WHERE db_stats_2.s_pg=" . $newguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_3 WHERE db_stats_3.s_pg=" . $newguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_4 WHERE db_stats_4.s_pg=" . $newguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_5 WHERE db_stats_5.s_pg=" . $newguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_hits WHERE db_stats_hits.s_pg=" . $newguid_uid . "");
                                                $gt  = null;
                                                $stq = 0;
                                                foreach ($stat as $key => $value) {
                                                    if ($key == 's_pg')
                                                        $value = $newguid_uid;
                                                    if ($key == 's_guid')
                                                        $value = $toguid;
                                                    if ($key == 'queryString')
                                                        $value = '~%~';
                                                    if ($key == 'id')
                                                        $value = '~%~';
                                                    if ($value != '~%~') {
                                                        $keyarrr[] = $key;
                                                        $valarrr[] = $value;
                                                    }
                                                }
                                                echo "\n\n", $comma_keyarrr = implode(",", $keyarrr);
                                                echo "\n", $comma_valarrr = implode("','", $valarrr);
                                                $db3->query("INSERT INTO db_stats_0 ($comma_keyarrr) VALUES ('$comma_valarrr')");
                                                unset($keyarrr);
                                                unset($valarrr);
                                                $stat = null;
                                            }
											usleep(50000);
                                            $sql  = "select * FROM db_stats_1 where s_pg='" . $oldguid_uid . "' limit 1";
                                            $stat = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
                                            if (!empty($stat)) {
                                                $stq = 0;
                                                foreach ($stat as $key => $value) {
                                                    if ($key == 's_pg')
                                                        $value = $newguid_uid;
                                                    if ($key == 'queryString')
                                                        $value = '~%~';
                                                    if ($key == 'id')
                                                        $value = '~%~';
                                                    if ($value != '~%~') {
                                                        $keyarrr[] = $key;
                                                        $valarrr[] = $value;
                                                    }
                                                }
                                                echo "\n\n", $comma_keyarrr = implode(",", $keyarrr);
                                                echo "\n", $comma_valarrr = implode("','", $valarrr);
                                                $db3->query("INSERT INTO db_stats_1 ($comma_keyarrr) VALUES ('$comma_valarrr')");
                                                unset($keyarrr);
                                                unset($valarrr);
                                                $stat = null;
                                            }
											usleep(40000);
                                            $sql  = "select * FROM db_stats_2 where s_pg='" . $oldguid_uid . "' limit 1";
                                            $stat = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
                                            if (!empty($stat)) {
                                                $stq = 0;
                                                foreach ($stat as $key => $value) {
                                                    if ($key == 's_pg')
                                                        $value = $newguid_uid;
                                                    if ($key == 'queryString')
                                                        $value = '~%~';
                                                    if ($key == 'id')
                                                        $value = '~%~';
                                                    if ($value != '~%~') {
                                                        $keyarrr[] = $key;
                                                        $valarrr[] = $value;
                                                    }
                                                }
                                                echo "\n\n", $comma_keyarrr = implode(",", $keyarrr);
                                                echo "\n", $comma_valarrr = implode("','", $valarrr);
                                                $db3->query("INSERT INTO db_stats_2 ($comma_keyarrr) VALUES ('$comma_valarrr')");
                                                unset($keyarrr);
                                                unset($valarrr);
                                                $stat = null;
                                            }
											usleep(50000);
                                            $sql  = "select * FROM db_stats_3 where s_pg='" . $oldguid_uid . "' limit 1";
                                            $stat = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
                                            if (!empty($stat)) {
                                                $stq = 0;
                                                foreach ($stat as $key => $value) {
                                                    if ($key == 's_pg')
                                                        $value = $newguid_uid;
                                                    if ($key == 'queryString')
                                                        $value = '~%~';
                                                    if ($key == 'id')
                                                        $value = '~%~';
                                                    if ($value != '~%~') {
                                                        $keyarrr[] = $key;
                                                        $valarrr[] = $value;
                                                    }
                                                }
                                                echo "\n\n", $comma_keyarrr = implode(",", $keyarrr);
                                                echo "\n", $comma_valarrr = implode("','", $valarrr);
                                                $db3->query("INSERT INTO db_stats_3 ($comma_keyarrr) VALUES ('$comma_valarrr')");
                                                unset($keyarrr);
                                                unset($valarrr);
                                                $stat = null;
                                            }
											usleep(90000);
                                            $sql  = "select * FROM db_stats_4 where s_pg='" . $oldguid_uid . "' limit 1";
                                            $stat = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
                                            if (!empty($stat)) {
                                                $stq = 0;
                                                foreach ($stat as $key => $value) {
                                                    if ($key == 's_pg')
                                                        $value = $newguid_uid;
                                                    if ($key == 'queryString')
                                                        $value = '~%~';
                                                    if ($key == 'id')
                                                        $value = '~%~';
                                                    if ($value != '~%~') {
                                                        $keyarrr[] = $key;
                                                        $valarrr[] = $value;
                                                    }
                                                }
                                                echo "\n\n", $comma_keyarrr = implode(",", $keyarrr);
                                                echo "\n", $comma_valarrr = implode("','", $valarrr);
                                                $db3->query("INSERT INTO db_stats_4 ($comma_keyarrr) VALUES ('$comma_valarrr')");
                                                unset($keyarrr);
                                                unset($valarrr);
                                                $stat = null;
                                            }
											usleep(90000);
                                            $sql  = "select * FROM db_stats_5 where s_pg='" . $oldguid_uid . "' limit 1";
                                            $stat = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
                                            if (!empty($stat)) {
                                                $stq = 0;
                                                foreach ($stat as $key => $value) {
                                                    if ($key == 's_pg')
                                                        $value = $newguid_uid;
                                                    if ($key == 'queryString')
                                                        $value = '~%~';
                                                    if ($key == 'id')
                                                        $value = '~%~';
                                                    if ($value != '~%~') {
                                                        $keyarrr[] = $key;
                                                        $valarrr[] = $value;
                                                    }
                                                }
                                                echo "\n\n", $comma_keyarrr = implode(",", $keyarrr);
                                                echo "\n", $comma_valarrr = implode("','", $valarrr);
                                                $db3->query("INSERT INTO db_stats_5 ($comma_keyarrr) VALUES ('$comma_valarrr')");
                                                unset($keyarrr);
                                                unset($valarrr);
                                                $stat = null;
                                            }
											usleep(90000);
                                            $sql  = "select * FROM db_stats_hits where s_pg='" . $oldguid_uid . "' limit 1";
                                            $stat = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
                                            if (!empty($stat)) {
                                                $stq = 0;
                                                foreach ($stat as $key => $value) {
                                                    if ($key == 's_pg')
                                                        $value = $newguid_uid;
                                                    if ($key == 'queryString')
                                                        $value = '~%~';
                                                    if ($key == 'id')
                                                        $value = '~%~';
                                                    if ($value != '~%~') {
                                                        $keyarrr[] = $key;
                                                        $valarrr[] = $value;
                                                    }
                                                }
                                                echo "\n\n", $comma_keyarrr = implode(",", $keyarrr);
                                                echo "\n", $comma_valarrr = implode("','", $valarrr);
                                                $db3->query("INSERT INTO db_stats_hits ($comma_keyarrr) VALUES ('$comma_valarrr')");
                                                unset($keyarrr);
                                                unset($valarrr);
                                                $stat = null;
                                            
											
                                                $gt  = $db3->query("DELETE FROM db_stats_0 WHERE db_stats_0.s_guid=" . $fromguid . " and db_stats_0.s_port=".$svipport."");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_1 WHERE db_stats_1.s_pg=" . $oldguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_2 WHERE db_stats_2.s_pg=" . $oldguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_3 WHERE db_stats_3.s_pg=" . $oldguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_4 WHERE db_stats_4.s_pg=" . $oldguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_5 WHERE db_stats_5.s_pg=" . $oldguid_uid . "");
                                                $gt  = null;
                                                $gt  = $db3->query("DELETE FROM db_stats_hits WHERE db_stats_hits.s_pg=" . $oldguid_uid . "");
                                                $gt  = null;											
											
											 
											
											}
                                            require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
                                        }
                                        catch (PDOException $e) {
                                            echo "\n\n\n ERROR: ", $e->getMessage();
                                            echo "\n\n\n";
                                            errorspdo('[' . $date . '] FILE:  ' . __FILE__ . ' LOADER  Exception : ' . $e->getMessage());
                                        }
                                        touch($cpath . 'ReCodMod/cache/guid2guid/ '.$stringip."_".$server_port.'_' . $fromguid . '_to_' . $toguid . '.log');
                                    }
                                }
                            }
                        }
						}
					  }
					}
                    }
                }
            }
        }
    }
}
?>