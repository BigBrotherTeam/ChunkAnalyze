<?php

include(__DIR__."/Binary.php");

$data = file_get_contents(__DIR__."/chunk.dat");
$offset = 0;

$x = Binary::readInt(substr($data, $offset, 4));
$offset += 4;
echo "x: ".$x."\n";


$z = Binary::readInt(substr($data, $offset, 4));
$offset += 4;
echo "z: ".$z."\n";


$GroundUp = Binary::readByte(substr($data, $offset, 1));
$offset += 1;
echo "GroundUp: ".$GroundUp."\n";


$bitmask = Binary::readVarInt($data, $offset);
echo "bitmask: ".$bitmask."\n";
echo "bitmask: ".bin2hex(chr($bitmask))."\n";

$size = Binary::readVarInt($data, $offset);
echo "size: ".$size."\n";

echo "offset: 0x".dechex($offset)."\n";

for($y = 0; $y < 16; $y++){
	if($y !== 1){
		continue;
	}
	if(!(($bitmask >> $y) & 1)){
		continue;
	}
	echo $y." is selection\n";


	$bitsperblock[$y] = Binary::readByte(substr($data, $offset, 1), false);
	$offset += 1;
	echo "bitsperblock: ".$bitsperblock[$y]."\n";


	$palettelength[$y] = Binary::readVarInt($data, $offset);
	echo "palettelength: ".$palettelength[$y]."\n";
	$palette[$y] = [];
	for($i = 0; $i < $palettelength[$y]; $i++){
		$palette[$y][] = Binary::readVarInt($data, $offset);
	}
	var_dump($palette[$y]);


	/*echo "offset: ".$offset."\n";
	echo "offset: ".bin2hex(chr($offset))."\n";*/

	$dataarraylength[$y] = Binary::readVarInt($data, $offset);
	echo "dataarraylength: ".$dataarraylength[$y]."\n";

	//echo "offset: ".$offset."\n";
	echo "offset: 0x".dechex($offset)."\n";



	/*$blockdata[$y] = substr($data, $offset, $dataarraylength[$y] * 8);

	$blocks[$y] = [];
	$test = [];*/

	echo dechex(substr($data, $offset, 1))."\n";


	$bin = base_convert(ord(substr($data, $offset, 1)), 10, 2);
	while(strlen($bin) < 8){
		$bin = "0".$bin;
	}
	echo "test: ".$bin."\n";

	/*for($i = 0; $i < 4096; $i++){
		$block = 0;
		//$bitsperblock[$y]
		/*for($bit_offset = 0; $bit_offset < ; $bit_offset++){ 
			# code...
		}*/

		//echo bin2hex(substr($blockdata, floor($bit_offset / 8), 1))."\n";
		/*for($bit_offset = $i * $bitsperblock[$y]; $bit_offset < ($i + 1) * $bitsperblock[$y]; $bit_offset++){
			$bit = 1 & (substr($blockdata[$y], floor($bit_offset / 8), 1) >> (7 - ($bit_offset % 8)));
			$block = ($block << 1) | $bit;
		}*//*
		if(($key = array_search($block, $test)) === false){
			$test[] = $block;
		}
		if($palettelength[$y] !== 0){
			$block = $palette[$y][$block];
		}else{

		}
		$blocks[$y][$i] = $block;
		//echo $block."\n";
	}*/

	//var_dump($test);

	//var_dump($blocks[$y]);
}




//$bak = $offset;


/*for($i = 0; $i < $dataarraylength; $i++){
	$dataarray[] = Binary::readLong(substr($data, $offset, 8));
	$offset += 8;
}
var_dump($dataarray);
*/
//echo $offset - $bak;

/*echo "offset: ".$offset."\n";
echo "offset: ".dechex($offset)."\n";*/

$blocklight = substr($data, $offset, 2048);
$offset += 2048;

$skylight = substr($data, $offset, 2048);
$offset += 2048;














/*$size = Binary::readVarInt($data, $offset);
echo "size: ".$size."\n";



$bitsperblock = Binary::readByte(substr($data, $offset, 1), false);
$offset += 1;
echo "bitsperblock: ".$bitsperblock."\n";


$palettelength = Binary::readVarInt($data, $offset);
echo "palettelength: ".$palettelength."\n";
$palette = [];
for($i = 0; $i < $palettelength; $i++){
	$palette[] = Binary::readVarInt($data, $offset);
}
var_dump($palette);


/*echo "offset: ".$offset."\n";
echo "offset: ".bin2hex(chr($offset))."\n";*/
/*
$dataarraylength = Binary::readVarInt($data, $offset);
echo "dataarraylength: ".$dataarraylength."\n";

echo "offset: ".$offset."\n";
echo "offset: ".dechex($offset)."\n";

$blockdata = substr($data, $offset, $dataarraylength * 8);

$blocks = [];

for($i = 0; $i < 4096; $i++){
	$block = 0;


	//echo bin2hex(substr($blockdata, floor($bit_offset / 8), 1))."\n";
	for($bit_offset = $i * $bitsperblock; $bit_offset < ($i + 1) * $bitsperblock; $bit_offset++){
		$bit = 1 & (substr($blockdata, floor($bit_offset / 8), 1) >> (7 - ($bit_offset % 8)));
		$block = ($block << 1) | $bit;
	}
	if($palettelength !== 0){
		$block = $palette[$block];
	}else{

	}
	$blocks[$i] = $block;
	//echo $block."\n";
}

var_dump($blocks);

    /*for i in range(4096):
        block = 0
       
        for bit_offset in range(i * block_bits, (i + 1) * block_bits):
            bit = 1 & (data[bit_offset // 8] >> (7 - (bit_offset % 8)))
            block = (block << 1) | bit
        if uses_palette:  # convert to global palette
            try:
                block = palette[block]
            except KeyError:
                results['unusual']['%s (key)' % block].append(i)
                continue  # next block
            if block < 0:
                results['unusual']['%s (val)' % block].append(i)
        results['blocks'][i] = block

    return results*//*


$bak = $offset;


/*for($i = 0; $i < $dataarraylength; $i++){
	$dataarray[] = Binary::readLong(substr($data, $offset, 8));
	$offset += 8;
}
var_dump($dataarray);/*
*/
/*echo $offset - $bak;

/*echo "offset: ".$offset."\n";
echo "offset: ".dechex($offset)."\n";*//*

$blocklight = substr($data, $offset, 2048);
$offset += 2048;

$skylight = substr($data, $offset, 2048);
$offset += 2048;


echo "offset: ".$offset."\n";
echo "offset: ".dechex($offset)."\n";

$bitsperblock = Binary::readByte(substr($data, $offset, 1), false);
$offset += 1;
echo "bitsperblock: ".$bitsperblock."\n";*/