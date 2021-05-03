<?php  

$server_addr = "udp://" . $server_ip;
@$connect = fsockopen($server_addr, $server_port, $re, $errstr, 30);
if (!$connect) { die('Can\'t connect to COD gameserver.'); }

if (strpos($game_patch, 'cod1_1.1') !== false)	
  socket_set_timeout ($connect, 0, 67000);  // bylo2
else
  stream_set_timeout ($connect, 0, 36000); //  //36000 было
 
 $send = "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" status';
fwrite($connect, $send);
$output = fread ($connect, 1);
if (!empty($output)) {
do {
$status_pre = socket_get_status ($connect);
$output = $output . fread ($connect, 1024);  //1024
$status_post = socket_get_status ($connect);
} while ($status_pre['unread_bytes'] != $status_post['unread_bytes']);
};

$output = explode ("\xff\xff\xff\xffprint\n", $output);
 $sffg = $output;
$output = implode ('!', $output);
$output = explode ("\n",$output);
$newoutputtwo = $output;
///////////////////////////////////////////////////////////////////
/**/
$newoutput = $sffg;

//echo "\n#######################\n";
//var_dump($newoutput);


if(empty($rconarray))
  $rconarray = array();
else
{unset($rconarray);$rconarray = array();}

		foreach ($newoutput as $nm) {
			// COD1(*<1.2p, UO) COD2 COD4 COD5 ORIGINAL
			// 1:NUM 2:score 3:ping 4:guid 5:name 6:lastmsg 7:IP 8:port 9:qport 10:rate
			$pattern = '#^\s*(\d+)\s+(-?\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+) (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)$#';
			if (preg_match($pattern, $nm, $sb)) {
		if(!empty($sb[7]))
			{
				
if ((filter_var($sb[7], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))||(filter_var($sb[7], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)))
{	
				$rconarray[] = array(
					"num" => $sb[1],
					"score" => $sb[2],
					"ping" => $sb[3],
					"guid" => trim($sb[4]),
					"name" => trim($sb[5]),
					"lastmsg" => $sb[6],
					"ip" => trim($sb[7]),
					"port" => $sb[8],
					"qport" => $sb[9],
					"rate" => $sb[10],
				);
			}
			}
		}}

$goa = 0;
if(!empty($rconarray)) {
foreach ($rconarray as $nmj => $vk) {
foreach ($vk as $i => $k) {		
	if($i=='guid')
	{
	if(!empty($k))
	{
	 if(strlen($k)<10)
       $goa = 1;}}}}}	
if($goa == 0)
{unset($rconarray);$rconarray = array();}

if(empty($rconarray))
{
	 
 $newoutput  = preg_grep ('/[0-9]{1,8}[[:space:]][0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $newoutputtwo);
 
		foreach ($newoutput as $nm) {
			 
			// COD4x 1.8 patch http://cod4x.me project
			// 1:num 2:score 3:ping 4:guid 5:steam 6:name 7:lastmsg 8:IP 9:port 10:qport 11:rate
			$pattern = "/\s*(\d+)\s+(-?\d+)\s+(\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+) (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)/";
			if (preg_match($pattern, $nm, $sb)) {
				//echo "\n".$nm;
			if(!empty($sb[8]))
			{

if ((filter_var($sb[8], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))||(filter_var($sb[8], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)))
{					
				$rconarray[] = array(
				    //"g" => $sb[0],
					"num" => trim($sb[1]),
					"score" => trim($sb[2]),
					"ping" => trim($sb[3]),
					"guid" => trim($sb[4]),
					"steam" => trim($sb[5]),
					"name" => trim($sb[6]),
					"lastmsg" => $sb[7],
					"ip" => trim($sb[8]),
					"port" => trim($sb[9]),
					"qport" => $sb[10],
					"rate" => $sb[11],
				);
			}
		}}
	}
}	
	
	
$goa = 0;
if(!empty($rconarray)) {
foreach ($rconarray as $nmj => $vk) {
foreach ($vk as $i => $k) {		
	if($i=='guid')
	{
	if(!empty($k))
	{
	 if(strlen($k)<10)
       $goa = 1;}}}}}	
if($goa == 0)
{unset($rconarray);$rconarray = array();}
	
 
if(empty($rconarray))
{ 
  $newoutput  = preg_grep ('/[[:space:]][0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $newoutputtwo);
 
		foreach ($newoutput as $nm) {
			
                // COD1 1.1 ORIGINAL
				// 1:num 2:score 3:ping 4:name 5:lastmsg 6:IP 7:port 8:qport 9:rate
                $pattern = "/\s*(\d+)\s+(-?\d+)\s+(\d+) (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)/";
				 
			if (preg_match($pattern, $nm, $sb)) {
				 
					       $shid     = trim($sb[4]);
					       $shid     = crc32($shid);
					       $shid     = hexdec($shid);
                           $shid     = abs($shid);
						   //echo $shid;
if (strlen($shid)<10)
	$shid     = $shid.(abs(hexdec(crc32($shid))));

$string = '231034661'.$shid;

$string = substr($string, 0, 19);
   
 $AFAIK = $string;
			if(!empty($sb[6]))
			{

if ((filter_var($sb[6], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))||(filter_var($sb[6], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)))
{					
				$rconarray[] = array(
				    //"g" => $sb[0],
					"num" => trim($sb[1]),
					"score" => trim($sb[2]),
					"ping" => trim($sb[3]),
					"guid" => $AFAIK,
					"name" => trim($sb[4]),
					"lastmsg" => $sb[5],
					"ip" => trim($sb[6]),
					"port" => trim($sb[7]),
					"qport" => $sb[8],
					"rate" => $sb[9],
				);
			}
			}}
		}
 
/*	
echo "\n -----------------------------\n ";
var_dump($rconarray);
echo "\n -----------------------------";
*/	
}


$goa = 0;
if(!empty($rconarray)) {
foreach ($rconarray as $nmj => $vk) {
foreach ($vk as $i => $k) {		
	if($i=='guid')
	{
	if(!empty($k))
	{
	 if(strlen($k)<10)
       $goa = 1;}}}}}	
if($goa == 0)
{unset($rconarray);$rconarray = array();}











//////////////////////////////////////////////////////////////////////////////////
// MAY 2020 COD4X
///num   score   ping    playerid  steamid   name  lastmsg  address  qport   rate
if(empty($rconarray))
{
	 
$newoutput  = preg_grep ('/[0-9]{1,8}[[:space:]][0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $newoutputtwo);

		foreach ($newoutput as $nm) {
		
			// COD4x 1.8 patch http://cod4x.me project
			// 1:num 2:score 3:ping 4:guid 5:steam 6:name 7:lastmsg 8:IP 9:port 10:qport 11:rate
			$pattern = "/\s*(\d+)\s+(-?\d+)\s+(\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+)(.+?)\s+(\d+)\s+(\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)/";
			
			if (preg_match($pattern, $nm, $sb)) {
				//echo "\n".$nm;
			if(!empty($sb[8]))
			{

if ((filter_var($sb[8], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))||(filter_var($sb[8], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)))
{		

if(trim($sb[8]) == "127.0.0.1")
	$sb[8] = '78.84.53.158';
 

		      if(!empty(trim($sb[4])))
				$rconarray[] = array(
				    //"g" => $sb[0],
					"num" => trim($sb[1]),
					"score" => trim($sb[2]),
					"ping" => trim($sb[3]),
					"guid" => trim($sb[4]),
					"steam" => trim($sb[5]),
					"name" => trim($sb[6]),
					"lastmsg" => $sb[7],
					"ip" => trim($sb[8]),
					"port" => trim($sb[9]),
					"qport" => $sb[10],
					"rate" => $sb[11],
				);
				}
				
			}
		}
	}
}




/*	
	
echo "\n -----------------------------\n ";
var_dump($rconarray);
echo "\n -----------------------------";
*/


 
  $valid_id = '';   $valid_ping = '';
///////////////////////////////////////////////////////////////////

if(preg_grep ('/CoD4 X 1.8/', $output))
$output  = preg_grep ('/[0-9]{1,8}[[:space:]][0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $output);

foreach ($output as $value) {
$pos  = strripos($value, 'map:');
if ($pos !== false) { 
list($user, $mmapname) = explode(": ", $value);   
}}

if(empty($mmapname))
	$mmapname = 'Unknown';

$mmapname = trim($mmapname);


$player_cnt = count($output);
 
unset($output[0],$output[1],$output[2],$output[$player_cnt-2],$output[$player_cnt-1]);
$output = array_values($output);
$player_cnt = count($output);

?>