<?php
if (strpos($msgr, ixz . 'report ') !== false) {
  if (empty($reportdisscord)) $reportdisscord = time() + 15;
  $nickname = htmlentities($nickr);
  $msgrxd = str_replace(ixz . 'report', '', $msgr);
  $msgrxd = trim($msgrxd);
  if (!empty(webhookurl_enable)) {
    if (!empty($reportdisscord)) {
      if (time() - $reportdisscord >= 10) {
        $reportdisscord = time();
discord_bot($server_ip,$server_port,$nickname,$guidn,$msgrxd,discord_report);
      }
      if (!empty($idnum)) xcon('tell ' . $idnum . '  ' . $msgrxd . ' ^1REPORTED! ', '');
    }
  }
}
?>