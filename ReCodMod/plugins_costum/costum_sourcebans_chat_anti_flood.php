<?php
if ((strpos($parseline, "say;") !== false) || (strpos($parseline, "sayteam;") !== false))
{
 if(!empty($guidn))
 {  
 $steamerid = '';
 $x_mat_detected = true;
 $whilecounts    = 0;
 $stolwlp        = 0;
 $stopscp        = 0;
 $sbbid_session = 0;
 $u = 0;
 $ff = 0;
	
 $nickname = htmlentities($nickr);
 $allplugs = getDirContents($cpath . 'cfg/');
 foreach ($allplugs AS $va)
 {
  if (strpos($va, '.ini') !== false)
  {
   $ini_array = parse_ini_file($va, true);
   $a = 0;

   foreach ($ini_array as $construct => $gq)
   {
    foreach ($gq as $const => $stringq)
    {
     		if(!is_array($stringq))
		{
	  if (($const . $stringq) == ("enable1"))
     {
       
     if (($construct) == ("sourcebans_chat_anti_flood"))
	 
       $a = 1;
	 }
     else if ($a == 1)
     {
		
		 if($ff == 0)
	 echo "\n[sourcebans_chat_anti_flood]_".$construct;	
      $ff = 1; 
      if (empty($stopscp))
      {
      
       $stopscp    = 1;
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       ////////////////////////////////////////////////////////////////////////////////////////////////////  

        $pl_msg = '';
	    $yesorno = '';
        $source_bans_host = '';
        $source_bans_name = '';	
        $source_bans_user = '';	
        $source_bans_pass = '';
        $source_bans_charset = '';				
        $warn_message = '';				
        $kickreason = '';
        $banreason = '';
        $kick = '';
        $warns = '';
        $c = '';				
        $sbantime = '';	   
	   
       $pl_msg     = iconv("windows-1251", "utf-8", $msgr);
       $player_msg = mb_strtolower($pl_msg);
                        
if (empty($flooddata))
    $flooddata[][][][][][][][] = array();

if (strpos($parseline, "say;") !== false)
  $parseex = explode("say;", $parseline);
else
  $parseex = explode(" ", $parseline);	
   
if (!array_key_exists($guidn, $flooddata))
    $flooddata[$guidn][$guidn]['sec'][1]['time'][time()]['msg'][1][''.md5($parseex[1]).''] = $guidn;
	else{
foreach ($flooddata as $guidxid => $f)
  {
	  $cn = 0;
	  $kstatus = 0; $kx = 0;
	  $dstatus = 0; $dx = 0;
	  $hstatus = 0; $hx = 0;
      $time = 0;	  
	  
    foreach ($f as $guid => $s)
      {
        foreach ($s as $kstatus => $v)
          {
            foreach ($v as $kx => $t)
              {
                foreach ($t as $dstatus => $j)
                  {
                    foreach ($j as $time => $r)
                      {
						 foreach ($r as $hstatus => $q)
                           {
							foreach ($q as $hx => $x)
                              {
						        foreach ($x as $slsl => $sw)
                                  {	  
								   
                        if (array_key_exists($guidxid, $flooddata))
                          {
							  
							if($slsl == md5($parseex[1]))
							{								
							  
                            if ($guidn == $guidxid)
							{   
						       //echo "\n\n==",$guidxid,'=seconds=',$kx,'>'.((int)$kx + ((time()) - (int)$time)).'<','=time=',$time,'=msgs='.$hx.''.$parseex[1].'';
                             
						   unset($flooddata[$guidxid]);
						    
                                 if ((((int)$kx + ((time()) - (int)$time)) <= 10) && ((int)$hx >= 3))
								 {
								$x_mat_detected = false;			  
			   
                              //trigger_error("TEST *** flooder? $guid : [$datetime] [time:$time]/[msg:$hx] $server_ip:$server_port \n\n", E_USER_ERROR);							  
								 }							  
							else if ((((int)$kx + ((time()) - (int)$time)) > 10) && ((int)$hx >= 0))
							{
								$flooddata[$guidn][$guidn]['sec'][1]['time'][time()]['msg'][1][''.md5($parseex[1]).''] = $guidn;
                              echo 'unset';
							}
							else
					            $flooddata[$guidxid][$guid]['sec'][(int) $kx + (time() - (int)$time)]['time'][(int)$time]['msg'][(int) $hx + 1][''.md5($parseex[1]).''] = $guidxid;
							  
							}
							} 
                          else { 
						  unset($flooddata[$guidxid]); 
						  $flooddata[$guidn][$guidn]['sec'][1]['time'][time()]['msg'][1][''.md5($parseex[1]).''] = $guidn;
						  
						  }							
                      }
                  }
              }
          }
      }
  }}
}}}}	   
	    
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       ////////////////////////////////////////////////////////////////////////////////////////////////////                        
      }
	  
	  
	  
      if (!$x_mat_detected)
      {
       if (!empty($badword)) //$pl_msg
        $stringq = str_replace("{WORD}", htmlentities($badword), $stringq);
       else
        $stringq = str_replace("{WORD}", htmlentities($pl_msg), $stringq);
       
      
       if (strpos($const, 'source_bans_host') !== false)
        $source_bans_host = $stringq;
       else if (strpos($const, 'source_bans_name') !== false)
        $source_bans_name = $stringq;
       else if (strpos($const, 'source_bans_user') !== false)
        $source_bans_user = $stringq;
       else if (strpos($const, 'source_bans_pass') !== false)
        $source_bans_pass = $stringq;
       else if (strpos($const, 'source_bans_charset') !== false)
        $source_bans_charset = $stringq;
       else if (strpos($const, 'warn_message') !== false)
        $warn_message = $stringq;
       else if (strpos($const, 'kickreason') !== false)
        $kickreason = $stringq;
       else if (strpos($const, 'banreason') !== false)
        $banreason = $stringq;
       else if (strpos($const, 'kick') !== false)
	   {
        $kick = $stringq;
		if (empty($kick))
			$kick = 'x';
	   }
       else if (strpos($const, 'warns') !== false)
        $warns = $stringq;
       else if (strpos($const, 'rcon') !== false)
        $c = $stringq;
       else if (strpos($const, 'bantime') !== false)
        $sbantime = $stringq;
        
        ///////////////////////////////////////////////////////////////
        if (!empty($source_bans_host))
        {
		 if (!empty($source_bans_name))
          {	
		 if (!empty($source_bans_user))
           {	
          if (!empty($source_bans_pass))
            {
          if (!empty($source_bans_charset))
            {				
          if (!empty($warn_message))
            {				
          if (!empty($kickreason))
            {
          if (!empty($banreason))
            {
         if (!empty($kick))
            {
         if (!empty($warns))
            {
         if (!empty($c))
            {				
         if (!empty($sbantime))
            {
				
         if ($whilecounts == 0)
         {
          
          $whilecounts = 1;
          
          $htmlnickname    = html_entity_decode($nickr);
          $sbdatetime      = date('Y-m-d H:i:s');
          $sbcreated       = strtotime($sbdatetime);
          //$sbantimestrtime = strtotime("+".$sbantime." day");
          $sbantimestrtime = strtotime(date('Y-m-d H:i:s', strtotime(''.$sbantime.' hour')));		  
          
          $stringip               = str_replace(".", "_", $server_ip);
          $sourcebans_chat_b_guid = $cpath . 'ReCodMod/cache/sourcebans_chat_ban/' . $stringip . '_' . $server_port . '_' . $guidn . '.log';
          
          
          if (!file_exists($cpath . 'ReCodMod/cache/sourcebans_chat_ban/'))
           mkdir($cpath . 'ReCodMod/cache/sourcebans_chat_ban/', 0777, true);
          
          $stringip = str_replace(".", "_", $server_ip);
          
          try
          {
           if (empty($Msql_support))
           {
            $sb = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
           }
           else
           {
            $dsnx = "mysql:host=$source_bans_host;dbname=$source_bans_name;charset=$source_bans_charset";
            if (empty($msqlconnectx))
             $msqlconnectx = new PDO($dsnx, $source_bans_user, $source_bans_pass);
            $sb = $msqlconnectx;
           }
          
           $steamid = $sb->query("SELECT CONCAT(\"STEAM_\", ((CAST('" . $guidn . "' AS UNSIGNED) >> CAST('56' AS UNSIGNED)) - CAST('1' AS UNSIGNED)),    \":\", (CAST('" . $guidn . "' AS UNSIGNED) &    CAST('1' AS UNSIGNED)), \":\", (CAST('" . $guidn . "' AS UNSIGNED) &    CAST('4294967295' AS UNSIGNED)) >> CAST('1' AS UNSIGNED)) AS steam_id;");
           $dvz     = $steamid->fetch(PDO::FETCH_LAZY);
           if (!empty($dvz))
           {
            
            foreach ($dvz as $key => $value)
            {
             if ($key == 'steam_id')
              $steamerid = $value;
            
            }
           }
          
           $dvz     = null;
           $steamid = null;
		  
           $steaf = $sb->query("SELECT bid from sb_comms ORDER BY `bid` DESC limit 1");
           $dr      = $steaf->fetch(PDO::FETCH_LAZY);		   
           if(!empty($dr))
		   {
		   foreach ($dr as $key => $value)
            {
             if ($key == 'bid')
              $sbbid = $value;
            }
		   $dr     = null;
           $steaf = null; 
           		   
           
		   $sbbid = $sbbid+1;
		  
		  
		 //$steamid = $sb->query("SELECT bid,authid,ends,length,name from sb_comms where now() <= from_unixtime(`ends`) and authid = '" . $steamerid . "' or `length` = '0' and authid = '" . $steamerid . "' ORDER BY `bid` DESC limit 1");
        
		  
           $steamid = $sb->query("SELECT authid,bid from sb_comms where authid = '" . $steamerid . "' ORDER BY `bid` DESC limit 1");
           $dv      = $steamid->fetch(PDO::FETCH_LAZY);
           }
            
			
			
			if (empty($dv))
           {
            
            if (!file_exists($sourcebans_chat_b_guid))
             touch($sourcebans_chat_b_guid);
            
            
            if (file_exists($sourcebans_chat_b_guid))
            {
             $fplineq = fopen($sourcebans_chat_b_guid, 'r');
             $fpline  = fgets($fplineq);
             fclose($fplineq);
            }
            
            if (!file_exists($sourcebans_chat_b_guid))
            {
             touch($sourcebans_chat_b_guid);
             
             if ($c != "say")
              xcon($c . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $warn_message . '  warn: 1/' . $warns . '', '');
             else
              xcon('say ' . $htmlnickname . ' ' . $warn_message . '  warn: 1/' . $warns . '', '');
            
             if ($warns == 0)
             {
              
			  if($sbbid_session == 0)
			  {
              $sbbid_session = 1;				  
              $stmt = $sb->query("INSERT INTO `sb_comms` (`bid`,`authid`, `name`, `created`, `ends`, `length`, `reason`, `aid`, `adminIp`, `sid`, `RemovedBy`, `RemoveType`, `RemovedOn`, `type`, `ureason`) VALUES
('" . $sbbid . "','" . $steamerid . "', '" . $htmlnickname . "', '" . $sbcreated . "', $sbantimestrtime, '" . ($sbantimestrtime - $sbcreated) . "', '" . $banreason . "', 0, '" . $server_ip . "', 0, NULL, NULL, NULL, 2, NULL)");
              $stmt = null;
			  }
			 if ($c != "say")
               xcon($c . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $banreason . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
              else
               xcon('say ' . $htmlnickname . ' ' . $banreason . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');			  
			  
              
             }
             if ($kick != 'x')
              xcon('clientkick ' . $idnum . ' ' . $kickreason, '');
            
            }
            else if ((file_exists($sourcebans_chat_b_guid)) and (empty($fpline)))
            {
            
             file_put_contents($sourcebans_chat_b_guid, '1');
            
             if ($c != "say")
              xcon($c . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $warn_message . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
             else
              xcon('say ' . $htmlnickname . ' ' . $warn_message . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
            
            }
            else if ((file_exists($sourcebans_chat_b_guid)) and (!empty($fpline)))
            {
            
             if (($fpline + 1) > $warns)
             {
              $fp = fopen($sourcebans_chat_b_guid, 'w');
              fputs($fp, "0");
              fclose($fp);
  			  if($sbbid_session == 0)
			  {
              $sbbid_session = 1;	            
              $stmt = $sb->query("INSERT INTO `sb_comms` (`bid`,`authid`, `name`, `created`, `ends`, `length`, `reason`, `aid`, `adminIp`, `sid`, `RemovedBy`, `RemoveType`, `RemovedOn`, `type`, `ureason`) VALUES
('" . $sbbid . "','" . $steamerid . "', '" . $htmlnickname . "', '" . $sbcreated . "', $sbantimestrtime, '" . ($sbantimestrtime - $sbcreated) . "', '" . $banreason . "', 0, '" . $server_ip . "', 0, NULL, NULL, NULL, 2, NULL)");
              $stmt = null;
              }
              if ($kick != 'x')
               xcon('clientkick ' . $idnum . ' ' . $kickreason, '');
              
			  
              if ($c != "say")
               xcon($c . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $banreason . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
              else
               xcon('say ' . $htmlnickname . ' ' . $banreason . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');			  
			  
			  
             }
             else
             {
              
              if ($c != "say")
               xcon($c . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $warn_message . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
              else
               xcon('say ' . $htmlnickname . ' ' . $warn_message . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
              
              
              $fp = fopen($sourcebans_chat_b_guid, 'w');
              fputs($fp, ((int) $fpline + 1));
              fclose($fp);
             }
            
            }
            
           }
           else
           {
       
	         $steamid = $sb->query("SELECT bid,authid,ends,length,name from sb_comms where authid = '" . $steamerid . "' ORDER BY `bid` DESC limit 1");
        	 $dvt     = $steamid->fetch(PDO::FETCH_LAZY);
            
            if (!empty($dvt))
            {
				 
            if (!file_exists($sourcebans_chat_b_guid))
             touch($sourcebans_chat_b_guid);
            
            
            if (file_exists($sourcebans_chat_b_guid))
            {
             $fplineq = fopen($sourcebans_chat_b_guid, 'r');
             $fpline  = fgets($fplineq);
             fclose($fplineq);
            }
             
             foreach ($dvt as $key => $value)
             {
              if ($key == 'ends')
               $sb_ends = $value;
              if ($key == 'length')
               $sb_length = $value;
			  
              if (!empty($sb_ends))
               {
				   ////////////////////////////  ПРОВЕРКА СРОКА 21>12>2019
			 if (((int)$sb_ends-((int)(strtotime('now')))<0))
                {
				if (!empty($sb_length))
                 {  
			   if (empty($u))
                  { 

                $u = 1;
			        if(empty($sb_length))
						$sb_length = 5000;
			  
               $sbantimestrtime  = $sb_length * 2;
               $sbantimestrtimex = $sbcreated + $sbantimestrtime;
              /////ВАЖНО    ЗАКОНЧИТСЬЯ < СОЗДАН БАН
               if ($sb_ends < $sbcreated)
			   {
			if($sbbid_session == 0)
			  {
              $sbbid_session = 1;	
                $stmt = $sb->query("INSERT INTO `sb_comms` (`authid`, `name`, `created`, `ends`, `length`, `reason`, `aid`, `adminIp`, `sid`, `RemovedBy`, `RemoveType`, `RemovedOn`, `type`, `ureason`) VALUES
('" . $steamerid . "', '" . $htmlnickname . "', '" . $sbcreated . "', $sbantimestrtimex, '" . ($sbantimestrtimex - $sbcreated) . "', '" . $banreason . "', 0, '" . $server_ip . "', 0, NULL, NULL, NULL, 2, NULL)");
			   $stmt = null;
			   }
			    
             if (($fpline + 1) > $warns)
             {
              $fp = fopen($sourcebans_chat_b_guid, 'w');
              fputs($fp, "0");
              fclose($fp);
          	if($sbbid_session == 0)
			  {
              $sbbid_session = 1;	    
              $stmt = $sb->query("INSERT INTO `sb_comms` (`bid`,`authid`, `name`, `created`, `ends`, `length`, `reason`, `aid`, `adminIp`, `sid`, `RemovedBy`, `RemoveType`, `RemovedOn`, `type`, `ureason`) VALUES
('" . $sbbid . "','" . $steamerid . "', '" . $htmlnickname . "', '" . $sbcreated . "', $sbantimestrtime, '" . ($sbantimestrtime - $sbcreated) . "', '" . $banreason . "', 0, '" . $server_ip . "', 0, NULL, NULL, NULL, 2, NULL)");
              $stmt = null;
              }
              if ($kick != 'x')
               xcon('clientkick ' . $idnum . ' ' . $kickreason, '');
              
			  
              if ($c != "say")
               xcon($c . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $banreason . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
              else
               xcon('say ' . $htmlnickname . ' ' . $banreason . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');			  
			  
			  
             }
             else
             {
              
              if ($c != "say")
               xcon($c . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $warn_message . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
              else
               xcon('say ' . $htmlnickname . ' ' . $warn_message . '  warn: ' . ($fpline + 1) . '/' . $warns . '', '');
              
              
              $fp = fopen($sourcebans_chat_b_guid, 'w');
              fputs($fp, ((int) $fpline + 1));
              fclose($fp);
             } 
			     }
                }   
			  }
             }
            }
           }
		 }
       }
          
           $sb      = null;
           $dv      = null;
           $dvt     = null;
           $stmt    = null;
           $steamid = null;
          
           require $cpath . 'ReCodMod/functions/null_db_connection.php';
          }
          catch (PDOException $e)
          {
           echo "\n\n\n ERROR: ", $e->getMessage();
           echo "\n\n\n";
           errorspdo('[' . $date . '] FILE:  ' . __FILE__ . ' LOADER  Exception : ' . $e->getMessage());
          }
          touch($sourcebans_chat_b_guid);
         }
        }
       }
      }
     }
    }
   }
  }
 }
}}}}}}}}}}}}}
 
?>