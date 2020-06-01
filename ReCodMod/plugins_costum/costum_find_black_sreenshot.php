<?php
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
///////////////          BLACK SCREENSHOTS DETECTING PLUGIN / Авто поиск черных скринов
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
if(!empty($cron_scan_img))
{
$cron_timeq = filemtime($cron_scan_img);
if (time() - $cron_timeq >= 10) {
	
  $folder_adrr = '';
  $g = 0;
  $stringip = str_replace(".", "_", $server_ip); 
  
  $allplugs = getDirContents($cpath . 'cfg/');
  foreach ($allplugs AS $va) {
    if (strpos($va, '.ini') !== false) {
      $ini_array = parse_ini_file($va, true);
      foreach ($ini_array as $construct => $gq) {
        $a = 0;
        foreach ($gq as $const => $stringq) {
		if(!is_array($stringq))
		{			
          if (($const . $stringq) == ("enable1")){
            if (($construct) == ("black_screenshots"))  $a = 1;
          }
          else if ($a == 1) {
			  
			 	  echo "\n[BLACK SCREENSHOTS]_".$construct;	 
			  
            if ($const == "worntimes") $worntimes = $stringq;
            else if (strpos($const, "folder_") !== false) {
				 $adrr = $stringq;
				  
              if (preg_match('/'.$server_ip.';'.$server_port.'/', $adrr, $p)) 
				  $folder_adrr = $adrr;
            }

            if (!empty($folder_adrr)) {
			if($g == 0)
			{				
				$g=1;
                 
             list($ff, $fd, $folder_adrrtwo) = explode(';', $folder_adrr);
			 
			  if (file_exists($folder_adrrtwo))  
			  {
				    
              $allplugs = getDirContents($folder_adrrtwo);
              foreach ($allplugs AS $image) {
                if ((strpos($image, '.jpeg') !== false) || (strpos($image, '.jpg') !== false)) {
                  
				  $cron_tq = filemtime($image);
				  
				  if (!file_exists($cpath.'ReCodMod/cache/screenshots/cached/'.$stringip . '_' . $server_port. '/'.md5($image).'.log')) {
				  
                  if (time() - $cron_tq <= 160) {

                    touch($cpath.'ReCodMod/cache/screenshots/cached/'.$stringip . '_' . $server_port. '/'.md5($image).'.log');

 
                    $img = new GeneratorImageColorPalette();
                    $colors = $img->getImageColor($image, 10, $image_granularity = 5);
                    if (is_array($colors) || is_object($colors)) {
                      $cnts3 = 0;
                      foreach ($colors as $value) {
						  
					       if ((strpos($value, '000') !== false)
							 ||(strpos($value, '111') !== false)
						     ||(strpos($value, '222') !== false)
							 ||(strpos($value, '333') !== false))
						         ++$cnts3; 
                      }
                    }
					 
                    if ($cnts3 == 1) {
                    
                      $filecontent = file_get_contents($image);
                      $metapos = strpos($filecontent, "CoD4X");
                      $meta = substr($filecontent, $metapos);
                      $data = explode("\0", $meta);
                      $hostname = $data[1];
                      $map = $data[2];
                      $playername = $data[3];
                      $guid = $data[4];
                      $shotnum = $data[5];
                      $time = $data[6];
					  
					 if (!file_exists($cpath.'ReCodMod/cache/screenshots/cached/black_sreenshots/'.$stringip . '_' . $server_port. '/'.$guid.'.log')) 
					 {
				       touch($cpath.'ReCodMod/cache/screenshots/cached/black_sreenshots/'.$stringip . '_' . $server_port. '/'.$guid.'.log');
				       xcon('say ' . html_entity_decode($playername) . ' ^2GUID: ^3' . $guid . ' ^1BLACK SCREENSHOT DETECTED! ^7' . $time . '', '');
                       
					   
					 if($worntimes > 0)
					   xcon('clientkick ' . $guid . ' BLACK SCREENSHOT DETECTED!', '');
				     else
					   xcon('banUser '.$guid.' ^1 BLACK SCREENSHOT DETECTED!', ''); 
					 
					 }
                     else
					 {
					  
					  xcon('say ' . html_entity_decode($playername) . ' ^2GUID: ^3' . $guid . ' ^1BLACK SCREENSHOT DETECTED! ^7' . $time . '', '');
                      
					 
					 if($worntimes > 0)
					   xcon('clientkick ' . $guid . ' BLACK SCREENSHOT DETECTED!', '');
				     else
					   xcon('banUser '.$guid.' ^1 BLACK SCREENSHOT DETECTED!', ''); 
					 
					  
					    }
					  
                      }
					  
                    }
					else if (time() - $cron_tq >= 3600) {
					{
						
					if (file_exists($cpath.'ReCodMod/cache/screenshots/cached/'.$stringip . '_' . $server_port. '/'.md5($image).'.log'))
						unlink($cpath.'ReCodMod/cache/screenshots/cached/'.$stringip . '_' . $server_port. '/'.md5($image).'.log');

					}
					  }
					}
                  }
                }
              }
            }
          }
        }
      }
    }
  }
  }
  file_put_contents($cron_scan_img, "-");
    }
  }
}