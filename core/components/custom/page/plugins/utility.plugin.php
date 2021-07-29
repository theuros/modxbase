<?php

$util = $modx->getService('utility','Utility',$modx->getOption('core_path').'components/tend/page/',$scriptProperties);
if (!($util instanceof Utility)) return 'ERROR';

$eventName = $modx->event->name;
switch($eventName) {
    
    case 'OnBeforeDocFormSave':
        $resource->set('alias', $util->clearAlias($resource->get('alias'))); // remove ščćž from string
    break;

    case 'OnHandleRequest':
    	if((isset($_GET['cache']) && $_GET['cache'] == 'clear') || (isset($_GET['no_cache']) && $_GET['no_cache'] == '1')) $modx->cacheManager->refresh(); // clear modx cache with ?cache=clear or ?no_cache=1
    break;

    case 'OnPageNotFound':
        // $util->fixHomeRedirect(); // ne dela, vrže 500 error če prideš na vsebino katera nima permissionov
    break;

}