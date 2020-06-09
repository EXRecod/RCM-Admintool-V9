<?php
if (!empty($stats_array[$conisq]['user_status'])) {
  if (chat_simple_antiflood_enable == 1) {
    if (($stats_array[$conisq]['user_status'] == 'registered') || ($stats_array[$conisq]['user_status'] == 'guest')) {
      $m[0] = 0;
      preg_match('/\d[0-9]{0,3}\:\d[0-9]{0,2}/', $parseline, $m);
      if (!empty($m[0])) $keyhm = str_replace(":", "", $m[0], $keyhm);
      $keyhm = (int)$keyhm;
      $eF = 0;
      $stk = 0;
      $zi = 0;
      for ($c = 0;$c <= 50;$c++) {
        ///////////
        if ((empty($chat_flooder_time[$conisq][$c])) && ($stk == 0)) {
          $stk = 1;
          $chat_flooder_time[$conisq][$c] = $keyhm;
          $chat_flooder_msg[$conisq][$c] = allclearsymb($msgr);
        }
        if ((!empty($chat_flooder_time[$conisq][$c])) && (!empty($chat_flooder_time[$conisq][$c + 1]))) {
			
			
          $ir = $chat_flooder_time[$conisq][$c + 1] - $chat_flooder_time[$conisq][$c];		  
//echo " \n TIMEGAME: ",$keyhm;
//echo " \n TIMEGAME: ",$chat_flooder_time[$conisq][$c+1];
//echo " \n TIMEGAME: ",$chat_flooder_time[$conisq][$c];
echo " \n\n between time =  $ir \n ";
  
		}
        else $ir = 1000;
		 
        if (((!empty($chat_flooder_msg[$conisq][$c])) && (!empty($chat_flooder_msg[$conisq][$c + 1]))) || ((!empty($chat_flooder_msg[$conisq][$c])) && (!empty($chat_flooder_msg[$conisq][$c + 2]))) || ((!empty($chat_flooder_msg[$conisq][$c])) && (!empty($chat_flooder_msg[$conisq][$c + 3])))) {
          if ($chat_flooder_msg[$conisq][$c + 1] == $chat_flooder_msg[$conisq][$c]) {
            $zi = 1;
            $ir = 1;
          }
          else $zi = 0;
        }
        if ($eF == 0) {
          $eF = 1;
          if ($ir <= chat_s_between_time) {
            if (empty($chat_flooder_warns[$conisq])) $chat_flooder_warns[$conisq][0] = 1;
            else {
              $stj = 0;
              for ($i = 1;$i <= 20;$i++) {
                if ((empty($chat_flooder_warns[$conisq][$i])) && ($stj == 0)) {
                  $chat_flooder_warns[$conisq][$i] = 1;
                  $stj = 1;
                }
              }
            }
          }
        }
        //////////////
        
      }
      if (!empty($chat_flooder_warns[$conisq])) {
		  		   
					  if (chat_s_warnings == "tell") $mesqw = "tell " . $idnum;
          else $mesqw = "say";
		  if (strpos($game_patch, 'cod1_1') !== false)
			  $mesqw = "say";
		  
        if ((0 < count($chat_flooder_warns[$conisq])) && (4 > count($chat_flooder_warns[$conisq]))) {
           
          if ($zi == 1) rcon($mesqw . ' ^6^7  ' . $nickr . ' "^2[^7Chat Flooding detected!^2] [^7Warning ' . count($chat_flooder_warns[$conisq]) . '^2/^7' . chat_s_antiflood_warns . '^2]^7 stop flooding or you get a kick^1!', '');
          else rcon($mesqw . ' ^6^7  ' . $nickr . ' "^3[^7Chat Flooding detected!^3] [^7Warning ' . count($chat_flooder_warns[$conisq]) . '^3/^7' . chat_s_antiflood_warns . '^3]^7 stop flooding or you get a kick^1!', '');
          AddToLog("[" . $datetime . "] CHAT Chat FloodingS KICKER: (" . $nickr . ")");
        }
        if (chat_s_antiflood_warns <= count($chat_flooder_warns[$conisq])) {
          rcon($mesqw . ' ^6^7  ' . $nickr . ' "^1[^7Chat Flooding detected!^1] [^7Warning ' . count($chat_flooder_warns[$conisq]) . '^1/^7' . chat_s_antiflood_warns . '^1]^7 ' . chat_s_antiflood_warns_reason . '^1!', '');
          unset($chat_flooder_time[$conisq]);
          unset($chat_flooder_warns[$conisq]);
          unset($chat_flooder_msg[$conisq]);
          if (strpos($game_patch, 'cod1') === false) rcon(chat_s_antiflood_warns_reason . ' ' . $idnum . ' CHAT FLOOD!', '');
          else rcon(chat_s_antiflood_warns_reason . ' ' . $idnum, '');
        }
      }
    }
  }
}
?>