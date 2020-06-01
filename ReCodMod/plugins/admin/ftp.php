<?php
// version 9
if (strpos($msgr, $ixz . 'ftp log') !== false)
{ 
            ///RCM LOGS
            if (strpos($ftp_server, 'sftp:') !== false) $conn_id = ftp_ssl_connect($ftp_server);
            else $conn_id = ftp_connect($ftp_server);
            $login_result = ftp_login($conn_id, $ftp_login, $ftp_password);
            if (!$conn_id || !$login_result)
            {
                //exit("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу $ftp_server!");
                if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $senterror, '');
                else rcon('tell ' . $idnum . ' ^3' . $senterror, '');
            }
            else
            {
                //echo "Установлено соединение с FTP сервером $ftp_server";
                if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $sentft, '');
                else rcon('tell ' . $idnum . ' ^3' . $senterror, '');
            }
            ftp_pasv($conn_id, true);
            do_upload($local_dir);
            ftp_close($conn_id);
            
            if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $sentokkk, '');
            else rcon('tell ' . $idnum . ' ^3' . $senterror, '');
            AddToLog("[" . $datetime . "] FTP LOGS: (" . $stats_array[$conisq]['ip_adress'] . ") (" . $idnum . ") BY: (" . $nickname . ") ");
            //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> Admin sent to ftp server log file");
        
    
}
if (preg_match("/^" . $ixz . "ftp getss/i", $msgr))
{  
            
            if (strpos($ftp_server, 'sftp:') !== false) $conn_id = ftp_ssl_connect($ftp_server);
            else $conn_id = ftp_connect($ftp_server);
            $login_result = ftp_login($conn_id, $ftp_login, $ftp_password);
            if (!$conn_id || !$login_result)
            {
                //exit("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу $ftp_server!");
                if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $senterror, '');
                else rcon('tell ' . $idnum . ' ^3' . $senterror, '');
            }
            else
            {
                //echo "Установлено соединение с FTP сервером $ftp_server";
                if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $sentft, '');
                else rcon('tell ' . $idnum . ' ^3' . $sentft, '');
            }
            ftp_pasv($conn_id, true);
            do_upload_getss($local_dir_getss);
            ftp_close($conn_id);
            
            if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $sentokkk, '');
            else rcon('tell ' . $idnum . ' ^3' . $sentokkk, '');
            AddToLog("[" . $datetime . "] FTP LOGS: (" . $stats_array[$conisq]['ip_adress'] . ") (" . $idnum . ") BY: (" . $nickname . ") ");
            //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> Admin sent to ftp server image files");
        }
 
if (strpos($msgr, $ixz . 'ftp db') !== false)
{ 
            
            if (strpos($ftp_server, 'sftp:') !== false) $conn_id = ftp_ssl_connect($ftp_server);
            else $conn_id = ftp_connect($ftp_server);
            $login_result = ftp_login($conn_id, $ftp_login, $ftp_password);
            if (!$conn_id || !$login_result)
            {
                //exit("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу $ftp_server!");
                if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $senterror, '');
                else rcon('tell ' . $idnum . ' ^3' . $senterror, '');
            }
            else
            {
                //echo "Установлено соединение с FTP сервером $ftp_server";
                if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $sentft, '');
                else rcon('tell ' . $idnum . ' ^3' . $sentft, '');
            }
            ftp_pasv($conn_id, true);
            do_upload_databases($local_dir_databases);
            ftp_close($conn_id);
            
            if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $sentokkk, '');
            else rcon('tell ' . $idnum . ' ^3' . $sentokkk, '');
            AddToLog("[" . $datetime . "] FTP LOGS: (" . $stats_array[$conisq]['ip_adress'] . ") (" . $idnum . ") BY: (" . $nickname . ") ");
            //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> Admin sent to ftp server image files");
}
if (strpos($msgr, $ixz . 'ftp bans') !== false)
{ 
            
            if (strpos($ftp_server, 'sftp:') !== false) $conn_id = ftp_ssl_connect($ftp_server);
            else $conn_id = ftp_connect($ftp_server);
            $login_result = ftp_login($conn_id, $ftp_login, $ftp_password);
            if (!$conn_id || !$login_result)
            {
                //exit("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу $ftp_server!");
                if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $senterror, '');
                else rcon('tell ' . $idnum . ' ^3' . $senterror, '');
            }
            else
            {
                //echo "Установлено соединение с FTP сервером $ftp_server";
                if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $sentft, '');
                else rcon('tell ' . $idnum . ' ^3' . $sentft, '');
            }
            ftp_pasv($conn_id, true);
            do_upload_databases2($local_dir_databases2);
            ftp_close($conn_id);
            
            if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^3' . $sentokkk, '');
            else rcon('tell ' . $idnum . ' ^3' . $sentokkk, '');
            AddToLog("[" . $datetime . "] FTP LOGS: (" . $stats_array[$conisq]['ip_adress'] . ") (" . $idnum . ") BY: (" . $nickname . ") ");
            //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> Admin sent to ftp server image files");
}
?>
