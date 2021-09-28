<?php

/* 
Converts comma separated oprions string to array, so you can check if inidividual option exist with fenom.
Example in fenom:
var $opt = @FILE this file | snippet : ['input' => $options]
if $opt.nocrop { ... }
if $opt.aoe { ... }
*/

if(!$input) return;

foreach(explode(',',$input) as $v){
	$o[$v] = 1;
}

return $o;