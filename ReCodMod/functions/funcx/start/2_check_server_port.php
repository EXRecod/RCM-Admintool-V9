<?php
	   $countserver_port    = strlen($server_port);
    if ($countserver_port < 3)
	{echo ' PORT ERROR '; require $cpath . 'ReCodMod/functions/null.php'; 
if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}