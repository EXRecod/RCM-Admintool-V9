<?php
if (strpos($msgr, ixz.'report') !== false) {
	$rotxv = 0;
		$cron_time = filemtime($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port);
		  $stime        = time();
		if ($stime - $cron_time >= 1) {

				$nickname = htmlentities($nickr);

				if (strpos($msgr, ixz.'report') !== false)
					
				$msgrxd = str_replace(ixz.'report', '', $msgr);
				$msgrxd = trim($msgrxd);
				 
				if (!empty($msgrxd)) {

						if (strpos($admin_email, ';') !== false) {
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
								while ($x++ < $countnumbs) {
										
										echo '--' . $server_ip;
										echo '--' . $server_port;
										echo '--' . $nickname;
										echo '--' . $i_ip;
										echo '--' . $admin_emaill[$rotxv];
										$msgrn = str_replace(" ", "_", $msgr);
										echo '--------->' . $msgrn;
										if (empty($servernamex)) $servernamex = $server_ip;
										
										$servernamex = clearSymbols(clearSymbols($servernamex));

										file_put_contents($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port, "");

										++$x_stop_lp; //return;
										++$rotxv;
								}
						}

						$msg = 'Nickname: ' . clearSymbols($nickname) . ' Message: ' . $msgrxd . ' GUID: ' . $guidn . ' ServerIp: ' . clearSymbols($servernamex) . ':' . $server_ip . "_" . $server_port;

						if (!empty(webhookurl_enable)) {
								 

										$data =  array(  
										// Set the title for your embed
										"title" => $server_ip . ":" . $server_port,

										// The type of your embed, will ALWAYS be "rich"
										"type" => "rich",

										// A description for your embed
										"description" => "",

										// The URL of where your title will be a link to
										"url" => "",

										/* A timestamp to be displayed below the embed, IE for when an an article was posted
										 * This must be formatted as ISO8601
										*/
										"timestamp" => date('Y-m-d H:i:s') ,

										// The integer color to be used on the left side of the embed
										"color" => hexdec("FFFFFF") ,
  

										// Field array of objects
										"fields" => [
										// Field 1
										["name" => "Nickname", "value" => $nickname, "inline" => true],
										// Field 2
										["name" => "Guid", "value" => $guidn, "inline" => true],
										// Field 3
										["name" => "Message", "value" => $msgrxd, "inline" => false]]);

										//$options = ['http' => ['method' => 'POST', 'header' => 'Content-Type: application/json', 'content' => json_encode($data) ]];

										 //$context = stream_context_create($options);
										 //$result = @file_get_contents(webhookurl, true, $context);
										 
										 
                                                          $json_data = $data;
															$make_json = json_encode($json_data);
															 
															if ($ch = curl_init(webhookurl))
																{
																curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ---
																curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // ---
																curl_setopt($ch, CURLOPT_POST, true);
																curl_setopt($ch, CURLOPT_POSTFIELDS, $make_json);
																curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
																curl_setopt($ch, CURLOPT_HEADER, 1);
																curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
																$response = curl_exec($ch);
																curl_close($ch);
																}									 
										 
										 
										 
										
	 								 		if (!empty($idnum)) 
			                                     xcon('tell ' . $idnum . '  '.$msgrxd.' ^1REPORTED! ', '');

										//echo $result;
										//fclose($result);
										 

										file_put_contents($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port, "");
 
						}

						if (!empty($vk_token)) {
								if (!empty($msg)) {
										foreach ($vk_owners as $vk_owner_id) {
												sleep(2);
												$url = 'https://api.vk.com/method/wall.post';
												$post = 'owner_id=' . $vk_owner_id . '&access_token=' . $vk_token . '&from_group=1&message=' . $msg . '&signed=0&v=5.42';
												if ($curl = curl_init()) {
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
														file_put_contents($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port, "");

												}
										}
								}
						}

						// TEST LINE   http://xxxreal.ru/cod_report_master/codsender.php?emailz=yaeriks@yandex.ru&mpass=p&sended=pLAYER999%i have probleeem&userip=111.222.333.444&serverip=192.40.23.21:29000
						if (!empty($idnum)) {
								if (!empty($idnum))
								{
										xcon('tell ' . $idnum . ' ^1' . $reppport, '');
										file_put_contents($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port, "");


								}
								else {
										xcon('say ^1' . $reppport, '');
										file_put_contents($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port, "");


								}
						}

						$message = AddCheatHelp("[" . $datetime . "] CHEATER ALARM: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
						++$x_number;
						echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);

				}
				else
				{
					
		$cron_time = filemtime($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port);
		if ($stime - $cron_time >= 30) {
			
		if (!empty($idnum)) 
			rcon('tell ' . $idnum . ' ^1Error! ^7Message can not be empty!', '');
		//else 
		//	rcon('say ^1Error! ^7Message can not be empty!', '');
		
		file_put_contents($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port, "");

		echo 'say ^1Error! ^7Message can not be empty!';

		AddToLogInfo("[" . $datetime . "] NOT REPORTED: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
		++$x_number;
		echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
		++$x_stop_lp; //return;
		++$rotxv;
		}	
					
					
				}
				
				
		}
}
 

?>