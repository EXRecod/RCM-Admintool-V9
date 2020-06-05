<?php
if (strpos($msgr, ixz . 'k') !== false) {
if(!empty(vote_kick_enable)){
if(!empty($kickvote_voteTime))
{	
	 $df = ((date("dmYHis")) - $kickvote_voteTime);
    if ($df >= vote_kick_time) {
      $kickvote_guid = '';
      $kickvote_msgrID = '';
      unset($kickvote_votedPlayer);
      rcon('say  ^6Previous kick vote time end!', '');
	}
}
  if (strpos($msgr, ixz . 'k ') !== false) list($x_cmd, $kickvote_msgrID) = explode(' ', $msgr);
  if (empty($kickvote_Playercount)) {
    require $cpath . 'ReCodMod/functions/inc_functions2.php';
    //$cntply = count($rconarray);
	$cntply = 0;
    foreach ($rconarray as $j => $e) {
      $i_id = $e["num"];
	  		if(!empty($e["guid"]))
			++$cntply;
      if (trim($kickvote_msgrID) == trim($i_id)) {
        $kickvote_ping = $e["ping"];
        $kickvote_ip = $e["ip"];
        $kickvote_name = $e["name"];
        $kickvote_guid = $e["guid"];
      }
    }
	if (!empty($kickvote_guid)){
    if ($cntply > 2) {
      $kickvote_Playercount = $cntply;
      $kickvote_votes = 1;
      $kickvote_voteTime = date("dmYHis");
    
    $kickvote_votedPlayer[$guidn] = $guidn;
    rcon('say ' . $votm . ' "^2Vote Activated!: ^7' . ixz . 'k  for num ' . $kickvote_msgrID . '"^1<- Vote: to kick^5 ' . $i_name . ' guid:' . $i_guid, '');
                 }
				 else
				 {
				rcon('say ^1Need more 2 players for vote!', '');	 
				 }
	}else rcon('say Error! Try again!', '');
  }
  else {
    $df = ((date("dmYHis")) - $kickvote_voteTime);
    if ($df >= vote_kick_time) {
      $kickvote_guid = '';
      $kickvote_msgrID = '';
      unset($kickvote_votedPlayer);
      rcon('say  ^6Vote time end!', '');
    }
    else {
      if (!empty($kickvote_guid)){
		  $left = vote_kick_time - $df;
      if ($kickvote_votedPlayer[$guidn] != $guidn) {
        //more 70%
        $kickvote_votes = $kickvote_votes + 1;
        $PERCENTS = ($kickvote_votes / 100) * $kickvote_Playercount;
        rcon('say ' . $vote_cg . ' "^2Vote: ^7' . ixz . 'k "^1kick^5 ' . $kickvote_name . ' ^8Seconds Left:^3 ' . $left . ' '.($PERCENTS+30).'/100 perc.', '');
        if ($PERCENTS >= 70) {
          rcon('say  ' . $chistx . ' ' . $ban_ip_all . ' "^7Reason:^1 Vote kick"', '');
          rcon('clientkick ' . $kickvote_msgrID, '');
          AddToLog("[" . $datetime . "] kick VOTE: " . $kickvote_ip . " (" . $kickvote_name . ") (" . $kickvote_id . ") BY: (" . $nickr . ")  R ");
        }
		}
      }
    }
  }
}}
?>