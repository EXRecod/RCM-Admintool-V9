<?php  

$server_addr = "udp://" . $server_ip;
if (strpos($game_patch, 'cod1_1.1') !== false)
{	
$retries = 2;
@$connect = fsockopen($server_addr, $server_port, $re, $errstr, 4);
}
else
{
$retries = 2;
@$connect = fsockopen($server_addr, $server_port, $re, $errstr, 30);	
}

if (!$connect) { die('Can\'t connect to COD gameserver.'); }

if (strpos($game_patch, 'cod1_1.1') !== false)	
  socket_set_timeout ($connect, 0, 117000);  // bylo2
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
} while (--$retries >= 0);
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


if(empty($rconarray))
  $rconarray = array();
else
{unset($rconarray);$rconarray = array();}

$patternx[0] = "/\s*(\d+)\s+(-?\d+)\s+(\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+) (.+?)\s+(\d+)\s+(\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)/";
$patternx[1] = '#^\s*(\d+)\s+(-?\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+) (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)$#';
$patternx[2] = "#\s*(\d+)\s+(-?\d+)\s+(\d+)\s* (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)#";									
			
//$patternx[] = "/\s*(\d+)\s+(-?\d+)\s+(\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+) (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)/";
//$patternx[] = "/\s*(\d+)\s+(-?\d+)\s+(\d+)\s+(\d+)\s+([a-fA-F0-9]{16,32}|\d+) (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)/";			
//$patternx[] = "/\s*(\d+)\s+(-?\d+)\s+(\d+) (.+?)\s+(\d+) (\d+\.\d+\.\d+\.\d+):(\-?\d+)\s+(\-?\d+)\s+(\d+)/";



$newoutput  = preg_grep ('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/', $newoutputtwo);
 
foreach ($newoutput as $nm) {
foreach ($patternx as $rr => $pattern) {
			if (preg_match($pattern, $nm, $sb)) {
			//if(!empty($sb[1])){		

        $sbouts = str_replace(' ', '', implode(",", $output));


	if($rr == 2)
	{

if(strpos($sbouts,'numscorepingnamelastmsgaddressqportrate') !== false)
        { 
		if (preg_match('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $sb[6], $sbn)) {
			
				if (preg_match('/[0-9]{1,2}/', $sb[1], $sbn)) {

				if($sb[6] == '127.0.0.1') $sb[6] = '111.111.111.111';
$rangeip = '';
if (!empty(trim($sb[6])))
{	
 list($onem, $twom, $threem, $fourm) = explode(".", $sb[6]);
  $rangeip = $onem.'.'.$twom.'.'.$threem;
}	

                //$conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . fakeguid(uncolorize($sb[4]).$rangeip)))))));
                  $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . fakeguid($sb[4])))))));
				 $ipdd   = ''; 
				 $plarid = '';
				 $ipdd   = trim($sb[6]);
				 $plarid = trim($sb[1]);
				  
				if (empty($stats_array[$conisq]['ip_adress']))
				          $stats_array[$conisq]['ip_adress'] = $ipdd;
	            if (empty($stats_array[$conisq]['nickname'])) 
	                      $stats_array[$conisq]['nickname']  = ''.$sb[4].''; 
	           if (!empty($stats_array[$conisq]['nickname;'])) 
	                      $stats_array[$conisq]['nickname;'] = ''.$sb[4].'';
   	           if (empty($stats_array[$conisq]['guid'])) 
	                     $stats_array[$conisq]['guid']   = fakeguid($sb[4]); //fakeguid(uncolorize($sb[4]).$rangeip);  	
   	           if (empty($stats_array[$conisq]['admins'])) 
	                     $stats_array[$conisq]['admins'] = fakeguid(uncolorize($sb[4]).$rangeip);  
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
                if (empty($stats_error[$plarid]['ipv']))
				{					
                    $stats_error[$plarid]['ipv']  = $ipdd;
					$stats_error[$plarid]['name'] = trim($sb[4]);
				}
					  
                else if (!empty($stats_error[$plarid]['name']))
				{
					  if((($stats_error[$plarid]['ipv']) == $ipdd)&&(($stats_error[$plarid]['name']) != trim($sb[4])))
					  {
						  
				if (empty($stats_error[$plarid]['no_nickname_change']))
				          $stats_error[$plarid]['no_nickname_change'] = $stats_error[$plarid]['name'];
				if (empty($stats_error[$plarid]['no_nickname_change_timer']))
				          $stats_error[$plarid]['no_nickname_change_timer'] = time();
					  
					  }
                    else if((($stats_error[$plarid]['ipv']) != $ipdd)&&(($stats_error[$plarid]['name']) == trim($sb[4])))
					  {
						  
							usleep(20000);
							xcon('say ^3FAKE => ^1['.$sb[4].']' . '', '');
						    xcon('clientkick ' . $plarid, '');	
						  
				if (empty($stats_error[$plarid]['no_nickname_change']))
				          $stats_error[$plarid]['no_nickname_change'] = $stats_error[$plarid]['name'];
				if (empty($stats_error[$plarid]['no_nickname_change_timer']))
				          $stats_error[$plarid]['no_nickname_change_timer'] = time();
					  
					  } 
                    else if((($stats_error[$plarid]['ipv']) == $ipdd)&&(($stats_error[$plarid]['name']) == trim($sb[4])))
					  {
				          unset($stats_error[$plarid]['no_nickname_change']);
				          unset($stats_error[$plarid]['no_nickname_change_timer']);
					  
					  } 
					
				}
		 	    $z = 0;
				for ($i = 0; $i <= 60; $i++) {
					++$z;
				if (!empty($stats_error[$i]['name']))
				{

				if (!empty($stats_error[$z]['name']))
				{	
				       if((uncolorize($stats_error[$i]['name'])) == uncolorize($stats_error[$z]['name']))
					   {
						   	usleep(20000);
							xcon('say ^3FAKE => ^1['.$sb[4].'] REASON => NO DUBLICATE!', '');
						    xcon('clientkick ' . $z, '');	
					   }
				 }	   
				}
				if (!empty($stats_error[$i+1]['name']))
				{		
				if (!empty($stats_error[$z-1]['name']))
				{	
				       if((uncolorize($stats_error[$i+1]['name'])) == uncolorize($stats_error[$z-1]['name']))
					   {
						   	usleep(20000);
							xcon('say ^3FAKE => ^1['.$sb[4].'] REASON => NO DUBLICATE!', '');
						    xcon('clientkick ' . ($z-1), '');	
					   }
				}	   
				}
			 }
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$rconarray[] = array(
					"num" => trim($sb[1]),
					"score" => trim($sb[2]),
					"ping" => trim($sb[3]),
					"name" => $sb[4],
					//"guid" => fakeguid(uncolorize($sb[4]).$rangeip),
					  "guid" => fakeguid($sb[4]),
					"lastmsg" => $sb[5],
					"ip" => trim($sb[6])
				);
		}			
	   }}
	   
	   //var_dump($rconarray);
	   
	}		 
else if($rr == 1)
	{	
if(strpos($sbouts,'numscorepingguidnamelastmsgaddressqportrate') !== false)
        { 
		if (preg_match('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $sb[7], $sbn)) {
			if (preg_match('/[a-fA-F0-9]{16,32}/', $sb[4], $sbn)) {
				if (preg_match('/[0-9]{1,2}/', $sb[1], $sbn)) {
		//НИКНЕЙМ ПОПРАВКА :7
		$sb[5] = str_replace('^7', '', $sb[5]);
		if($sb[7] == '127.0.0.1') $sb[7] = '111.111.111.111';	
				$rconarray[] = array(
					"num" => trim($sb[1]),"score" => trim($sb[2]),"ping" => trim($sb[3]),"guid" => trim($sb[4]),"name" => trim($sb[5]),"ip" => trim($sb[7])
					);
		}			
	   }
	   }}
	}
else if($rr == 0)
	{

if(strpos($sbouts,'numscorepingplayeridsteamidnamelastmsgaddressqportrate') !== false)
{
		//НИКНЕЙМ ПОПРАВКА :7
		if (preg_match('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $sb[8], $sbn)) {		
		$sb[6] = str_replace('^7', '', $sb[6]);
		if($sb[8] == '127.0.0.1') $sb[8] = '111.111.111.111';
				$rconarray[] = array(
					"num" => trim($sb[1]),"score" => trim($sb[2]),"ping" => trim($sb[3]),"guid" => trim($sb[4]),"steam" => trim($sb[5]),"name" => trim($sb[6]),"lastmsg" => $sb[7],"ip" => trim($sb[8]),
					"port" => trim($sb[9]),
					//"qport" => $sb[10],
					//"rate" => $sb[11],
					);
}
	}	
	
	}
	
			//}
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