<?php 
if ((strpos($msgr, $ixz.'group+') !== false)||(strpos($msgr, $ixz.'group-') !== false))
    {  
        $cntddt = substr_count($msgr, ' ');
        if ($cntddt == 2)
		{
list($x_cmd, $x_idn, $groupname) = explode(' ', $msgr);
if (strpos('admin;moderator;vip;moderator;registered;administrator', $groupname) !== false) {
if(strlen($x_idn) < 3)
   list($num,$i_ping,$i_ip,$i_name,$i_guid,$xxccode) = explode(';', (rconExplodeIdnum($x_idn)));
 
//!group+all [id|guid] groupname
//updater and insert

if (strpos($msgr, $ixz.'group+all') !== false)
{
config_ini_set("_groups_database", $groupname,'all_'.$i_guid,$i_guid);
}
else if (strpos($msgr, $ixz.'group+') !== false)
{ 
config_ini_set("_groups_database", $groupname,$server_port.'_'.$i_guid,$i_guid);
}
else if (strpos($msgr, $ixz.'group-all') !== false)
{
config_ini_del("_groups_database", $groupname,'all_'.$i_guid,$i_guid);
}
else if (strpos($msgr, $ixz.'group-') !== false)
{ 
config_ini_del("_groups_database", $groupname,$server_port.'_'.$i_guid,$i_guid);
} 
		} 
		} 
	}
?>
 

