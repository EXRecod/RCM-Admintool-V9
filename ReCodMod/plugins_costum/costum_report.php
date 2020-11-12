<?php
if (strpos($msgr, ixz.'report ') !== false) {
 
 sleep(2);
 
 if(empty($reportdisscord))
	 $reportdisscord = time()+15;
 
 				$nickname = htmlentities($nickr);

				 	
				$msgrxd = str_replace(ixz.'report', '', $msgr);
				$msgrxd = trim($msgrxd);
				
				
				
				
						if (!empty(webhookurl_enable)) {
 
  if(!empty($reportdisscord))
  {
	 if(time() - $reportdisscord >= 10)
	 {
$reportdisscord = time();
			

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================

$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Message
    //"content" => "Nickname: $nickname / Message : $msgrxd",
    
    // Username
    "username" => $nickname." ".$guidn,

    // Avatar URL.
    // Uncoment to replace image set in webhook
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => "PLAYER REPORT Server:".$server_ip . ":" . $server_port,

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "Nickname: $nickname / Message : $msgrxd",

            // URL of title link
            "url" => "https://github.com/EXRecod/RCM-Admintool-V9",

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "3366ff" ),

            // Footer
            "footer" => [
                "text" => "COD4",
                "icon_url" => "https://raw.githubusercontent.com/EXRecod/RCM-Admintool-V9/master/cfg/languages/favicon.png"
            ],

            // Image to send
            // "image" => [
            //     "url" => "https://raw.githubusercontent.com/EXRecod/RCM-Admintool-V9/master/cfg/languages/favicon.png"
            // ],

            // Thumbnail
            //"thumbnail" => [
            //    "url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=400"
            //],

            // Author
            "author" => [
                "name" => "ReCodMod",
                "url" => "https://github.com/EXRecod/RCM-Admintool-V9"
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );
	
}	
                                                              
										 
										
	 								 		if (!empty($idnum)) 
			                                     xcon('tell ' . $idnum . '  '.$msgrxd.' ^1REPORTED! ', '');

										//echo $result;
										//fclose($result);
										 

										file_put_contents($cpath . "ReCodMod/cache/x_crontime/cron_time_alba_" . $server_ip . "_" . $server_port, "");
 
						}
	}
 }
?>