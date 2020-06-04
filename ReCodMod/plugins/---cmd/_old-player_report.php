<?php

if ($x_stop_lp == 0)
	{
	$rotxv = 0;
	 
		if ((strpos($msgr, 'report ') !== false) && ($x_number != 1) || (strpos($msgr, 'support ') !== false))
			{
			$cron_time = filemtime($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_".$server_ip."_".$server_port);
			if ($stime - $cron_time >= 60 * 3)
				{
				file_put_contents($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_".$server_ip."_".$server_port, "");
				try
					{

if(empty(SqlDataBase))
{

               $db5 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db5.sqlite');
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    $db5 = new PDO($dsn, db_user, db_pass, $opt);	
   }

					$date = date('Y.m.d H'); //'Y-m-d H:i:s'
					if ($guids == 0) $sql = "SELECT * FROM playerlist WHERE name='$nickr' LIMIT 1";
					  else $sql = "SELECT * FROM playerlist WHERE name='$guidn' LIMIT 1";
					$stat = $db5->query($sql)->fetchColumn();
					if ($stat > 0)
						{
						$result = $db5->query($sql);
						foreach($result as $row)
							{
							$counts = $row['idnum'];
							$dateff = $row['ip'];
							if ($dateff == $date)
								{
								if ($counts > 2)
									{

									// ////protect the earth xD

									$furep = 3;
									$x_stop_lp = 100;
									}
								  else
									{
									if ($guids == 0) $db5->exec("UPDATE playerlist SET idnum=idnum +1 where name='$nickr'");
									  else $db5->exec("UPDATE playerlist SET idnum=idnum +1 where name='$guidn'");
									}
								}
							  else
								{
								if ($guids == 0) $db5->exec("UPDATE playerlist SET ip='$date',idnum='0' where name='$nickr'");
								  else $db5->exec("UPDATE playerlist SET ip='$date',idnum='0' where name='$guidn'");
								}
							}
						}
					  else
						{

						// if empty

						if ($guids == 0) $db5->exec("INSERT INTO playerlist ( servername, s_port, idnum, name, ip, ping ) VALUES ('$server_port', '$svipport', '0', '$nickr', '$date', '0');");
						  else $db5->exec("INSERT INTO playerlist ( servername, s_port, idnum, name, ip, ping ) VALUES ('$server_port', '$svipport', '0', '$guidn', '$date', '0');");
						}
					require $cpath . 'ReCodMod/functions/null_db_connection.php';
					}

				catch(PDOException $e)
					{
					errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
					}

				if (empty($furep)) $furep = 0;
				if (($furep == 0) && ($x_stop_lp != 100))
					{
					if ((strpos($msgr, 'support ') !== false) || (strpos($msgr, 'report ') !== false)) list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
					  else $x_idn = '';
					if ($x_idn == '')
						{
						$nickr = clearnamex($i_name);
						$x_nickx = clearnamex($nickr);
						$mmm = trim($x_nickx);
						$nnn = trim($nickr);
						if (strpos($mmm, $nnn) !== false) $iprepp = $i_ip;
						if (empty($iprepp)) $iprepp = $guidn;
						if ((trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false))
							{
							if (strpos($msgr, ixz) !== false)
								{
								if ((strpos($msgr, 'report') !== false) || (strpos($msgr, 'support') !== false))
									{
									if ((strpos($msgr, " ") !== false) || (strpos($msgr, "  ") !== false))
										{
										if ($x_stop_lp == 0)
											{
											if (strpos($admin_email, ';') !== false)
												{
												$cntnbm = substr_count($admin_email, ';');
												$countnumbs = $cntnbm + 1;
												$rotxv = 0;
												$x = 0;
												$admin_emaill = explode(';', $admin_email);
												$servernamex = preg_replace('/\s{2,}/', '_', $servernamex);
												$servernamex = preg_replace('/ {2,}/', '_', $servernamex);
												$servernamex = preg_replace('/\s+/', '_', $servernamex);
												$servernamex = preg_replace('/\s/', '_', $servernamex);
												$servernamex = str_replace(array(
													"\r\n",
													"\n",
													"\r"
												) , "_", $servernamex);
												$servernamex = str_replace("#", "_", $servernamex);
												$servernamex = str_replace("!", "_", $servernamex);
												$servernamex = str_replace("?", "_", $servernamex);
												$servernamex = str_replace("|", "_", $servernamex);
												$servernamex = str_replace("/", "_", $servernamex);
												while ($x++ < $countnumbs)
													{
													
													echo '--' . $server_ip;
													echo '--' . $server_port;
													echo '--' . $nickr;
													echo '--' . $i_ip;
													echo '--' . $admin_emaill[$rotxv];
													$msgrn = str_replace(" ", "_", $msgr);
													echo '--------->' . $msgrn;
													if (empty($servernamex)) $servernamex = $server_ip;
													
													$servernamex = clearSymbols(clearSymbols($servernamex));
													/*
													if ($curl = curl_init()) {
													curl_setopt($curl, CURLOPT_URL, 'http://xxxreal.ru/cod_report_master/codsender.php?emailz=' . $admin_emaill[$rotxv] . '&mpass=' . $gmailpass . '&sended=' . clearSymbols($nickrn) . '%' . clearSymbols($msgrn) . '&userip=' . $iprepp . '&serverip=' . matmat($servernamex) . ':' . $server_port);
													curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
													curl_setopt($curl, CURLOPT_POST, true);
													curl_setopt($curl, CURLOPT_POSTFIELDS, "");
													$out = curl_exec($curl);
													echo $out;
													curl_close($curl);
													}

													*/
													$msg = 'Nickname: ' . clearSymbols($nickrn) . ' Message: ' . clearSymbols($msgrn) . ' UserIp: ' . $iprepp . ' ServerIp: ' . clearSymbols($servernamex) . ':' . $server_ip."_".$server_port;
													if (!empty(webhookurl_enable))
														{
														if (!empty($msg))
															{
															$json_data = array(
																'content' => "$msg"
															);
															$make_json = json_encode($json_data);
															sleep(2);
															if ($ch = curl_init(webhookurl))
																{
																curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ---
																curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // ---
																curl_setopt($ch, CURLOPT_POST, 1);
																curl_setopt($ch, CURLOPT_POSTFIELDS, $make_json);
																curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
																curl_setopt($ch, CURLOPT_HEADER, 0);
																curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
																$response = curl_exec($ch);
																curl_close($ch);
																}
															}
														}

													if (!empty($vk_token))
														{
														if (!empty($msg))
															{
															foreach($vk_owners as $vk_owner_id)
																{
																sleep(2);
																$url = 'https://api.vk.com/method/wall.post';
																$post = 'owner_id=' . $vk_owner_id . '&access_token=' . $vk_token . '&from_group=1&message=' . $msg . '&signed=0&v=5.42';
																if ($curl = curl_init())
																	{
																	curl_setopt($curl, CURLOPT_URL, $url);
																	curl_setopt($curl, CURLOPT_HEADER, 0);
																	curl_setopt($curl, CURLOPT_NOBODY, 0);
																	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
																	curl_setopt($curl, CURLOPT_POST, true);
																	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
																	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
																	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
																	$out = curl_exec($curl);
																	curl_close($curl);
																	return $out;
																	}
																}
															}
														}

													// TEST LINE   http://xxxreal.ru/cod_report_master/codsender.php?emailz=yaeriks@yandex.ru&mpass=p&sended=pLAYER999%i have probleeem&userip=111.222.333.444&serverip=192.40.23.21:29000

													if (!empty($idnum))
														{
														if ($idnum != 'false')
															{
															rcon('tell ' . $idnum . ' ^1' . $reppport, '');
															}
														  else
															{
															rcon('say ^1' . $reppport, '');
															}
														}

													$message = AddCheatHelp("[" . $datetime . "] CHEATER ALARM: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
													++$x_number;
													echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
													++$x_stop_lp; //return;
													++$rotxv;
													}
												}
											  else
												{
												if ($x_stop_lp == 0)
													{
													echo '--' . $server_ip;
													echo '--' . $server_port;
													echo '--' . $nickr;
													echo '--' . $i_ip;
													echo '--';
													$servernamex = preg_replace('/\s{2,}/', '_', $servernamex);
													$servernamex = preg_replace('/ {2,}/', '_', $servernamex);
													$servernamex = preg_replace('/\s+/', '_', $servernamex);
													$servernamex = preg_replace('/\s/', '_', $servernamex);
													$servernamex = str_replace(array(
														"\r\n",
														"\n",
														"\r"
													) , "_", $servernamex);
													$servernamex = str_replace("#", "_", $servernamex);
													$servernamex = str_replace("!", "_", $servernamex);
													$servernamex = str_replace("?", "_", $servernamex);
													$servernamex = str_replace("|", "_", $servernamex);
													$servernamex = str_replace("/", "_", $servernamex);
													$msgrn = str_replace(" ", "_", $msgr);
													echo '--------->' . $msgrn;
													if (empty($servernamex)) $servernamex = $server_ip;
													/*
													if ($curl = curl_init()) {
													curl_setopt($curl, CURLOPT_URL, 'http://xxxreal.ru/cod_report_master/codsender.php?emailz=' . $admin_email . '&mpass=' . $gmailpass . '&sended=' . clearSymbols($nickrn) . '%' . clearSymbols($msgrn) . '&userip=' . $iprepp . '&serverip=' . clearSymbols($servernamex) . ':' . $server_port);
													curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
													curl_setopt($curl, CURLOPT_POST, true);
													curl_setopt($curl, CURLOPT_POSTFIELDS, "");
													$out = curl_exec($curl);
													echo $out;
													curl_close($curl);
													}

													*/
													$msg = 'Nickname: ' . clearSymbols($nickrn) . ' Message: ' . clearSymbols($msgrn) . ' UserIp: ' . $iprepp . ' ServerIp: ' . clearSymbols($servernamex) . ':' . $server_ip."_".$server_port;
													if (!empty(webhookurl_enable))
														{
														if (!empty($msg))
															{
															$json_data = array(
																'content' => "$msg"
															);
															$make_json = json_encode($json_data);
															sleep(2);
															if ($ch = curl_init(webhookurl))
																{
																curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ---
																curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // ---
																curl_setopt($ch, CURLOPT_POST, 1);
																curl_setopt($ch, CURLOPT_POSTFIELDS, $make_json);
																curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
																curl_setopt($ch, CURLOPT_HEADER, 0);
																curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
																$response = curl_exec($ch);
																curl_close($ch);
																}
															}
														}

													if (!empty($vk_token))
														{
														if (!empty($msg))
															{
															foreach($vk_owners as $vk_owner_id)
																{
																sleep(2);
																$url = 'https://api.vk.com/method/wall.post';
																$post = 'owner_id=' . $vk_owner_id . '&access_token=' . $vk_token . '&from_group=1&message=' . $msg . '&signed=0&v=5.42';
																if ($curl = curl_init())
																	{
																	curl_setopt($curl, CURLOPT_URL, $url);
																	curl_setopt($curl, CURLOPT_HEADER, 0);
																	curl_setopt($curl, CURLOPT_NOBODY, 0);
																	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
																	curl_setopt($curl, CURLOPT_POST, true);
																	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
																	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
																	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
																	$out = curl_exec($curl);
																	curl_close($curl);
																	return $out;
																	}
																}
															}
														}

													// TEST LINE   http://xxxreal.ru/cod_report_master/codsender.php?emailz=yaeriks@yandex.ru&mpass=&sended=pLAYER999%i have probleeem&userip=111.222.333.444&serverip=192.40.23.21:29000

													
													if ($idnum != 'false') rcon('tell ' . $idnum . ' ^1' . $reppport, '');
													  else rcon('say ^1' . $reppport, '');
													$message = AddCheatHelp("[" . $datetime . "] CHEATER ALARM: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
													++$x_number;
													echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
													++$x_stop_lp; //return;
													}
												}
											}
										}
									}
								}
							}
						}
					  else
						{
						$nickr = clearnamex($i_name);
						$x_nickx = clearnamex($nickr);
						$mmm = trim($x_nickx);
						$nnn = trim($nickr);
						
						if (!empty($mmm)){
						if (!empty($nnn)){
							
						if (strpos($mmm, $nnn) !== false) $iprepp = $i_ip;
						if (empty($iprepp)) $iprepp = $guidn;
						$i_namex = clearSymbols($i_name);
						if ($x_idn)
							{
							if (strpos($msgr, ixz) !== false)
								{
								if ((strpos($msgr, 'report') !== false) || (strpos($msgr, 'support') !== false))
									{
									if ((strpos($msgr, ' ') !== false) || (strpos($msgr, '  ') !== false))
										{
										if ($x_stop_lp == 0)
											{
											if (strpos($admin_email, ';') !== false)
												{
												$cntnbm = substr_count($admin_email, ';');
												$countnumbs = $cntnbm + 1;
												$rotxv = 0;
												$x = 0;
												$admin_emaill = explode(';', $admin_email);
												$servernamex = preg_replace('/\s{2,}/', '_', $servernamex);
												$servernamex = preg_replace('/ {2,}/', '_', $servernamex);
												$servernamex = preg_replace('/\s+/', '_', $servernamex);
												$servernamex = preg_replace('/\s/', '_', $servernamex);
												$servernamex = str_replace(array(
													"\r\n",
													"\n",
													"\r"
												) , "_", $servernamex);
												$servernamex = str_replace("#", "_", $servernamex);
												$servernamex = str_replace("!", "_", $servernamex);
												$servernamex = str_replace("?", "_", $servernamex);
												$servernamex = str_replace("|", "_", $servernamex);
												$servernamex = str_replace("/", "_", $servernamex);
												while ($x++ < $countnumbs)
													{
													
													echo '--' . $server_ip;
													echo '--' . $server_port;
													echo '--' . $nickr;
													echo '--' . $i_ip;
													echo '--' . $admin_emaill[$rotxv];
													$msgrn = str_replace(" ", "_", $msgr);
													$nickrn = str_replace(" ", "_", $nickr);
													echo '--------->' . $msgrn;
													if (empty($servernamex)) $servernamex = $server_ip;
													
													/*
													if ($curl = curl_init()) {
													curl_setopt($curl, CURLOPT_URL, 'http://xxxreal.ru/cod_report_master/codsender.php?emailz=' . $admin_emaill[$rotxv] . '&mpass=' . $gmailpass . '&sended=' . clearSymbols($nickrn) . '%' . clearSymbols($msgrn) . '&userip=' . $iprepp . '&serverip=' . clearSymbols($servernamex) . ':' . $server_port);
													curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
													curl_setopt($curl, CURLOPT_POST, true);
													curl_setopt($curl, CURLOPT_POSTFIELDS, "");
													$out = curl_exec($curl);
													echo $out;
													curl_close($curl);
													}

													*/
													$msg = 'Nickname: ' . clearSymbols($nickrn) . ' Message: ' . clearSymbols($msgrn) . ' UserIp: ' . $iprepp . ' ServerIp: ' . clearSymbols($servernamex) . ':' . $server_ip."_".$server_port;
													if (!empty(webhookurl_enable))
														{
														if (!empty($msg))
															{
															$json_data = array(
																'content' => "$msg"
															);
															$make_json = json_encode($json_data);
															sleep(2);
															if ($ch = curl_init(webhookurl))
																{
																curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ---
																curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // ---
																curl_setopt($ch, CURLOPT_POST, 1);
																curl_setopt($ch, CURLOPT_POSTFIELDS, $make_json);
																curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
																curl_setopt($ch, CURLOPT_HEADER, 0);
																curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
																$response = curl_exec($ch);
																curl_close($ch);
																}
															}
														}

													if (!empty($vk_token))
														{
														if (!empty($msg))
															{
															foreach($vk_owners as $vk_owner_id)
																{
																sleep(2);
																$url = 'https://api.vk.com/method/wall.post';
																$post = 'owner_id=' . $vk_owner_id . '&access_token=' . $vk_token . '&from_group=1&message=' . $msg . '&signed=0&v=5.42';
																if ($curl = curl_init())
																	{
																	curl_setopt($curl, CURLOPT_URL, $url);
																	curl_setopt($curl, CURLOPT_HEADER, 0);
																	curl_setopt($curl, CURLOPT_NOBODY, 0);
																	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
																	curl_setopt($curl, CURLOPT_POST, true);
																	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
																	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
																	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
																	$out = curl_exec($curl);
																	curl_close($curl);
																	return $out;
																	}
																}
															}
														}

													if ($idnum != 'false') rcon('tell ' . $idnum . ' ^1' . $reppport . '', '');
													  else rcon('say ^1' . $reppport . '', '');
													AddToLogInfo("[" . $datetime . "] REPORTED: " . $i_ip . " (" . $nickr . ") (" . $msgr . ") reason: G+id");
													++$x_number;
													echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
													++$x_stop_lp; //return;
													++$rotxv;
													}
												}
											  else
												{
												echo '--' . $server_ip;
												echo '--' . $server_port;
												echo '--' . $nickr;
												echo '--' . $i_ip;
												echo '--';
												$msgrn = str_replace(" ", "_", $msgr);
												$nickrn = str_replace(" ", "_", $nickr);
												$servernamex = preg_replace('/\s{2,}/', '_', $servernamex);
												$servernamex = preg_replace('/ {2,}/', '_', $servernamex);
												$servernamex = preg_replace('/\s+/', '_', $servernamex);
												$servernamex = preg_replace('/\s/', '_', $servernamex);
												$servernamex = str_replace(array(
													"\r\n",
													"\n",
													"\r"
												) , "_", $servernamex);
												$servernamex = str_replace("#", "_", $servernamex);
												$servernamex = str_replace("!", "_", $servernamex);
												$servernamex = str_replace("?", "_", $servernamex);
												$servernamex = str_replace("|", "_", $servernamex);
												$servernamex = str_replace("/", "_", $servernamex);
												echo '--------->' . $msgrn;
												if (empty($servernamex)) $servernamex = $server_ip;
												/*
												if ($curl = curl_init()) {
												curl_setopt($curl, CURLOPT_URL, 'http://xxxreal.ru/cod_report_master/codsender.php?emailz=' . $admin_email . '&mpass=' . $gmailpass . '&sended=' . clearSymbols($nickrn) . '%' . clearSymbols($msgrn) . '&userip=' . $iprepp . '&serverip=' . clearSymbols($servernamex) . ':' . $server_port);
												curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
												curl_setopt($curl, CURLOPT_POST, true);
												curl_setopt($curl, CURLOPT_POSTFIELDS, "");
												$out = curl_exec($curl);
												echo $out;
												curl_close($curl);
												}

												*/
												$msg = 'Nickname: ' . clearSymbols($nickrn) . ' Message: ' . clearSymbols($msgrn) . ' UserIp: ' . $iprepp . ' ServerIp: ' . clearSymbols($servernamex) . ':' . $server_ip."_".$server_port;
												if (!empty(webhookurl_enable))
													{
													if (!empty($msg))
														{
														$json_data = array(
															'content' => "$msg"
														);
														$make_json = json_encode($json_data);
														sleep(2);
														if ($ch = curl_init(webhookurl))
															{
															curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ---
															curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // ---
															curl_setopt($ch, CURLOPT_POST, 1);
															curl_setopt($ch, CURLOPT_POSTFIELDS, $make_json);
															curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
															curl_setopt($ch, CURLOPT_HEADER, 0);
															curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
															$response = curl_exec($ch);
															curl_close($ch);
															}
														}
													}

												if (!empty($vk_token))
													{
													if (!empty($msg))
														{
														foreach($vk_owners as $vk_owner_id)
															{
															sleep(2);
															$url = 'https://api.vk.com/method/wall.post';
															$post = 'owner_id=' . $vk_owner_id . '&access_token=' . $vk_token . '&from_group=1&message=' . $msg . '&signed=0&v=5.42';
															if ($curl = curl_init())
																{
																curl_setopt($curl, CURLOPT_URL, $url);
																curl_setopt($curl, CURLOPT_HEADER, 0);
																curl_setopt($curl, CURLOPT_NOBODY, 0);
																curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
																curl_setopt($curl, CURLOPT_POST, true);
																curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
																curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
																curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
																$out = curl_exec($curl);
																curl_close($curl);
																return $out;
																}
															}
														}
													}

												
												if (!empty($idnum))
													{
													if ($idnum != 'false')
														{
														rcon('tell ' . $idnum . ' ^1' . $reppport . '', '');
														}
													  else
														{
														rcon('say ^1' . $reppport . '', '');
														}
													}

												AddToLogInfo("[" . $datetime . "] REPORTED: " . $i_ip . " (" . $nickr . ") (" . $msgr . ") reason: G+id");
												++$x_number;
												echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
												++$x_stop_lp; //return;
												}
											}
										}
									}
								}
							}
						}}}
					}
				}
			}
		  else
		if ((strpos($msgr, 'report') !== false) && ($x_number != 1) || (strpos($msgr, 'support') !== false))
			{
			if (empty($furep)) $furep = 0;
			if ($furep == 0)
				{
				if ($idnum != 'false') rcon('tell ' . $idnum . ' ^1Error! ^7Message can not be empty!', '');
				  else rcon('say ^1Error! ^7Message can not be empty!', '');
				AddToLogInfo("[" . $datetime . "] NOT REPORTED: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
				++$x_number;
				echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
				++$x_stop_lp; //return;
				++$rotxv;
				}
			}
		  else
		if ((strpos($msgr, 'chea') !== false) && ($x_number != 1) || (strpos($msgr, 'wallhack') !== false) && ($x_number != 1) || (strpos($msgr, 'haker') !== false) && ($x_number != 1) || (strpos($msgr, 'hack') !== false) && ($x_number != 1) || (strpos($msgr, 'aimbot') !== false) && ($x_number != 1))
			{
			
			rcon('say ^1' . $pppanix, '');
			AddToLogInfo("[" . $datetime . "] REPORTED: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
			++$x_number;
			echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
			++$x_stop_lp; //return;
			}
		  else
		if ((strpos($msgr, 'admin') !== false) && ($x_number != 1))
			{
			
			rcon('say ^1' . $adminppp, '');
			AddToLogInfo("[" . $datetime . "] REPORTED: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
			++$x_number;
			echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
			++$x_stop_lp; //return;
			}
		 
		 
		 
		 
		 
		 
		 
		 
		 

 
	
	}
?>