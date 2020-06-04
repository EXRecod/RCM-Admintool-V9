<?php	
 
if (strpos($msgr, ixz.'gv') !== false)
{ 
if(!empty(vote_gametype_enable)){
if(!empty($gametypevote_voteTime))
{	
	 $df = ((date("dmYHis")) - $gametypevote_voteTime);
    if ($df >= vote_gametype_time) {
      $gametypevote_rconlist = ''; 
      unset($gametypevote_votedPlayer);
      rcon('say  ^6Previous map vote time end!', '');
	}
}
  if (strpos($msgr, ixz . 'gv ') !== false)  list($x_cmd, $x_mapname) = explode(' ', $msgr);   // !map mp_carentan 
  
 $getinf = 'sv_mapRotation';
if(empty($gametypevote_rconlist))
{
require $cpath.'ReCodMod/functions/getinfo/_main_getinfo.php';
$gametypevote_rconlist = $mapslisst;

if (strpos($gametypevote_rconlist,$x_mapname) === false)
{
rcon('say  ^6NOT CORECT MAP NAME!!', '');
$gametypevote_rconlist = '';	
}

}    
  
  if (empty($gametypevote_Playercount)) {
    require $cpath . 'ReCodMod/functions/inc_functions2.php';
    $cntply = count($rconarray);
    
	if (!empty($gametypevote_rconlist)){
    if ($cntply > 2) {
      $gametypevote_Playercount = $cntply;
      $gametypevote_votes = 1;
      $gametypevote_voteTime = date("dmYHis");
    
    $gametypevote_votedPlayer[$guidn] = $guidn;
    rcon('say ' . $votm . ' "^2Vote Activated!: ^7' . ixz . 'gv "^1<- Vote: change to ^5 ' . $x_mapname . ' ^7map', '');
                 }
	}else rcon('say Error! Try again!', '');
  }
  else {
    $df = ((date("dmYHis")) - $gametypevote_voteTime);
    if ($df >= vote_gametype_time) {
      $gametypevote_rconlist = ''; 
      unset($gametypevote_votedPlayer);
      rcon('say  ^6Vote time end!', '');
    }
    else {
      if (!empty($gametypevote_rconlist)){
		  $left = vote_gametype_time - $df;
      if ($gametypevote_votedPlayer[$guidn] != $guidn) {
        //more 70%
        $gametypevote_votes = $gametypevote_votes + 1;
        $PERCENTS = $gametypevote_votes / 100) * $gametypevote_Playercount;
        rcon('say ' . $vote_cg . ' ^2Vote: ^7' . ixz . 'gv ^1MAP^5 ' . $x_mapname . ' ^8Seconds Left:^3 ' . $left . ' '.($PERCENTS+30).'/100 perc.', '');
        if ($PERCENTS >= 70) {
    rcon('say ^3Vote completed! Players changed map to '.$x_mapname, '');    
	usleep($sleep_rcon);
	rcon('say ^35', '');
	usleep($sleep_rcon);
	rcon('say ^34', '');
    usleep($sleep_rcon);	
	rcon('say ^33', '');
    usleep($sleep_rcon);	
	rcon('say ^32', '');
	usleep($sleep_rcon);
	rcon('say ^31', '');
	usleep($sleep_rcon);
	rcon('say ^30', '');
    sleep(1);	
    rcon('g_gametype '.$x_mapname, '');
	rcon('map_restart');
          AddToLog("[" . $datetime . "] MAP VOTE: " . $gametypevote_ip . " (" . $gametypevote_name . ") (" . $gametypevote_id . ") BY: (" . $nickr . ")  R ");
        }
		}
      }
    }
  }
}  
}
 
?>
 