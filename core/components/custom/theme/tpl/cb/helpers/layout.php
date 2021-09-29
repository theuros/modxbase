<?php 
/* Used in content blocks layouts to generate tags, classes, ect... */

$cssMain = ['row'];
$cssCol = [];

if($justifyContent) array_push($cssMain,$justifyContent);

array_push($cssSub,'col-'.$colWidth);




$modx->setPlaceholder("css.main",implode(" ",$cssMain));
$modx->setPlaceholder("css.col",implode(" ",$cssCol));