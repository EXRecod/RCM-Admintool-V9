<?php
if (strpos($msgr, ixz . 'map ') !== false) {
    ////////////////////////////////////Change map
    list($x_cmd, $x_mapname) = explode(' ', $msgr); // !map carentan
    $x_mpt = mpt($x_mapname);
    if ($x_mpt == 'wawa_3dAim') {
        
        xcon('set g_gametype ' . $mapfix . '', '');
    }
    sleep(1);
    xcon('map  ' . $x_mpt . '', '');
}
else if ((trim($msgr) == ixz . 'map')) {
    ////////////////////////////////////Change list
    usleep($sleep_rcon * 2);
    require $cpath . 'ReCodMod/functions/getinfo/sv_mapRotation.php';
    fclose($connx);
    echo "  mp list";
    
    rcon('say ' . $infoompls . ' ^7' . $maps . '', '');
    ////////////////////////////////////Change list
    
}
else if (strpos($msgr, ixz . 'maplist') !== false) {
    
    require $cpath . 'ReCodMod/functions/getinfo/sv_mapRotation.php';
    fclose($connx);
    //$emaprun - current map
    //$mapsxc - current game type and map rotation.
    if (empty($emaprun)) {
        $status = new COD4xServerStatus($server_ip, $server_port);
        if ($status->getServerStatus()) {
            $status->parseServerData();
            if (empty($emaprun)) $emaprun = $serverStatus['mapname'];
        }
    }
    if (preg_match('/\b' . $emaprun . '\b\s\b(.+)/iu', $mapsxc, $match)) {
        $mapnamekl = explode(trim($emaprun) , $mapsxc);
        $mapnamekl[1] = preg_replace("/\b[a-z]{1,4}\b/iu", "", $mapnamekl[1]);
        $lll = preg_replace("/\W*\b/iu", "%%", $mapnamekl[1]);
        $emaprunln = explode('%%%%', $lll);
        echo "  next map";
        echo '---> ' . $emaprunl = $emaprunln[1];
    }
    if (empty($emaprunl)) $emaprunl = 'Unknown';
    
    rcon('say ' . $infoomnxtt . ' ^7' . $emaprunl . '', '');
    if (is_resource($connect)) fclose($connect);
}
else if (strpos($msgr, ixz.'restart') !== false){
    
    rcon('say ^3'.$infoorell.'', '');
	sleep(1);
   rcon('map_restart');
}
?>