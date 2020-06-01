<?php                                 
if ($skilll < '-20000'){ 


  usleep($sleep_rcon);
  rcon("say  ^3".$ply." ^7- ".$infoosttta."", "");	
	++$x_number;

 }else{	 	  


 ////COLONEL, admiral........ >>** ..> >>>>  +>>
    if($skilll < '-15000')
	{
		$skill2 = "NOOB 99 LVL";
		$lbr = "N-O-O-B";
		$lvll = "0";
	}
    if($skilll < '-10000')
	{
		$skill2 = "Flotsam and jetsam";
		$lbr = "PAJ";
		$lvll = "1";
	}
	else if($skilll < '-5000')
	{
		$skill2 = "Prisoner Of War";
		$lbr = "POW";
		$lvll = "2";
	}
	else if($skilll < '-4000')
	{
		$skill2 = "Missing In Action";
		$lbr = "MIA";
		$lvll = "3";
	}
	else if($skilll < '-3000')
	{
		$skill2 = "Behind Enemy Lines";
		$lbr = "BEL";
		$lvll = "4";
	}
	else if($skilll < '-2000')
	{
		$skill2 = "Lost";
		$lbr = ". Lost";
		$lvll = "5";
	}
	else if($skilll < '-1000')
	{
		$skill2 = "Overrun";
		$lbr = "- OR";
		$lvll = "6";
	}
	else if($skilll < '-500')
	{
		$skill2 = "Overrun II";
		$lbr = "- OR II";
		$lvll = "7";
	}
	else if($skilll < '-300')
	{
		$skill2 = "Overrun II";
		$lbr = "- OR III";
		$lvll = "8";
	}
	else if($skilll < '-100')
	{
		$skill2 = "Overrun IV";
		$lbr = "- OR IV";
		$lvll = "9";
	}	
   else if($skilll < '10')
	{
		$skill2 = "Fighter LEVEL I";
		$lbr = "F";
		$lvll = "9";
	}
	
	else if($skilll < '220')
	{
		$skill2 = "Fighter LEVEL II";
		$lbr = "F II";
		$lvll = "10";
	}
	
	else if($skilll < '330')
	{
		$skill2 = "Fighter LEVEL III";
		$lbr = "F III";
		$lvll = "11";
	}
	
	else if($skilll < '440')
	{
		$skill2 = "Fighter LEVEL IV";
		$lbr = "F IV";
		$lvll = "12";
	}
	
	else if($skilll < '550')
	{
		$skill2 = "Fighter LEVEL V";
		$lbr = "F V";
		$lvll = "13";
	}	
	else if($skilll < '1000')
	{
		$skill2 = "Silver I";
		$lbr = ">";
		$lvll = "14";
	}
	
	else if($skilll < '1500')
	{
		$skill2 = "Silver II";
		$lbr = ">>";
		$lvll = "15";
	}
	
	else if($skilll < '3300')
	{
		$skill2 = "Silver III";
		$lbr = ">>>";
		$lvll = "16";
	}
	
	else if($skilll < '4400')
	{
		$skill2 = "Silver IV";
		$lbr = ">>>>";
		$lvll = "17";
	}
	
	else if($skilll < '5000')
	{
		$skill2 = "Silver Mater";
		$lbr = "SM>>>>";
		$lvll = "18";
	}	
	
	else if($skilll < '6100')
	{
		$skill2 = "Bronze I";
		$lbr = "B>";
		$lvll = "19";
	}
	
	else if($skilll < '7200')
	{
		$skill2 = "Bronze II";
		$lbr = "B>>";
		$lvll = "20";
	}
	
	else if($skilll < '8300')
	{
		$skill2 = "Bronze III";
		$lbr = "B>>>";
		$lvll = "21";
	}
	
	else if($skilll < '9400')
	{
		$skill2 = "Bronze IV";
		$lbr = "B>>>>";
		$lvll = "22";
	}
	
	else if($skilll < '10000')
	{
		$skill2 = "Bronze MASTER";
		$lbr = "<BM>";
		$lvll = "23";
	}
	else if($skilll < '11000')
	{
		$skill2 = "GOLD I";
		$lbr = "G>";
		$lvll = "24";
	}
	
	else if($skilll < '12200')
	{
		$skill2 = "GOLD II";
		$lbr = "G>>";
		$lvll = "25";
	}
	
	else if($skilll < '13300')
	{
		$skill2 = "GOLD III";
		$lbr = "G>>>";
		$lvll = "26";
	}
	
	else if($skilll < '14400')
	{
		$skill2 = "GOLD IV";
		$lbr = "G>>>>";
		$lvll = "27";
	}
	
	else if($skilll < '15000')
	{
		$skill2 = "GOLD MASTER";
		$lbr = "<GM>";
		$lvll = "28";
	}
	else if($skilll < '15500')
	{
		$skill2 = "Private"; 
		$lbr = "> PFC";
		$lvll = "29";
	}
	else if($skilll < '19000')
	{
		$skill2 = "Private First Class";  
		$lbr = "> PFC";
		$lvll = "30";
	}
	else if($skilll < '25000')
	{
		$skill2 = "Specialist";  
		$lbr = "x> SPC";
		$lvll = "31";
	}
	else if($skilll < '35000')
	{
		$skill2 = "Corporal";  
		$lbr = "x>> Cpl";
		$lvll = "32";
	}
	else if($skilll < '50000')
	{
		$skill2 = "Sergeant";  
		$lbr = "x>>> Sgt";
		$lvll = "33";
	}
	else if($skilll < '60000')
	{
		$lvll = "34";
		$skill2 = "Staff Sergeant";
		$lbr = "(x>>> SSG";
	}
	else if($skilll < '70000')
	{
		$lvll = "35";
		$skill2 = "Sergeant First Class";
		$lbr = "((x>>> SFC";
	}
	else if($skilll < '80000')
	{
		$lvll = "36";
		$skill2 = "Master Sergeant";
		$lbr = "(((x>>> MSG";
	}
	else if($skilll < '90000')
	{
		$lvll = "37";
		$skill2 = "First Sergeant";
		$lbr = "((((*>>> 1SG";
	}
	else if($skilll < '100000')
	{
		$lvll = "38";
		$skill2 = "Sergeant Major";
		$lbr = "((((X>>> SGM";
	}
	else if($skilll < '110000')
	{
		$lvll = "39";
		$skill2 = "Commander Sergeant Major";
		$lbr = "((((X>>> CSM";
	}
	else if($skilll < '130000')
	{
		$lvll = "40";
		$skill2 = "Sergeant Major of the Army";
		$lbr = "((((X>>> SMA";
	}
	else if($skilll < '150000')
	{
		$lvll = "41";
		$skill2 = "Second Lieutenant";
		$lbr = "I 2LT";
	}
	else if($skilll < '160000')
	{
		$lvll = "42";
		$skill2 = "First Lieutenant";
		$lbr = "I 1LT";
	}
	else if($skilll < '200000')
	{
		$lvll = "43";
		$skill2 = "Captain";
		$lbr = "II CPT";
	}
	else if($skilll < '250000')
	{
		$lvll = "44";
		$skill2 = "Major";
		$lbr = "@ MAJ";
	}
	else if($skilll < '260000')
	{
		$lvll = "45";
		$skill2 = "Lieutenant Colonel";
		$lbr = "# LTC";
	}
	else if($skilll < '310000')
	{
		$lvll = "46";
		$skill2 = "Colonel";
		$lbr = "* COL";
	}
	else if($skilll < '360000')
	{
		$lvll = "47";
		$skill2 = "Brigadier General";
		$lbr = "** BG";
	}
	else if($skilll < '3')
	{
		$lvll = "48";
		$skill2 = "Major General";
		$lbr = "*** MG";
	}
	else if($skilll < '400000')
	{
		$lvll = "49";
		$skill2 = "Lieutenant General";
		$lbr = "**** LTG";
	}
	else if($skilll < '500000')
	{
		$lvll = "50";
		$skill2 = "General";
		$lbr = "***** GEN";
	}
	else if($skilll < '600000')
	{
		$lvll = "51";
		$skill2 = "General of the Army";
		$lbr = "$ GOA";
	}
	else if($skilll < '700000')
	{
		$lvll = "52";
		$skill2 = "Caesar";
		$lbr = "$$ Czar";
	}
	else if($skilll < '800000')
	{
		$lvll = "53";
		$skill2 = "King";
		$lbr = "$$$ King";
	}
	
	else if($skilll < '900000')
	{
		$lvll = "54";
		$skill2 = "Emperor";
		$lbr = "EmR";
	}
	
	else if($skilll < '1000000')
	{
		$lvll = "55";
		$skill2 = "Pharoah";
		$lbr = "$$$$ Ph";
	}	
	else if($skilll < '1100000')
	{
		$lvll = "56";
		$skill2 = "Pharoah II";
		$lbr = "$$$$ Ph II";
	}	
	else if($skilll < '1200000')
	{
		$lvll = "57";
		$skill2 = "Pharoah III";
		$lbr = "$$$$ Ph III";
	}	
	else if($skilll < '1300000')
	{
		$lvll = "58";
		$skill2 = "Pharoah IV";
		$lbr = "$$$$ Ph IV";
	}	
	else if($skilll < '1400000')
	{
		$lvll = "59";
		$skill2 = "Pharoah V";
		$lbr = "$$$$ Ph V";
	}
	else if($skilll < '1500000')
	{
		$lvll = "60";
		$skill2 = "Lord of Scilly";
		$lbr = "$$$$ LRS";
	}
	else if($skilll < '1600000')
	{
		$lvll = "61";
		$skill2 = "Lord of Skill I";
		$lbr = "$$$$ LRS I";
	}
	else if($skilll < '1700000')
	{
		$lvll = "62";
		$skill2 = "Lord of Skill II";
		$lbr = "$$$$ LRS II";
	}
	else if($skilll < '1750000')
	{
		$lvll = "63";
		$skill2 = "Lord of Skill III";
		$lbr = "$$$$ LRS III";
	}	
	else if($skilll < '1800000')
	{
		$lvll = "64";
		$skill2 = "Demi-God";
		$lbr = "$$$$$$ DemiGod";
	}
	else if($skilll < '2000000')
	{
		$lvll = "65";
		$skill2 = "God";
		$lbr = "$$$$$$$ God";
	}	
	else if($skilll < '5000000')
	{
		$lvll = "66";
		$skill2 = "God lvl 999";
		$lbr = "$$$$$$$ God lvl 999";
	}
	}
?>