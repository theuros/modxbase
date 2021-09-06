<?php

if($columns) $width = round($width / $columns);

$exp = explode(':',$ratio);

if(count($exp) < 2){
	return 'w='.$width;
} elseif($exp[0] == $exp[1]) {
	return 'w='.$width.'&h='.$width;
} else {
	$height = round(($exp[1] * $width) / $exp[0]);
	return 'w='.$width.'&h='.$height;
}
