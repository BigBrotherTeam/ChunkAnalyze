<?php





$bitmask = 0;

for($y = 0; $y < 16; $y++){
	/*if($y === 12){
		continue;
	}*/
	$bitmask |= 0x01 << $y;
	$bin = base_convert($bitmask, 10, 2);
	while(strlen($bin) < 8){
		$bin = "0".$bin;
	}
	echo "test: ".$bin."\n";
	//$bitmask = ($bitmask >> $y) | 1 /*$bitmask | $test*/;
}


//$bitmask = 0xff;
echo "bitmask: ".$bitmask."\n";
echo "bitmask: ".bin2hex(chr($bitmask))."\n";

for($y = 0; $y < 16; $y++){

	echo "bitmask: ".$bin."\n";
	//echo "bitmask: ".bin2hex(chr(($bitmask >> $y)))."\n";
	if(($bitmask >> $y) & 1){
		echo $y." is selection\n";
	}
}


