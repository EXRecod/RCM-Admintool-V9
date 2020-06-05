<?php	
 
if (strpos($msgr, ixz.'mv') !== false){
if(!empty(vote_map_enable)){	
if(!empty($mapvote_voteTime))
{	
	 $df = ((date("dmYHis")) - $mapvote_voteTime);
    if ($df >= vote_map_time) {
      $mapvote_rconlist = ''; 
      unset($mapvote_votedPlayer);
      rcon('say  ^6Previous map vote time end!', '');
	}
}
  if (strpos($msgr, ixz . 'mv ') !== false)  list($x_cmd, $x_mapname) = explode(' ', $msgr);   // !map mp_carentan 
  
 $getinf = 'sv_mapRotation';
if(empty($mapvote_rconlist))
{
require $cpath.'ReCodMod/functions/getinfo/_main_getinfo.php';
echo '======='.$mapvote_rconlist = $mapslisst;

if (strpos($mapvote_rconlist,trim($x_mapname)) === false)
{
rcon('say  ^6NOT CORECT MAP NAME!!', '');
$mapvote_rconlist = '';	
}

}

if(!empty($mapvote_rconlist))
{

if (strpos($mapvote_rconlist,trim($x_mapname)) === false)
{
rcon('say  ^6NOT CORECT MAP NAME!!', '');
$mapvote_rconlist = '';	
}}
    
  
  if (empty($mapvote_Playercount)) {
    require $cpath . 'ReCodMod/functions/inc_functions2.php';
    //$cntply = count($rconarray);
	$cntply = 0;
    foreach ($rconarray as $j => $e) {
      $i_id = $e["num"];
	  		if(!empty($e["guid"]))
			++$cntply;
	}
	if (!empty($mapvote_rconlist)){
    if ($cntply > 2) {
      $mapvote_Playercount = $cntply;
      $mapvote_votes = 1;
      $mapvote_voteTime = date("dmYHis");
    
    $mapvote_votedPlayer[$guidn] = $guidn;
    rcon('say ' . $votm . ' "^2Vote Activated!: ^7' . ixz . 'mv "^1<- Vote: change to ^5 ' . $x_mapname . ' ^7map', '');
                 }
				 else
				 {
				rcon('say ^1Need more 2 players for vote!', '');	 
				 }
				 
	}else rcon('say Error! Try again!', '');
  }
  else {
    $df = ((date("dmYHis")) - $mapvote_voteTime);
    if ($df >= vote_map_time) {
      $mapvote_rconlist = ''; 
      unset($mapvote_votedPlayer);
      rcon('say  ^6Vote time end!', '');
    }
    else {
      if (!empty($mapvote_rconlist)){
		  $left = vote_map_time - $df;
      if ($mapvote_votedPlayer[$guidn] != $guidn) {
        //more 70%
        $mapvote_votes = $mapvote_votes + 1;
        $PERCENTS = ($mapvote_votes / 100) * $mapvote_Playercount;
        rcon('say ' . $vote_cg . ' ^2Vote: ^7' . ixz . 'mv ^1MAP^5 ' . $x_mapname . ' ^8Seconds Left:^3 ' . $left . ' '.($PERCENTS+30).'/100 perc.', '');
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
    rcon('map '.$x_mapname, '');
          AddToLog("[" . $datetime . "] MAP VOTE: " . $mapvote_ip . " (" . $mapvote_name . ") (" . $mapvote_id . ") BY: (" . $nickr . ")  R ");
        }
		}
      }
    }
  }
}}
?>
 
