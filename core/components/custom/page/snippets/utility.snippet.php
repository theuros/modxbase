<?php
$util = $modx->getService('utility','Utility',$modx->getOption('core_path').'components/tend/page/',$scriptProperties);
if (!($util instanceof Utility)) return 'ERROR';

return "test util: ".$util->hello();