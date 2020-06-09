<?php
if (preg_match('/PS;/', $parseline, $xnon))
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
//////////////////////                                        //////////////////////
//////////////////////    CHAT [VIP] SQLITE WALL ON SITE      //////////////////////
//////////////////////                                        //////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
{
  $cccntx = substr_count($parseline, ';');
  if ($cccntx > 4) list($noon, $st1, $st2, $pl_guid, $st1days, $st2days) = explode(';', $parseline);
  else list($noon, $st1, $pl_guid, $st1days) = explode(';', $parseline);
  //if(empty(SqlDataBase)){
  if (!empty(chatdb)) {
    if ((filesize(chatdb) > (chatdbsize * 1000000))) {
      //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> Chat database chatdbsize mb auto reset! </font> ");
      echo "OK ...";
      if (file_exists(chatdb)) {
        $file = chatdb;
        $newfile = $cpath . "ReCodMod/cache/x_logs/archive/chat/chat";
        $datetime = date('Y.m.d H:i:s');
        if (!copy($file, $newfile . "_" . $datetime . ".db")) {
          echo "Error copy $file...\n";
        }
        else {
          if (file_exists(chatdb)) {
            try {
              $dbc = new PDO('sqlite:' . chatdb);
              $sql = $dbc->prepare("DROP TABLE chat");
              if ($sql->execute()) {
                echo " Table deleted ";
              }
              else {
                print_r($sql->errorInfo());
              }
              unlink(chatdb);
              $dbc->exec('CREATE table chat(
			id INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
			servername varchar(90)  NOT NULL,
			s_port int(6)  NOT NULL,
			guid varchar(40)  NOT NULL,
			nickname varchar(90)  NOT NULL,
			time datetime  NOT NULL,
			timeh datetime  NOT NULL,			
			text varchar(175)  NOT NULL,			
			st1 varchar(40)  NOT NULL,
			st1days varchar(40)  NOT NULL,			
			st2 varchar(40)  NOT NULL,
            st2days varchar(40)  NOT NULL,			
			ip varchar(16)  NOT NULL,
			geo varchar(40)  NOT NULL,
			z varchar(10)  NOT NULL,
			t varchar(10)  NOT NULL,
			x varchar(10)  NOT NULL,
			c varchar(10)  NOT NULL)');
              $st = $dbc->query('SELECT image FROM chat');
              $result = $st->fetch(PDO::FETCH_LAZY);
              if (sizeof($result) == 0) {
                echo 'Table created successfully' . "\n";
              }
              require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
            }
            catch(PDOException $e) {
              errorspdo('[' . $datetime . '] 2140 ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
          }
        }
      }
    }
  } //}
  try {
    $dbc = new PDO('sqlite:' . chatdb);
    //if(preg_match("/[\d]+[\d]{14,22}/",$pl_guid))
    if (!empty($pl_guid)) {
      //$nservername = meessagee($servername);
      //$nservername = matmat($nservername);
      //$nservername = md5($nservername);
      $nservername = $server_port;
      if ($cccntx > 4) {
        if ($st2days < 1) {
          $st2 = '0';
          $st2days = '0';
        }
        if ($st1days < 1) {
          $st1 = '0';
          $st1days = '0';
        }
      }
      else {
        if ($st1days < 1) {
          $st1 = '0';
          $st1days = '0';
        }
        $st2 = '0';
        $st2days = '0';
      }
      $st1 = str_replace(' ', '', $st1);
      $st2 = str_replace(' ', '', $st2);
      $st1days = str_replace(' ', '', $st1days);
      $st2days = str_replace(' ', '', $st2days);
      $sql = "INSERT INTO chat (servername, s_port, guid, nickname, time, timeh, text, st1, st1days, st2, st2days, ip, geo, z, t, x, c) 
					VALUES ('$servername', '$svipport', '$pl_guid', '0', '$datetime', '$datetime', '0', '0', '$st1', '$st1days', '$st2', '$st2days', '0', '0', '0', '0', '0')";
      $dbc->query($sql);
      //echo '-' . $pl_status . '-' . $pl_guid . '-' . $pl_vip_days;
      if ($cccntx > 4) $dbc->query("UPDATE chat SET st1='$st1',st1days='$st1days', st2='$st2', st2='$st2days' WHERE guid='$pl_guid' and t='xl'");
      else $dbc->query("UPDATE chat SET st1='$st1',st1days='$st1days' WHERE guid='$pl_guid' and t='xl'");
    }
    require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e) {
    errorspdo('[' . $datetime . '] 2237  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
}
?>
