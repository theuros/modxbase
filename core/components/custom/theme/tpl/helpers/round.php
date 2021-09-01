<?php

switch($type){
	case 'up': 		case 'ceil': 	return ceil($input); break;
	case 'down': 	case 'floor': 	return floor($input); break;
	default: 						return round($input);
}