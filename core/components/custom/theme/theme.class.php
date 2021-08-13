<?php
class Theme {

    public function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;
    }

    public function hello(){
        return 'Howdy world page class !';
    }

}
