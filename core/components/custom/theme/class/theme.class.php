<?php

class Page {

    public function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;
        $basePath = $this->modx->getOption('theme.core_path',$config,$this->modx->getOption('core_path').'components/tend/page/');
        $assetsUrl = $this->modx->getOption('theme.assets_url',$config,$this->modx->getOption('assets_url').'components/tend/page/');
        $this->config = array_merge(array(
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath,
            //'processorsPath' => $basePath.'processors/',
            'templatesPath' => $basePath.'templates/',
            'chunksPath' => $basePath.'elements/chunks/',
            //'jsUrl' => $assetsUrl.'js/',
            //'cssUrl' => $assetsUrl.'css/',
            'assetsUrl' => $assetsUrl,
            //'connectorUrl' => $assetsUrl.'connector.php',
        ),$config);
        $this->modx->addPackage('page',$this->config['modelPath']);
    }

    public function hello(){
        return 'Howdy world page class !';
    }

}
