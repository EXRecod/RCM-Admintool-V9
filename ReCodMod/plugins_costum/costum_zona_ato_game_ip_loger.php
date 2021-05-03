<?php

//logPrint("IP;" + lpGuid + ";" + SteamID64 + ";" + ip + ";"  + lpselfnum + ";" + self.name + "\n");

if ((strpos($parseline, 'IP;') !== false) && (strpos($parseline, '<=>') !== false)) {

    usleep(55555);

    list($noon, $guid, $steamID, $cod4xip, $idk, $nickname) = explode(';', $parseline);

    list($cod4xipu) = explode(':', $cod4xip);

    $date = date('Y-m-d H:i:s');

    $rdgt = '';
    if ((empty($cod4xipu)) || ($cod4xipu == 1))
        $rdgt = 1;

    if (empty($rdgt)) {
        if (!empty($guid)) {
            if (strpos($guid, "bot") === false) {
                if (strpos($cod4xip, "bot") === false) {

                    $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));


                    if (empty($stats_array[$conisq]['ip_adress']))
                        $stats_array[$conisq]['ip_adress'] = $cod4xipu;

                    $stats_array[$conisq]['ip_adress_fix'] = $cod4xipu;

                    $nicknamedata = pChar_preg_match($nickname, $guid);


                    $sql = "INSERT INTO x_db_players (s_port,x_db_name, x_up_name, x_db_ip, x_up_ip, x_db_ping, x_db_guid, x_db_conn, x_db_date, x_db_warn, x_date_reg, stat, steam_id)
         VALUES ('$svipport','" . $nicknamedata . "', '0', '$cod4xipu', '0', '999', '$guid', '1', '$date', '0', '$date', '1', '$steamID') 
		 ON DUPLICATE KEY UPDATE x_db_date='" . $date . "', x_db_ip='" . $cod4xipu . "', x_db_name = '" . $nicknamedata . "', 
x_db_conn=x_db_conn+1, x_db_guid='" . $guid . "', steam_id = '$steamID'";
                    $gt = dbInsert('', $sql);
                    if (!$gt) {
                        errorspdo('[' . $datetime . '] 39  ' . __FILE__ . '  Exception : ' . $sql);
                    }

                    $sql = "INSERT INTO x_up_players (name, ip, guid, steam_id) VALUES ('" . $nicknamedata . "','$cod4xipu','$guid', '$steamID')
ON DUPLICATE KEY UPDATE name = '" . $nicknamedata . "', ip='" . $cod4xipu . "', guid='" . $guid . "', steam_id = '$steamID'";
                    $gtx = dbInsert('', $sql);
                    if (!$gtx) {
                        errorspdo('[' . $datetime . '] 45  ' . __FILE__ . '  Exception : ' . $sql);
                    }


                    if (!empty($steamID)) {

                        $sql = "INSERT INTO x_db_players (s_port,x_db_name, x_up_name, x_db_ip, x_up_ip, x_db_ping, x_db_guid, x_db_conn, x_db_date, x_db_warn, x_date_reg, stat, steam_id)
         VALUES ('$svipport','" . $nicknamedata . "', '0', '$cod4xipu', '0', '999', '$steamID', 
		 '1', '$date', '0', '$date', '1', '$steamID') 
		 ON DUPLICATE KEY UPDATE x_db_date='" . $date . "', x_db_ip='" . $cod4xipu . "', x_db_name = '" . $nicknamedata . "', 
x_db_conn=x_db_conn+1, x_db_guid='" . $steamID . "', steam_id = '$steamID'";
                        $gt = dbInsert('', $sql);
                        if (!$gt) {
                            errorspdo('[' . $datetime . '] 55  ' . __FILE__ . '  Exception : ' . $sql);
                        }


                        $sql = "INSERT INTO x_up_players (name, ip, guid, steam_id) VALUES ('" . $nicknamedata . "','$cod4xipu','$steamID', '$steamID')
ON DUPLICATE KEY UPDATE name = '" . $nicknamedata . "', ip='" . $cod4xipu . "', guid='" . $steamID . "', steam_id = '$steamID'";
                        $gtx = dbInsert('', $sql);
                        if (!$gtx) {
                            errorspdo('[' . $datetime . '] 61  ' . __FILE__ . '  Exception : ' . $sql);
                        }
                    }

                }
            }
        }
    } else {
        errorspdo('[' . $date . '] 61 строка: нету rcon ответа! 
	' . __FILE__ . "  Exception : (Почему $noon, $guid, $steamID, $cod4xip, $idk, $nickname
	не получили ответа, скорей должен знать администратор проекта, тут будет ip = 0 и ip = 1, но мы не дали записать ИП 0 или 1, значит и игрока не будет в бд из-за этой проблемы!)");
    }
    slowscript(__FILE__);
}
?>