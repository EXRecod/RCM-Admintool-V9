<?php 

	class COD4xServerStatus{
		private $server = '142.93.227.74';
		private $port = '28960';
		private $protocol = 'udp';
		private $data = '';
		private $serverData = array();
		private $players = array();
		private $scores = array();
		private $pings = array();
		private $meta = array();
		private $timeout = 1;
		
		public function __construct($server, $port, $timeout = 1){
			
			global $timeout,$servex3x;
			$server = $servex3x;
			$this->server = $server;
			$this->port = $port;
			$this->timeout = $timeout;
		}
		
		function getServerStatus(){
			$error = false;
			 
			global $timeout,$servex3x;
			$server = $servex3x;
			
			if (!empty($this->server) && !empty($this->port)){					
				$handle = @fsockopen($this->protocol . '://' . $this->server, $this->port);
				
				if ($handle){				
					//socket_set_timeout($handle, $timeout);
					//stream_set_blocking($handle, 1);
					//stream_set_timeout($handle, 5);
					stream_set_timeout ($handle, 0, 250000); //1e5  
							
					fputs($handle, "\xFF\xFF\xFF\xFFgetstatus\x00");
					fwrite($handle, "\xFF\xFF\xFF\xFFgetstatus\x00");					
					
					$this->data = fread($handle, 4192);
					$this->meta = stream_get_meta_data($handle);
					$counter = 4192;
					
					while (!feof($handle) && !$error && $counter < $this->meta['unread_bytes']){
						$this->data .= fread($handle, 2192);
						$this->meta = stream_get_meta_data($handle);
						
						if ($this->meta['timed_out']){
							$error = true;
						}
						
						$counter += 2192;
					}
					
					if ($error){
						echo 'Request timed out.';
						return false;							
					}else{
						if (strlen(trim($this->data)) == 0){							
							echo 'No data received from server.';
							return false;
						}else{
							return true;
						}
					}
				}else{
					echo 'Could not connect to server.';
					return false;
				}
				
				fclose($handle);
			}
		}
		
		function parseServerData(){
			$this->serverData = explode("\n", $this->data);
			$tempplayers = array();
			for ($i = 2; $i <= sizeof($this->serverData) - 1; $i++){
			
				$tempplayers[sizeof($tempplayers)] = trim($this->serverData[$i]);
			}
			
			$tempdata = array();
			$tempdata = explode('\\', $this->serverData[1]);
			$this->serverData = array();
			
			foreach($tempdata as $i => $v){
				if (fmod($i, 2) == 1){
					$t = $i + 1;
					
					$this->serverData[$v] = $tempdata[$t];
				}
			}
			
			$this->serverData['sv_hostname'];
			$this->serverData['gamename'];
			$this->serverData['shortversion'];
			
			//$this->serverData['_Maps'] = explode('-', $this->serverData['_Maps']);
			
			foreach($tempplayers as $i => $v){
							
				if (strlen(trim($v)) > 1){
					$temp = explode(' ', $v);					
					$this->scores[sizeof($this->scores)] = $temp[0];
					$this->pings[sizeof($this->pings)] = $temp[1];
					
					$pos = strpos($v, '"') + 1;
					$endPos = strlen($v) - 1;
					
					$this->players[sizeof($this->players)] = substr($v, $pos, $endPos - $pos);
				}
			}			
		}
		
		
		function returnData(){
			return $this->data;
		}
		
		function returnMeta(){
			return $this->meta;
		}
		
		function returnServerData(){
			return $this->serverData;
		}
		
		function returnPlayers(){
			return $this->players;
		}
		
		function returnPings(){
			return $this->pings;
		}
		
		function returnScores(){
			return $this->scores;
		}
	}

?> 