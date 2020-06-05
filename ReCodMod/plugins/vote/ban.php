<?php
if (strpos($msgr, ixz . 'b') !== false) {
	if(!empty(vote_ban_enable)){
if(!empty($banvote_voteTime))
{	
	 $df = ((date("dmYHis")) - $banvote_voteTime);
    if ($df >= vote_ban_time) {
      $banvote_guid = '';
      $banvote_msgrID = '';
      unset($banvote_votedPlayer);
      rcon('say  ^6Previous ban vote time end!', '');
	}
}
  if (strpos($msgr, ixz . 'b ') !== false) list($x_cmd, $banvote_msgrID) = explode(' ', $msgr);
  if (empty($banvote_Playercount)) {
    require $cpath . 'ReCodMod/functions/inc_functions2.php';
    //$cntply = count($rconarray);
	$cntply = 0;
    foreach ($rconarray as $j => $e) {
      $i_id = $e["num"];
	  		if(!empty($e["guid"]))
			++$cntply;
      if (trim($banvote_msgrID) == trim($i_id)) {
        $banvote_ping = $e["ping"];
        $banvote_ip = $e["ip"];
        $banvote_name = $e["name"];
        $banvote_guid = $e["guid"];
      }
    }
	if (!empty($banvote_guid)){
    if ($cntply > 2) {
      $banvote_Playercount = $cntply;
      $banvote_votes = 1;
      $banvote_voteTime = date("dmYHis");
    
    $banvote_votedPlayer[$guidn] = $guidn;
    rcon('say ' . $votm . ' "^2Vote Activated!: ^7' . ixz . 'b  for num ' . $banvote_msgrID . '"^1<- Vote: to Ban^5 ' . $i_name . ' guid:' . $i_guid, '');
                 }				 else
				 {
				rcon('say ^1Need more 2 players for vote!', '');	 
				 }
	}else rcon('say Error! Try again!', '');
  }
  else {
    $df = ((date("dmYHis")) - $banvote_voteTime);
    if ($df >= vote_ban_time) {
      $banvote_guid = '';
      $banvote_msgrID = '';
      unset($banvote_votedPlayer);
      rcon('say  ^6Vote time end!', '');
    }
    else {
      if (!empty($banvote_guid)){
		  $left = vote_ban_time - $df;
      if ($banvote_votedPlayer[$guidn] != $guidn) {
        //more 70%
        $banvote_votes = $banvote_votes + 1;
        $PERCENTS = ($banvote_votes / 100) * $banvote_Playercount;
        rcon('say ' . $vote_cg . ' "^2Vote: ^7' . ixz . 'b "^1Ban^5 ' . $banvote_name . ' ^8Seconds Left:^3 ' . $left . ' '.($PERCENTS+30).'/100 perc.', '');
        if ($PERCENTS >= 70) {
          if (!empty(bans_system)) dbInsert('db2', "INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$banvote_name','$banvote_ip','$banvote_guid','voteban','$datetime','','0')");
          xcon('banUser ' . $guid . ' ^1Vote Ban!', '');
          rcon('say  ' . $chistx . ' ' . $ban_ip_all . ' "^7Reason:^1 Vote Ban"', '');
          rcon('clientkick ' . $banvote_msgrID, '');
          AddToLog("[" . $datetime . "] ban VOTE: " . $banvote_ip . " (" . $banvote_name . ") (" . $banvote_id . ") BY: (" . $nickr . ")  R ");
        }
		}
      }
    }
  }
}
}
?>