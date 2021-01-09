<?php
if ($mplogfile) {
    ///if ($x_stop_lp == 0) {
        if (strpos($mplogfile, 'ftp:') !== false) {
            list($ftp_exp_user, $ftp_exp_password, $ftp_exp_ip, $ftp_exp_url, $gmlobame) = explode('%', ftp2locallog($mplogfile));
            //echo $ftp_exp_user,$ftp_exp_password,$ftp_exp_ip,$ftp_exp_url,$gmlobame;
            $mplogfilep = hxlog($cpath . "ReCodMod/cache/" . $server_ip . "_" . $server_port . '_' . $gmlobame);
            $parseline = trim(readloglines($mplogfilep));
/////////////////////////////////////////////////////////////////////////////////////
             if (strpos($mpgamenname, 'Call of Duty 5') !== false) $game_patch = 'cod5';
            else if (strpos($mpgamenname, 'Call of Duty 4') !== false) $game_patch = 'cod4';
            else if (strpos($mpgamenname, 'Call of Duty 2') !== false) $game_patch = 'cod2';
            else if (strpos($mpgamenname, 'Call of Duty') !== false) $game_patch = 'cod1'; //cod1 or uo
            else if ($mpgamenname == 'main') $game_patch = 'cod1_1.1';
			if (strpos($game_patch, 'cod1_1.1') !== false)
            require $cpath . 'ReCodMod/functions/funcx/game/cod1_1_1.php';
            else if (strpos(no_guid_servers, $server_port.';') !== false)							 
            require $cpath . 'ReCodMod/functions/funcx/game/cod_no_guids.php';				
/////////////////////////////////////////////////////////////////////////////////////
            $datedayup = date('H');
            if (($datedayup == '03') || ($datedayup == '3')) // в 3 часа ночи обнуляем
            {
                $file = hxlog($cpath . "ReCodMod/cache/" . $server_ip . "_" . $server_port . '_' . $gmlobame);
                if (filesize($file) > 50000000) {
                    $fp = fopen($file, 'w');
                    fputs($fp, " ---\n");
                    fclose($fp);
                    if (@ftp_put($conn_idq, $ftp_exp_url, $file, FTP_BINARY)) {
                        $fp = fopen($cpath . "ReCodMod/cache/x_cache/" . $server_ip . "_" . $server_port . "_pos.txt", "w+");
                        fputs($fp, "0");
                        fclose($fp);
                        $hu = fopen($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_pos_ftp.txt', 'w+');
                        fwrite($hu, "0");
                        fclose($hu);
                        require $cpath . 'ReCodMod/functions/null.php';
                        debuglog((__FILE__)." RCM DEBUGGER: RESET 50 MB AND RESTART [LOCAL FILE]: $gmlobame ".$server_ip."_".$server_port." ");
                        echo "\n FILE $file UPLOADED \n";
						require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
						exit;
                    }
                    else {
                        $cur_activator = 100;
                        debuglog((__FILE__)." RCM DEBUGGER: ОЧИСТКА ФАЙЛОВ ПО ЛИМИТУ / НЕМОЗМОЖНО ОБНУЛИТЬ ФТП ЛОГ! [FTP USER]: $ftp_exp_user [FTP PASS (MD5]: " . md5($ftp_exp_password) . " [FTP IP]: $ftp_exp_ip [FTP URL]: $ftp_exp_url [LOCAL FILE]: $gmlobame ".$server_ip."_".$server_port." ");
                    }
                }
            } 
		   
        }
        else {
            $parseline = trim(readloglines($mplogfile));
            if (empty($game_patch)) {
                $i = 0;
                for ($i = 1;$i <= 50;$i++) {
                    if (!empty($game_patch)) $i = 50;
                    if (empty($game_patch)) {
                        $servex3x = $server_ip;
                        $portx3x = $server_port;
                        $status = new COD4xServerStatus($servex3x, $portx3x);
                        if ($status->getServerStatus()) {
                            $status->parseServerData();
                            $serverStatus = $status->returnServerData();
                            $players = $status->returnPlayers();
                            $servername = $serverStatus['sv_hostname'];
                            $serverxmap = $serverStatus['mapname'];
                            $mpgamenname = $serverStatus['gamename'];
                            $mpshortver = $serverStatus['shortversion'];
                            $plyr_cnt = sizeof($players);
                        }
                        if (empty($mpgamenname)) {
                            sleep(1);
                            echo 'GAME SERVER OFFLINE!?';					
	                      debuglog((__FILE__)." GAME SERVER OFFLINE!?");
                            exit;
                        }
                        if (trim($mpgamenname) && (trim($mpshortver) == 'main')) $game_patch = 'cod1_1.1';
                        else if (trim($mpgamenname) && (trim($mpshortver) == '1.1')) $game_patch = 'cod1_1.1';
                    }
                    //if (strpos($parseline, ' cod1_') !== false)
                    switch ($i) {
                        case 'cod1_':
                            echo "\n Итерация $i ";
                        break; /* Выйти только из конструкции switch. */
                        case 'cod1_1.1':
                            echo "\n Итерация $i ";
                        break; /* Выйти только из конструкции switch. */
                        case '1.1':
                            echo "\n Итерация $i ";
                        break; /* Выйти только из конструкции switch. */
                        case 'main':
                            echo "\n Итерация $i ";
                        break; /* Выйти только из конструкции switch. */
                        case 'cod4':
                            echo "\n Итерация $i ";
                        break; /* Выйти только из конструкции switch. */
                        case 'cod2':
                            echo "\n Итерация $i ";
                        break; /* Выйти только из конструкции switch. */
                        case 50:
                        break; /* Выходим из конструкции switch и из цикла while. */
                        default:
                        break;
                    }
                }
            }
             if (strpos($mpgamenname, 'Call of Duty 5') !== false) $game_patch = 'cod5';
            else if (strpos($mpgamenname, 'Call of Duty 4') !== false) $game_patch = 'cod4';
            else if (strpos($mpgamenname, 'Call of Duty 2') !== false) $game_patch = 'cod2';
            else if (strpos($mpgamenname, 'Call of Duty') !== false) $game_patch = 'cod1'; //cod1 or uo
            else if ($mpgamenname == 'main') $game_patch = 'cod1_1.1';
			if (strpos($game_patch, 'cod1_1.1') !== false)
            require $cpath . 'ReCodMod/functions/funcx/game/cod1_1_1.php';
            else if (strpos(no_guid_servers, $server_port.';') !== false)							 
            require $cpath . 'ReCodMod/functions/funcx/game/cod_no_guids.php';		
            clearstatcache();
            $dya = filemtime($mplogfile);
            if (time() - $dya >= 300) {
                debuglog((__FILE__)."\n RCM Информация: [Не обновлено] за 5 минут не обновило локальный лог игры, перезагрузка мода, обнуление локального лога и кеша. ".$server_ip."_".$server_port." ");
                $file = hxlog($mplogfile);
                $fp = fopen($file, 'w');
                fputs($fp, " ---\n");
                $fp = fopen($cpath . "ReCodMod/cache/x_cache/" . $server_ip . "_" . $server_port . "_pos.txt", "w+");
                fputs($fp, "0");
                fclose($fp);
                $fp = fopen($cpath . "ReCodMod/cache/x_cache/" . $server_ip . "_" . $server_port . "_position.txt", "w+");
                fputs($fp, "0");
                fclose($fp);
            }
            $datedayup = date('H');
            if (($datedayup == '03') || ($datedayup == '3')) // в 3 часа ночи обнуляем
            {
                if (!file_exists($cpath . 'ReCodMod/cache/x_cron/cron_time_reset_log' . $server_ip . "_" . $server_port)) touch($cpath . 'ReCodMod/cache/x_cron/cron_time_reset_log' . $server_ip . "_" . $server_port);
                $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_reset_log" . $server_ip . "_" . $server_port); //получаем время последнего изменения файла
                if (time() - $cron_time >= 900) { //сравниваем с текущим временем - 15 минут
                    file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_reset_log" . $server_ip . "_" . $server_port, ""); //перезаписываем файл cron_time
                    if (filesize($mplogfile) > 50000000) {
                        $file = hxlog($mplogfile);
                        $fp = fopen($file, 'w');
                        fputs($fp, " ---\n");
                        $fp = fopen($cpath . "ReCodMod/cache/x_cache/" . $server_ip . "_" . $server_port . "_pos.txt", "w+");
                        fputs($fp, "0");
                        fclose($fp);
                        //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> LogFile game_mp.log 30MB auto reset! </font> ");
                        echo "OK ...";
                    }
                }
            }
        }
        
		/*
		if (!empty(debugmodx)) echo "\n" . $parseline;
        ////////////////////////////////////////////////////////////////////
        $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_top_" . $server_ip . "_" . $server_port);
        if ($stime - $cron_time >= 180) {
            $zzztime = $cpath . "ReCodMod/cache/x_cron/cron_time_top_" . $server_ip . "_" . $server_port;
            if (strpos($mplogfile, 'ftp:') !== false) {
                list($ftp_exp_user, $ftp_exp_password, $ftp_exp_ip, $ftp_exp_url, $gmlobame) = explode('%', ftp2locallog($mplogfile));
                echo "\n \033[37;1;1m";
                echo "\n FTP USER: ", $ftp_exp_user, "\n FTP PASSWORD: ", $ftp_exp_password, "\n FTP IP: ", $ftp_exp_ip, "\n FTP URL: ", $ftp_exp_url, "\n LOG NAME: ", $gmlobame;
                echo " ============================ \n \033[38;5;46m \n";
                $mplogfilepzzz = hxlog($cpath . "ReCodMod/cache/" . $server_ip . "_" . $server_port . '_' . $gmlobame);
                //$mplogfilepzzz = $mplogfile;
                $mplogfilepzzzx = file_get_contents($mplogfilepzzz);
                if ($mplogfilepzzzx == filesize($mplogfilepzzz)) {
                    $fp = fopen($zzztime, 'w');
                    fwrite($fp, filesize($mplogfilepzzz));
                    fclose($fp);
                    echo "\n / RESTART RCM MOD /";
                    $handlePosg = fopen($cpath . "ReCodMod/cache/x_cache/" . $server_ip . "_" . $server_port . "_pos.txt", "w+");
                    fwrite($handlePosg, "1");
                    fclose($handlePosg);
                    $handleg = fopen(hxlog($cpath . "ReCodMod/cache/" . $server_ip . "_" . $server_port . '_' . $gmlobame) , 'w+');
                    fwrite($handleg, "1");
                    fclose($handleg);
                    require $cpath . 'ReCodMod/functions/null.php';
                    exit;
                }
                else {
                    $fp = fopen($zzztime, 'w');
                    fwrite($fp, filesize($mplogfilepzzz));
                    fclose($fp);
                }
            }
            else $mplogfilepzzz = $mplogfile;
        }
        ////////////////////////////////////////////////////////////////////
       */ 
   // } 
}	
?>