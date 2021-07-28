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

    public function getChunk($name,$properties = array()) {
        $chunk = null;
        
        $folder = '';
        if (strpos($name, '/') !== false) {
            $tmp = explode('/',$name);
            $name = end($tmp);
            array_pop($tmp);
            $folder = implode('/',$tmp).'/';
        }

        if (!isset($this->chunks[$name])) {
            $chunk = $this->modx->getObject('modChunk',array('name' => $name));
            if (empty($chunk) || !is_object($chunk)) {
                $chunk = $this->_getTplChunk($folder,$name);
                if ($chunk == false) return false;
            }
            $this->chunks[$name] = $chunk->getContent();
        } else {
            $o = $this->chunks[$name];
            $chunk = $this->modx->newObject('modChunk');
            $chunk->setContent($o);
        }
        $chunk->setCacheable(false);
        return $chunk->process($properties);
    }
    
    private function _getTplChunk($folder,$name,$postfix = '.chunk.tpl') {
        $chunk = false;
        $f = $this->config['chunksPath'].$folder.strtolower($name).$postfix;
        if (file_exists($f)) {
            $o = file_get_contents($f);
            $chunk = $this->modx->newObject('modChunk');
            $chunk->set('name',$name);
            $chunk->setContent($o);
        }
        return $chunk;
    }

    public function hello(){
        return 'Howdy world page class !';
    }

}
