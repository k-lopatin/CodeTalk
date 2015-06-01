<?php

class projectHelper {
	
	public static function createId(){
		
		$timeArr = self::timeToArr();

		$ch1 = chr( ord('a') + rand(0, 25) );
		$ch2 = chr( ord('a') + ($timeArr[0] + $timeArr[9] + $timeArr[1]) % 25  );
		$ch3 = chr( ord('a') + ($timeArr[2] + $timeArr[8] + $timeArr[3] + rand(0, 10) ) % 25  );
		$ch4 = chr( ord('a') + ($timeArr[4] + $timeArr[7] + $timeArr[5] + rand(0, 10) ) % 25  );
		$ch5 = chr( ord('a') + ($timeArr[6] + $timeArr[7] + $timeArr[8]) % 25  );
		$ch6 = chr( ord('a') + $timeArr[9]*2  );
		$ch7 = chr( ord('a') + rand(0, 25) );
		$ch8 = chr( ord('a') + ($timeArr[6] + $timeArr[7] + $timeArr[8] + $timeArr[9]) % 25 );
		$ch9 = chr( ord('a') + rand(0, 25) );
		$ch10 = chr( ord('a') + ( $timeArr[4] + $timeArr[5] + $timeArr[6] + $timeArr[7] + $timeArr[8] + $timeArr[9] - 10) %25 );
		$ch11 = chr( ord('a') + rand(0, 25) );

		return $ch1.$ch2.$ch3.$ch4.$ch5.$ch6.$ch7.$ch8.$ch9.$ch10.$ch11;

	}

	private static function timeToArr(){
		$time = time();
		$arr = [];
		$i = 9;
		while($time > 0){
			$arr[$i] = $time % 10;
			$time = intval( $time / 10 );
			$i--;
		}
		return $arr;
	}

}