<?php

define ("MOD_NOTICE", 1);
define ("MOD_WARNING", 2);
define ("MOD_ERROR", 3);
define ("MOD_PHPERROR", 4);
define ("MOD_SQLITEERROR", 5);

class log {

	private $fp;
	private $filename;
	private static $uptime = "0:00";

	public function __construct($filename) {
	    if (!file_exists($filename)) {
	        fclose(fopen($filename, "w"));
	    }
		if (!is_writable($filename)) {
			die ("Could not write to $filename\n");
		}
		$this->filename = $filename;
	}

	public function write($type, $string, $echo = true) {
		if (!is_array($string)) {
			$string = array($string);
		}
		foreach ($string as $value) {
			$types = array(
				1 => "Notice",
				2 => " !! Warning",
				3 => " !! Error",
				4 => "PHP-Error",
				5 => "Exception",
			);

			$timestamp = date("[d.m.y H:i:s]");

			$line = "$timestamp $types[$type]: $value";

			if (!is_resource($this->fp)) {
				$this->open();
			}

			fwrite($this->fp, str_pad(self::$uptime, 10, " ", STR_PAD_LEFT) . " $line \r\n");

			if ($echo) {
				echo $line . "\n";
			}

			if ($type == 3) {
			    echo "\x07\x07\x07"; //Beep for Windows-Servers :)
				echo "10s to quit\n";
				sleep(10);
				die("Exit cause of a critical error\n\n");
			}
		}

		return true;
	}

	private function open() {
		$this->fp = fopen($this->filename, "a");
	}

	public function __destruct() {
		if (is_resource($this->fp)) {
		    fclose($this->fp);
		}
	}

	public static function setUptime($uptime) {
		self::$uptime = $uptime;
	}

}


?>