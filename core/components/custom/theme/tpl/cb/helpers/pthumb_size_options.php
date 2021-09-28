<?php

if($columns) $width = round($width / $columns);

$exp = explode(':',$ratio);

if(count($exp) < 2){
	$o = 'w='.$width;
} elseif($exp[0] == $exp[1]) {
	$o = 'w='.$width.'&h='.$width;
} else {
	$height = round(($exp[1] * $width) / $exp[0]);
	$o = 'w='.$width.'&h='.$height;
}

if($zc == 1) $o = $o.'&zc=1';

return $o;