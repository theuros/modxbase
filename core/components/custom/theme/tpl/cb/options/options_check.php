<?php
if(!$input) return;

foreach(explode(',',$input) as $v){
	$o[$v] = 1;
}

return $o;