<?php
/*****************************************************/
/*****************************************************/
/**** !!!! NEVER EDIT THIS FILE INSIDE MODX !!!! ****/
/*****************************************************/
/*****************************************************/
$util = $modx->getService('utility','Utility',$modx->getOption('core_path').'components/custom/theme/',$scriptProperties);
if (!($util instanceof Utility)) return 'ERROR';


switch($modx->event->name) {
    
    case 'OnBeforeDocFormSave':
        $resource->set('alias', $util->clearAlias($resource->get('alias'))); // remove ščćž from string
    break;

    case 'OnHandleRequest':
    	if((isset($_GET['cache']) && $_GET['cache'] == 'clear') || (isset($_GET['no_cache']) && $_GET['no_cache'] == '1')) $modx->cacheManager->refresh(); // clear modx cache with ?cache=clear or ?no_cache=1
    break;

    case 'OnPageNotFound':
         // 10.8.2021 THIS NEEDS MORE TESTING BEFORE USING IT IN PRODUCTION !!  (Uroš L.)
         //$util->fixHomeRedirect();
    break;

    case 'OnBeforeManagerLogin':
        $util->trySSO($username, $password);
    break;

}