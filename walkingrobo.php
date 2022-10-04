<?php


$x = $argv[1];//5
$y = $argv[2];//2

if(!is_numeric($x) || !is_numeric($y)){
	die("\nCo-ordinates must be Integer\n");
}

$d = $argv[3];//SOUTH
//echo "\nD:".$d."\n";

if($d != 'NORTH' && $d != 'WEST' && $d != 'SOUTH' && $d != 'EAST'){
	 die("\nWrong Direction\n");
}

const NORTH = 1;
const WEST = 2;
const SOUTH = 3;
const EAST = 4;

$direction = [ 1 => "North", 2 => "WEST", 3 => "South", 4 => "East"];

const MULTIPLIER1 = 1;
const MULTIPLIER2 = 1;
const MULTIPLIER3 = -1;
const MULTIPLIER4 = -1;


$presentdirection = constant($d);//3
//echo $presentdirection."\n";

$s = $argv[4];//RW2LW4R

for($i = 0; $i < strlen($s); $i++ ){

	if($s[$i]=='R'){
		if($presentdirection == 4){
				$presentdirection = 1;
				//echo "\nD:".$direction[$presentdirection]."- ".$presentdirection."\n";
		} 
		else {
			$presentdirection++;//4
			//echo "\nD:".$direction[$presentdirection]."- ".$presentdirection."\n";
		}
	}
	elseif ($s[$i]=='L') {
		if($presentdirection == 1){
                        $presentdirection = 4;
                        //echo "\nD:".$direction[$presentdirection]."- ".$presentdirection."\n";
                } else {
                        $presentdirection--;
                       // echo "\nD:".$direction[$presentdirection]."- ".$presentdirection."\n";
                }
	}
	elseif ($s[$i]=='W'){
		if($presentdirection % 2==0){
			if(is_numeric($s[$i+1])){
				
				$x += ($s[$i+1] * constant("MULTIPLIER".$presentdirection) );

				// echo "\nX: ".$x;
				// echo "\n";
			}
			else{
				$x += 0;
			}
		} else {
			if(is_numeric($s[$i+1])){
				
				$y += ($s[$i+1] * constant("MULTIPLIER".$presentdirection) );
				
				// echo "\nY: ".$y;
				// echo "\n"; //-2
			}
			else{
				$y += 0;
			}
		}
			              
	}
	elseif(is_numeric($s[$i])){
		if(is_numeric($s[$i+1])){
			echo "\nNumber should be associated with 'W' ranging from 0 - 9\n";
		}

	} 
	else {
		echo "\nProvided char '".$s[$i]."' is not valid\n";
	}
}

echo "\nWalking Robo Direction X: ".$x.", Y: ".$y.", D: ".$direction[$presentdirection]."\n";

?>