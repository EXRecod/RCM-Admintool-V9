<?php
if ($x_stop_lp == 0) {
  //////////////////////////////////////////////////////////////////////////////////////////+ LOG CLEANER
  //////////////////////////////////////////////////////////////////////////////////////////+ LOG CLEANER
  if (!file_exists($cpath . 'ReCodMod/cache/x_cron/cron_q_' . $server_ip . '_' . $server_port)) {
    touch($cpath . 'ReCodMod/cache/x_cron/cron_q_' . $server_ip . '_' . $server_port);
    touch($cpath . 'ReCodMod/cache/x_cron/cron_gts_' . $server_ip . '_' . $server_port);
    touch($cpath . 'ReCodMod/cache/x_cron/cron_idk_' . $server_ip . '_' . $server_port);
    touch($cpath . 'ReCodMod/cache/x_cron/cron_dbx_' . $server_ip . '_' . $server_port);
    $dir = $cpath . "ReCodMod/cache/x_logs/backup";
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    chmod($cpath . "ReCodMod/cache/x_logs/backup", 0777);
  }
  $cron_timeq = filemtime($cpath . "ReCodMod/cache/x_cron/cron_q_" . $server_ip . "_" . $server_port);
  if (time() - $cron_timeq >= 60 * 10) {
    file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_q_" . $server_ip . "_" . $server_port, "");
    $flmbx = $cpath . "ReCodMod/cache/x_logs/" . $server_ip . "_" . $server_port . "_chat.html";
    if (filesize($flmbx) > (cht_archive * 1000000)) {
      //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> Chat log cht_archive mb auto reset! </font> ");
      echo "OK ...";
      if (file_exists($cpath . 'ReCodMod/cache/x_logs/' . $server_ip . '_' . $server_port . '_chat.log')) {
        $file = $cpath . "ReCodMod/cache/x_logs/" . $server_ip . "_" . $server_port . "_chat.log";
        $newfile = $cpath . "ReCodMod/cache/x_logs/archive/chat/chat";
        $datetime = date('Y.m.d H:i:s');
        if (!copy($file, $newfile . "_" . $datetime . ".log")) {
          echo "Error copy $file...\n";
        }
        else {
          $handlePos = fopen($cpath . "ReCodMod/cache/x_logs/" . $server_ip . "_" . $server_port . "_chat.log", "w+");
          fwrite($handlePos, "1");
          fclose($handlePos);
        }
      }
      if (file_exists($cpath . 'ReCodMod/cache/x_logs/' . $server_ip . '_' . $server_port . '_chat.html')) {
        $file = $cpath . "ReCodMod/cache/x_logs/" . $server_ip . "_" . $server_port . "_chat.html";
        $newfile = $cpath . "ReCodMod/cache/x_logs/archive/chat/chat";
        $datetime = date('Y.m.d H:i:s');
        if (!copy($file, $newfile . "_" . $datetime . ".html")) {
          echo "Error copy $file...\n";
        }
        else {
          $handlePos = fopen($cpath . "ReCodMod/cache/x_logs/" . $server_ip . "_" . $server_port . "_chat.html", "w+");
          fwrite($handlePos, "1");
          fclose($handlePos);
        }
      }
    }
  }
  $cron_timeq = filemtime($cpath . "ReCodMod/cache/x_cron/cron_dbx_" . $server_ip . "_" . $server_port);
  if (time() - $cron_timeq >= 60 * 60 * cht_databases) {
    file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_dbx_" . $server_ip . "_" . $server_port, "");
    if (file_exists($cpath . 'ReCodMod/databases/db0.sqlite')) {
      $file = $cpath . "ReCodMod/databases/db0.sqlite";
      $newfile = $cpath . "ReCodMod/cache/x_logs/backup/";
      $datetime = date('Y.m.d H:i:s');
      if (!copy($file, $newfile . "_" . $datetime . ".db0.sqlite")) {
        echo "Error copy $file...\n";
      }
    }
    if (file_exists($cpath . 'ReCodMod/databases/db1.sqlite')) {
      $file = $cpath . "ReCodMod/databases/db1.sqlite";
      $newfile = $cpath . "ReCodMod/cache/x_logs/backup/";
      $datetime = date('Y.m.d H:i:s');
      if (!copy($file, $newfile . "_" . $datetime . ".db1.sqlite")) {
        echo "Error copy $file...\n";
      }
    }
    if (!empty($bannlist)) {
      if (file_exists($cpath . 'ReCodMod/databases/db2.sqlite')) {
        $file = $cpath . "ReCodMod/databases/db2.sqlite";
        $newfile = $cpath . "ReCodMod/cache/x_logs/backup/";
        $datetime = date('Y.m.d H:i:s');
        if (!copy($file, $newfile . "_" . $datetime . ".db2.sqlite")) {
          echo "Error copy $file...\n";
        }
      }
    }
    else {
      if (!empty($bannlist)) {
        if (file_exists($bannlist)) {
          $file = $bannlist;
          $newfile = $cpath . "ReCodMod/cache/x_logs/backup/";
          $datetime = date('Y.m.d H:i:s');
          if (!copy($file, $newfile . "_" . $datetime . ".db2.sqlite")) {
            echo "Error copy $file...\n";
          }
        }
      }
    }
    if (file_exists($cpath . 'ReCodMod/databases/db3.sqlite')) {
      $file = $cpath . "ReCodMod/databases/db3.sqlite";
      $newfile = $cpath . "ReCodMod/cache/x_logs/backup/";
      $datetime = date('Y.m.d H:i:s');
      if (!copy($file, $newfile . "_" . $datetime . ".db3.sqlite")) {
        echo "Error copy $file...\n";
      }
    }
    if (file_exists($cpath . 'ReCodMod/databases/db4.sqlite')) {
      $file = $cpath . "ReCodMod/databases/db4.sqlite";
      $newfile = $cpath . "ReCodMod/cache/x_logs/backup/";
      $datetime = date('Y.m.d H:i:s');
      if (!copy($file, $newfile . "_" . $datetime . ".db4.sqlite")) {
        echo "Error copy $file...\n";
      }
    }
  }
}
?>