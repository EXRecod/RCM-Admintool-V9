<?php
if ((strpos($parseline, "say;") !== false) || (strpos($parseline, "sayteam;") !== false)) {

    list($f, $guidn, $idnum, $nickr, $msgr) = explode(';', $parseline);
    $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guidn))))));

    $nicknamedata = pChar_preg_match($nickr, $guidn);

    if ((strpos(clearSymbols($msgr), 'AIMBOT DETECTED') !== false) || (trim($msgr) == "^1[AIMBOT DETECTED]")) {
        if (empty($stats_array[$conisq]['ip_adress'])) {
            include $cpath . 'ReCodMod/functions/core/cod_rcon.php';
            foreach ($rconarray as $j => $e) {
                $i_ip = $e["ip"];
                $i_guid = $e["guid"];
                $i_ping = $e["ping"];

                if ((!empty($i_guid)) && (strpos($i_guid, "bot") === false)) {

                    if ((trim($i_guid)) == (trim($guidn))) {

                        if (empty($stats_array[$conisq]['ip_adress'])) $stats_array[$conisq]['ip_adress'] = '' . $i_ip . '';

                    }
                }
            }
        }

        if (!empty($stats_array[$conisq]['ip_adress'])) {
            list($onem, $twom, $threem, $fourm) = explode(".", $stats_array[$conisq]['ip_adress']);
            $rangeip = $onem . '.' . $twom;

            $tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +1 hour'));
            $tmk = str_replace("-", ".", $tmk);

            xcon('clientkick ' . $idnum . ' ^1BAN!', '');
            $re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('" . $nicknamedata . "','" . $rangeip . "','" . $stats_array[$conisq]['ip_adress'] . "','" . $guidn . "','IP RANGE BAN','" . date("Y.m.d H:i:s") . "', '" . $tmk . "', '1','ЧерныйСписок','1')
ON DUPLICATE KEY UPDATE ip='" . $stats_array[$conisq]['ip_adress'] . "', time='" . date("Y.m.d H:i:s") . "', patch=patch+1";
            $r = dbInsert('', $re);
        }

    }
    slowscript(__FILE__);
}


if ((ActionIs('IP', $parseline)) && (strpos($parseline, '<=>') !== false)) {

    list($noon, $guid, $steamID, $cod4xip, $idk, $nickname) = explode(';', $parseline);

    list($cod4xipu) = explode(':', $cod4xip);

    if (filter_var($cod4xip, FILTER_VALIDATE_IP)) {

        list($onem, $twom, $threem, $fourm) = explode(".", $cod4xipu);
        $rangeip = $onem . '.' . $twom;


        $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));

        $kickHim = true;
        //проверка и запись
        $result = dbLazy('', "SELECT s_pg,s_kills FROM db_stats_1 where s_pg='$conisq' and s_kills >= 50 LIMIT 1");
        if (!empty($result)) {
            foreach ($result as $keys => $value) {
                if (!empty($keys)) {
                    if ($keys == 's_kills') {
                        $kickHim = false;
                    }
                }
            }
        }


        if ($kickHim) {
            $sqlthree = "select guid,ip,iprange,reason from banip WHERE ip = '" . $rangeip . "' and reason = 'IP RANGE BAN' limit 1";
            $xx = dbLazy('', $sqlthree);
            if (!empty($xx)) {
                foreach ($xx as $keym => $value) {
                    if ($keym == 'ip')
                        xcon('clientkick ' . $idnum . ' ^1BANNED!', '');
                }
            }


            $sqlthree = "select guid,ip,iprange,reason from banip WHERE ip = '" . $cod4xipu . "' and reason = 'IP RANGE BAN' limit 1";
            $xx = dbLazy('', $sqlthree);
            if (!empty($xx)) {
                foreach ($xx as $keym => $value) {
                    if ($keym == 'ip')
                        xcon('clientkick ' . $idnum . ' ^1BANNED!', '');
                }
            }


            $sqlthree = "select guid,ip,iprange,reason from banip WHERE iprange = '" . $rangeip . "' and reason = 'IP RANGE BAN' limit 1";
            $xx = dbLazy('', $sqlthree);
            if (!empty($xx)) {
                foreach ($xx as $keym => $value) {
                    if ($keym == 'ip')
                        xcon('clientkick ' . $idnum . ' ^1BANNED!', '');
                }
            }

            $rdgt = '';
            if ((empty($cod4xipu)) || ($cod4xipu == 1))
                $rdgt = 1;

            if (empty($rdgt)) {
                if (!empty($guid)) {
                    if (strpos($guid, "bot") === false) {
                        if (strpos($cod4xip, "bot") === false) {

                            if (empty($stats_array[$conisq]['ip_adress']))
                                $stats_array[$conisq]['ip_adress'] = $cod4xipu;

                            $stats_array[$conisq]['ip_adress_fix'] = $cod4xipu;
                        }
                    }
                }
            }
        }
    }
}

?>
