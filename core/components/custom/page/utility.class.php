<?php

class Utility {

    public function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;
    }

    public function hello(){
        return 'Howdy world utility class !!!!!!!!!!';
    }

    public function clearAlias($string){
        return str_replace(
        	['š','č','ž','ć','đ'],
        	['s','c','z','c','d'],
        	$string
        );
    }

    // FIX XRouting homepage without "/" -> Redirect context subfolder from "something" to "something/"
    public function fixHomeRedirect(){
    	
    	$check = $this->modx->getObject('modContextSetting',[
            'key'=>'base_url',
            'value:LIKE'=>'%'.$_GET[$this->modx->getOption('request_param_alias')].'%'
        ]);
        
        $siteStart = $this->modx->getObject('modContextSetting',[
            'key' => 'site_start',
            'context_key' => $check->get('context_key')
        ]);
        
        
        if($this->modx->getObject('modResource',$siteStart->get('value'))->get('published') == 1) 
        	$this->modx->sendRedirect($this->modx->makeUrl($siteStart->get('value')),['responseCode' => 'HTTP/1.1 301 Moved Permanently']);

    }

}
