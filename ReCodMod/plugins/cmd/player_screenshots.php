<?php
	if ((preg_match("/^".$ixz."xget /i", $msgr)) || (preg_match("/^".$ixz."xgetss /i", $msgr)))
	{	if ($game_patch != 'cod1_1.1')
		{
		$cron_timeq = filemtime($cpath . "ReCodMod/cache/x_cron/cron_gts_".$server_ip."_".$server_port);
		if (time() - $cron_timeq >= 60 * $players_access_xget)
			{

				list($cmv, $numm) = explode(' ', $msgr);
				
				if (!empty($numm))
					{
					rcon('getss ' . $numm, '');
					
					rcon('tell ' . $idnum . ' ^6[^1RCM^3bot^6] ^7' . $getssx, '');
					file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_gts_".$server_ip."_".$server_port, "");
					}
				  else
					{
					rcon('tell ' . $idnum . ' ^6[^1RCM^3bot^6] ^7ERROR -> NO ID NUMBER!!!!!', '');
					}
				}
			}
		}
?> 