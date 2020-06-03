<?php
//.main cfg _settings.ini LOADER
 $config_data = parse_ini_file($cpath . "cfg/_settings.ini", true);
 foreach($config_data as $section => $r)   
 {   foreach($r as $string => $value){
		if(!defined($string))
		define($string, $value);    	
 }}
if (empty($_SERVER['OS']))
     $_SERVER['OS'] = '';
if (strpos($_SERVER['OS'], 'Win') !== false){

function hxlog($scwin)
{
    $scwin = str_replace(array(
        "//////"
    ), "\\", $scwin);
    $scwin = str_replace(array(
        "/////"
    ), "\\", $scwin);
    $scwin = str_replace(array(
        "////"
    ), "\\", $scwin);
    $scwin = str_replace(array(
        "///"
    ), "\\", $scwin);
    $scwin = str_replace(array(
        "//"
    ), "\\", $scwin);
    $scwin = str_replace(array(
        "/"
    ), "'\\'", $scwin);	
    $scwin = str_replace(array(
        "'\\\\'"
    ), "\\", $scwin);
    $scwin = str_replace(array(
        "'\\\'"
    ), "\\", $scwin);
    $scwin = str_replace(array(
        "'\\'"
    ), "\\", $scwin);	
    $scwin = str_replace(array(
        "'\'"
    ), "\\", $scwin);		
    return $scwin . "";
}

}else{

function hxlog($scwin)
{
    $scwin = str_replace(array(
        "//////"
    ), "/", $scwin);
    $scwin = str_replace(array(
        "/////"
    ), "/", $scwin);
    $scwin = str_replace(array(
        "////"
    ), "/", $scwin);
    $scwin = str_replace(array(
        "///"
    ), "/", $scwin);
    $scwin = str_replace(array(
        "//"
    ), "/", $scwin);
    $scwin = str_replace(array(
        "'\\\\'"
    ), "/", $scwin);
    $scwin = str_replace(array(
        "'\\\'"
    ), "/", $scwin);
    $scwin = str_replace(array(
        "'\\'"
    ), "/", $scwin);	
    $scwin = str_replace(array(
        "'\'"
    ), "/", $scwin);		
    return $scwin . "";
}

}

function ewc($string) {
$string = str_replace("Resource id", "Rank", $string);
return $string;
}




 $mplogfilexl = hxlog($mplogfile);



		   if(empty($cur_seek_pos_end))
			   $cur_seek_pos_end = 5;


 function readloglines($infologtxt) {
global $cpath, $server_ip, $server_port, $server_rconpass, $mplogfile, $out_root, $cur_seek_pos_end;


 $filepath = hxlog($mplogfile);
 $handlePos =  fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos.txt', 'r+');//открываем файл с последним положением
 
	if (($buffer = fgets($handlePos, 10)) !== false) {
        $startPos=(int)$buffer;
        if($startPos<0) $startPos=0;
    
   if (strpos($mplogfile, 'ftp:') !== false){ 
   
$mplogfilei = str_replace(array("ftp://"), '', $mplogfile);
$ftp_user_explode = explode(':', $mplogfilei);
  $ftp_exp_user = $ftp_user_explode[0];

$ftp_pass_explode = explode('@', $ftp_user_explode[1]);
  $ftp_exp_password = $ftp_pass_explode[0];

$mssf = explode('@', $ftp_user_explode[1]);
$mssy = explode('/', $mssf[1]);
  $ftp_exp_ip = $mssy[0];

$mssy = explode($mssy[0], $mssf[1]);
  $ftp_exp_url = $mssy[1];

$gmlobame = basename($ftp_exp_url);   
   
   
     $handle =  @fopen(hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame), 'rb');
   }else
		 $handle =  @fopen($filepath, 'rb');	
	
        //$handle = file_get_contents($filepath,true);
        if($handle){
            $buffer='';
            $newPos=$startPos;
			
		/*	
			if($cur_seek_pos_end == 1)
			{
			    fseek($handle, $startPos, SEEK_END);//указатель в положение	
				
				$cur_seek_pos_end = 5;
			}	
			else
		*/		
                fseek($handle, $startPos, SEEK_SET);//указатель в положение
			
     // if (($buffer = fgets($handle, 8192)) !== false) {//попытка чтения строки
	    if (($buffer = stream_get_line($handle, 8192, "\n")) !== false) {//попытка чтения строки
            //echo "\n read line: \n",$buffer,"\n\n";//прочитали строку
				$infologtxt = $buffer;
                $newPos=ftell($handle);//оказались в позиции
            }
            fclose($handle);

            if($newPos!=$startPos){
                rewind($handlePos);
                fwrite($handlePos, sprintf('%09d', $newPos));//записываем позицию, на которой остановились
            }
        }
        fclose($handlePos);
   
   }
    return $infologtxt;
}





 function newreadloglines($infologtxt) {
global $cpath, $server_ip, $server_port, $server_rconpass, $mplogfile;

 $filepath = hxlog($mplogfile);
 
 
   if (empty(($_SESSION[$server_port]))){
 
    $handlePosh = @fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_position.txt', 'r+');//открываем файл с последним положением 

if (($bufferh = fgets($handlePosh, 10)) !== false)
        $_SESSION[$server_port]=(int)$bufferh;
	else
   $_SESSION[$server_port] = 0;
    
   }
       
   
      if (empty(($newPos)))
       $newPos = -1;
   
    if (!empty(($_SESSION[$server_port]))){  
        $session_port = $_SESSION[$server_port];
	    global $session_port;
	}
   
 if ($_SESSION[$server_port] != $newPos){ 
 
	$startPos = $_SESSION[$server_port];
        
		if($startPos<0) 
			$startPos=0;

        $handle = @fopen($filepath, 'rb');

        if($handle){
            $buffer='';
            $newPos=$startPos;
            fseek($handle, $startPos, SEEK_SET);//указатель в положение

		   if (($buffer = fgets($handle, 5000)) !== false) //попытка чтения строки
			{
                //echo "\n read line: \n",$buffer,"\n\n";//прочитали строку
				$infologtxt = $buffer;
                $newPos=ftell($handle);//оказались в позиции
            }
            fclose($handle);

            if($newPos!=$startPos){
				$_SESSION[$server_port] = $newPos;  
             }
         }
     }
   return $infologtxt;
}



function readloglinercx($inlogtxtc) {
global $cpath, $server_ip, $server_port, $server_rconpass, $mplogfile;
//require $cpath.'cfg/_connection.php';

 $filepathf = $cpath."ReCodMod/cache/x_logs/parsed_code_".$server_ip."_".$server_port.".log";
 $handlePosh = @fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos2.txt', 'r+');//открываем файл с последним положением
    if (($bufferh = fgets($handlePosh, 10)) !== false) {
        $startPos=(int)$bufferh;
        if($startPos<0) $startPos=0;

        $handleh = @fopen($filepathf, 'rb');
        if($handleh){
            $bufferh='';
            $newPosh=$startPos;
            fseek($handleh, $startPos, SEEK_SET);//указатель в положение
            if (($bufferh = fgets($handleh, 5000)) !== false) {//попытка чтения строки
                //echo "\n read line: \n",$bufferh,"\n\n";//прочитали строку
				$inlogtxtc = $bufferh;
                $newPosh=ftell($handleh);//оказались в позиции
            }
            fclose($handleh);

            if($newPosh!=$startPos){
                rewind($handlePosh);
                fwrite($handlePosh, sprintf('%09d', $newPosh));//записываем позицию, на которой остановились
            }
        }
        fclose($handlePosh);
   
   }
    return $inlogtxtc;
}

//Funktionen
function makeuptime($time)		//Generiert aus Minuten Tage, Stunden und Minuten
{
	$minuten = $time % 60;
	$weiter = ($time - $minuten) / 60;
	$stunden = $weiter % 24;
	$tage = ($weiter - $stunden) / 24;
	return sprintf("%dD %02d:%02d", (int)$tage, (int)$stunden, (int)$minuten);
}

function makeuptime2 ($time)		//Generiert aus Sekunden Stunden, Minuten und Sekunden
{
	$sekunden = $time % 60;
	$weiter = ($time - $sekunden) / 60;
	$minuten = $weiter % 60;
	$stunden = ($weiter - $minuten) / 60;
	return sprintf("%02d:%02d:%02d", (int)$stunden, (int)$minuten, (int)$sekunden);
}

function error_handler($errno, $errstr, $errfile, $errline) {
	global $logging, $server_port, $server_ip;

	if (error_reporting() == 0) return;

    $errortype = array (
        E_ERROR              => 'Error',
        E_WARNING            => 'Warning',
        E_PARSE              => 'Parsing Error',
        E_NOTICE             => 'Notice',
        E_CORE_ERROR         => 'Core Error',
        E_CORE_WARNING       => 'Core Warning',
        E_COMPILE_ERROR      => 'Compile Error',
        E_COMPILE_WARNING    => 'Compile Warning',
        E_USER_ERROR         => 'User Error',
        E_USER_WARNING       => 'User Warning',
        E_USER_NOTICE        => 'User Notice',
        E_STRICT             => 'Runtime Notice',
        E_RECOVERABLE_ERROR  => 'Catchable Fatal Error'
    );

    $dir = dirname(__FILE__);
    $errfile = substr(str_replace($dir, "", $errfile), 1);

	$logging->write(MOD_PHPERROR, "Server port: ".$server_ip."_".$server_port." | $errortype[$errno] in $errfile:$errline => $errstr");
}
/*
function parse_cfg_file($file, $process_sections = false) {
  global $logging;

  $process_sections = ($process_sections !== true) ? false : true;

  $ini = file($file);
  if (count($ini) == 0) {return array();}

  $sections = array();
  $values = array();
  $result = array();
  $globals = array();
  $i = 0;
  $lineno = 0;
  foreach ($ini as $line) {
    $lineno ++;
    $line = trim($line);
    $line = str_replace("\t", " ", $line);

    // Comments
    if (!preg_match('/^[a-zA-Z0-9[-]/', $line)) {
        if (!empty($line) && $line{0} != ";") { //Not a Comment
            $logging->write(MOD_ERROR, "Parse error in $file on line $lineno");
        }
        continue;
    }

    // Sections
    if ($line{0} == '[') {
      $tmp = explode(']', $line);
      $sections[] = trim(substr($tmp[0], 1));
      $i++;
      continue;
    }

    // Key-value pair
    $parts = explode('=', $line, 2);
    if (count($parts) != 2) {
        $logging->write(MOD_ERROR, "Parse error in $file on line $lineno");
    }
    list($key, $value) = $parts;
    $key = trim($key);
    $value = trim($value);

    if (strtolower($value) == "null") {
        $value = null;
    }
    else {
        if (strstr($value, ";")) {
          $tmp = explode(';', $value);
          if (count($tmp) == 2) {
            if ((($value{0} != '"') && ($value{0} != "'")) ||
                preg_match('/^".*"\s*;/', $value) || preg_match('/^".*;[^"]*$/', $value) ||
                preg_match("/^'.*'\s*;/", $value) || preg_match("/^'.*;[^']*$/", $value) ){
              $value = $tmp[0];
            }
          } else {
            if ($value{0} == '"') {
*///              $value = preg_replace('/^"(.*)".*/', '$1', $value);
//            } elseif ($value{0} == "'") {
//              $value = preg_replace("/^'(.*)'.*/", '$1', $value);
/*            } else {
              $value = $tmp[0];
            }
          }
        }
        $value = trim($value);
        $value = trim($value, "'\"");
    }

    if ($i == 0) {
      if (substr($line, -1, 2) == '[]') {
        $globals[$key][] = $value;
      } else {
        $globals[$key] = $value;
      }
    } else {
      if (substr($line, -1, 2) == '[]') {
        $values[$i-1][$key][] = $value;
      } else {
        $values[$i-1][$key] = $value;
      }
    }

  }

  for($j = 0; $j < $i; $j++) {
    if ($process_sections === true) {
      $result[$sections[$j]] = $values[$j];
    } else {
      $result[] = $values[$j];
    }
  }

  return $result + $globals;
}
*/

function size($size)
{
	$sizes = Array('Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB');
	$ext = $sizes[0];
	for ($i=1; (($i < count($sizes)) && ($size >= 1024)); $i++) {
		$size = $size / 1024;
		$ext  = $sizes[$i];
	}
	$size = round($size, 2) . ' ' . $ext;
	return $size;
}
/*
function config_merge($config1, $config2) {
    $configs = func_get_args();
    $result = array_shift($configs);

    foreach ($configs as $config) {
        foreach ($config as $sectionname => $section) {
            foreach ($section as $key => $value) {
                $result[$sectionname][$key] = $value;
                if ($value == null) {
                    unset($result[$sectionname][$key]);
                }
            }
        }
    }

    return $result;
}

function array_i_key_exists($needle, $stack) {
    $needle = strtolower($needle);
    $keys = array_keys($stack);
    $keys = array_map("strtolower", $keys);
    return (in_array($needle, $keys));
}

function parse_argv($possible) {

    global $argv, $argc;

    $parsed = array();

    for ($i = 1; $i < $argc; $i ++) {
        if ($argv[$i]{0} != "-" && $argv[$i]{0} != "/") {
            throw new Exception("Unrecognized part '$argv[$i]'");
        }

        $name = strtolower(substr($argv[$i], 1));
        if (!array_key_exists($name, $possible)) {
            throw new Exception("Unrecognized parameter '$argv[$i]'");
        }

        if (array_key_exists($name, $parsed) && !$possible[$name]["multiple"]) {
            throw new Exception("'$name' can't be set multiple times");
        }

        $values = array();
        for ($j = 1; $j <= $possible[$name]["count"]; $j++, $i++) {

            if (!isset($argv[$i + 1])) {
                throw new Exception("Wrong parameter count for '$name'");
            }

            if ($possible[$name]["count"] == 1) {
                $values = $argv[$i + 1];
            }
            else {
                $values[] = $argv[$i + 1];
            }
        }

        if ($possible[$name]["multiple"]) {
            if (!array_key_exists($name, $parsed)) {
                $parsed[$name] = array();
            }
            $parsed[$name][] = $values;
        }
        else {
            $parsed[$name] = $values;
        }

    }

    return $parsed;

}
*/
function get_time() {  
    $start  = date('Y-m-d H:i:s', time());  
    $end    = date('Y-m-13 7:i:s', strtotime('next Wednesday'));  
    $d_start    = new DateTime($start);  
    $d_end      = new DateTime($end);  
    $diff = $d_start->diff($d_end); 
    if ($diff->format('%d') == 6 && $diff->format('%h') >= 22)  
        return '-----------'; 
    else 
//	return $diff->format('^7HA4AJIO 4EPE3: ^1%d  ^7DHEU  ^1%h  ^74ACOB  ^1%i  ^7MUHYT ^1%s  ^7CEKYHD.'); 
return $diff->format('^7THE BEGINNING IN: ^1%d  ^7DAYS  ^1%h  ^7HOURS  ^1%i  ^7MIN.  AND ^1%s  ^7SEC.');  
	 } 
	 
	 
function chatrr($string) {
$string = str_replace("^0", "", $string);
$string = str_replace("^1", "", $string);
$string = str_replace("^2", "", $string);
$string = str_replace("^3", "", $string);
$string = str_replace("^4", "", $string);
$string = str_replace("^5", "", $string);
$string = str_replace("^6", "", $string);
$string = str_replace("^7", "", $string);
$string = str_replace("^8", "", $string);
$string = str_replace("^9", "", $string);
return $string;
}	 

// !"sv_mapRotation" is:"gametype ^5sd map mp_harbor gametype ^5sd map mp_harbor map mp_pavlov map mp_carentan map mp_powcamp map mp_railyard map mp_depot map mp_dawnville map mp_logging_mill map mp_brecourt map mp_rocket^7" default:"^7"

function sv_rotation($string) {
$string = str_replace(" default:", "", $string);
$string = str_replace(" is:", "", $string);
$string = str_replace("map ", "", $string);
$string = str_replace("sv_mapRotation", "", $string);
$string = str_replace("sv_Rotation", "", $string);
$string = str_replace("^5sd ", "", $string);
$string = str_replace("tdm ", "", $string);
$string = str_replace("pam ", "", $string);
$string = str_replace("bel ", "", $string);
$string = str_replace("^5pam ", "", $string);
$string = str_replace("^1zom ", "", $string);
$string = str_replace("all ", "", $string);
$string = str_replace("zom ", "", $string);
$string = str_replace("dm ", "", $string);
$string = str_replace("war ", "", $string);
$string = str_replace("bas ", "", $string);
$string = str_replace("gg ", "", $string);
$string = str_replace("gungame ", "", $string);
$string = str_replace("gun ", "", $string);
$string = str_replace("gg ", "", $string);
$string = str_replace("koth ", "", $string);
$string = str_replace("surv ", "", $string);
$string = str_replace("dth ", "", $string);
$string = str_replace("ctf ", "", $string);
$string = str_replace("actf ", "", $string);
$string = str_replace("htf ", "", $string);
$string = str_replace("rsd ", "", $string);
$string = str_replace("sv_mapRotation", "", $string);
$string = str_replace("mp_", "", $string);
$string = str_replace("^2_tdm ", "", $string);
$string = str_replace("^2tdm ", "", $string);
$string = str_replace("gametype ", "", $string);
$string = str_replace("default:", "", $string);
$string = str_replace('^7""^7"', '', $string);
$string = str_replace('!"""', '', $string);
return $string;
}

function sv_rotationx($string) {
$string = str_replace(" default:", "", $string);
$string = str_replace(" is:", "", $string);
$string = str_replace("map ", "", $string);
$string = str_replace("sv_mapRotation", "", $string);
$string = str_replace("sv_Rotation", "", $string);
$string = str_replace("sv_mapRotation", "", $string);
$string = str_replace("gametype ", "", $string);
$string = str_replace("default:", "", $string);
$string = str_replace('^7""^7"', '', $string);
$string = str_replace('!"""', '', $string);
return $string;
}

function mapmprs($string) {
$string = str_replace("mp_", "", $string);
return $string;
}

function sv_rtdot($string) {
$string = str_replace(" ", ",", $string);
return $string;
}

function onefxx($onxf)
{
    $onxf = str_replace(array(
        " 50"
    ), "", $onxf);
    $onxf = str_replace(array(
        " 100"
    ), "", $onxf);
}	
/*
function __autoload($class_name) {
global $cpath;
    require_once $cpath."ReCodMod/classes/" . $class_name . '.class.php';	
}
*/
function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
		
    );
    return strtr($string, $converter);
}


function ftp2locallog($gmlobame) {
	global $mplogfile;
$mplogfilei = str_replace(array(
    "ftp://"
  ), '', $mplogfile);
$ftp_user_explode = explode(':', $mplogfilei);
  $ftp_exp_user = $ftp_user_explode[0];

$ftp_pass_explode = explode('@', $ftp_user_explode[1]);
  $ftp_exp_password = $ftp_pass_explode[0];

$mssf = explode('@', $ftp_user_explode[1]);
$mssy = explode('/', $mssf[1]);
  $ftp_exp_ip = $mssy[0];

$mssy = explode($mssy[0], $mssf[1]);
  $ftp_exp_url = $mssy[1];

$gmlobame = basename($ftp_exp_url);

return $ftp_exp_user."%".$ftp_exp_password."%".$ftp_exp_ip."%".$ftp_exp_url."%".$gmlobame;
}
/*

function pdoMultiInsert($tableName, $data, $pdoObject){
    
    //Will contain SQL snippets.
    $rowsSQL = array();
 
    //Will contain the values that we need to bind.
    $toBind = array();
    
    //Get a list of column names to use in the SQL statement.
    $columnNames = array_keys($data[0]);
 
    //Loop through our $data array.
    foreach($data as $arrayIndex => $row){
        $params = array();
        foreach($row as $columnName => $columnValue){
            $param = ":" . $columnName . $arrayIndex;
            $params[] = $param;
            $toBind[$param] = $columnValue; 
        }
        $rowsSQL[] = "(" . implode(", ", $params) . ")";
    }
 
    //Construct our SQL statement
    $sql = "INSERT INTO `$tableName` (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
 
    //Prepare our PDO statement.
    $pdoStatement = $pdoObject->prepare($sql);
 
    //Bind our values.
    foreach($toBind as $param => $val){
        $pdoStatement->bindValue($param, $val);
    }
    
    //Execute our statement (i.e. insert the data).
    return $pdoStatement->execute();
}


//An array of arrays, containing the rows that we want to insert.
$rowsToInsert = array(
    array(
        'name' => 'John Doe',
        'dob' => '1993-01-04',
    ),
    array(
        'name' => 'Jane Doe',
        'dob' => '1987-06-14',
    ),
    array(
        'name' => 'Joe Bloggs',
        'dob' => '1989-09-29',
    )
);
 
//An example of adding to our "rows" array on the fly.
$rowsToInsert[] = array(
    'name' => 'Patrick Simmons',
    'dob' => '1972-11-12'
);
 
//Call our custom function.
pdoMultiInsert('people', $rowsToInsert, $pdo);




*/
require_once $cpath."ReCodMod/functions/log.class.php";
?>
