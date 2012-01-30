<?php
// Determine if the system supports 64-bit integers.
define('LARGE_INT', defined('PHP_INT_MAX') && strlen(PHP_INT_MAX.'') > 14);

function BigVal($num) {
	return LARGE_INT ? intval($num) : floatval($num);
}

function BigAdd($a, $b) {
	return BigVal($a) + BigVal($b);
}

function BigComp($a, $b) {
	return BigVal($a) - BigVal($b);
}

function BinarySearch($list, $needle, $comparator) {
	$low = 0;
	$high = count($list) - 1;
	$comp = -1;
	$mid = 0;
	
	while ($low <= $high) {
		$mid = floor(($low + $high) / 2);
		
		$comp = call_user_func($comparator, $list[$mid], $needle);
		
		if ($comp < 0) {
			$high = $mid - 1;
		}
		else if ($comp > 0) {
			$low = $mid + 1;
		}
		else {
			return $mid;
		}
	}
	
	if ($comp < 0) return -1 - $mid;
	if ($comp > 0) return -2 - $mid;
}
 ?>