<?php 
/* Used in content blocks layouts to generate tags, classes, ect... */

$cssMain = ['row'];
$cssCol = [];

if($justifyContent) array_push($cssMain,$justifyContent);

switch($layout){

	case 1:
		switch($layout){
			default: array_push($cssCol,'col-md-'.$colWidth); break;
		}		
	break;
	
	case 2:
		switch($layout){
			default: array_push($cssCol,'col-md-'.$colWidth); break;
		}
	break;

	case 3:
		switch($layout){
			default: array_push($cssCol,'col-md-'.$colWidth); break;
		}
	break;

	case 4:
		switch($layout){
			default:
				array_push($cssCol,'col-md-6');
				array_push($cssCol,'col-lg-'.$colWidth);
			break;
		}
	break;

	default:
		array_push($cssCol,'col-md-'.$colWidth);
	break;
}

array_push($cssCol,'border');

//$modx->setPlaceholder("layout".$layout.".start",'<div class="'.implode(" ",$cssMain).'">');
//$modx->setPlaceholder("layout".$layout.".end",'</div>');

$modx->setPlaceholder("css".$layout.".main",implode(" ",$cssMain));
$modx->setPlaceholder("css".$layout.".col",implode(" ",$cssCol));