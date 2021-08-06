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

    private function getDataFromAPI($username, $password){
        //global $modx;
        $url = $this->modx->getOption('sso_server');
        $key = $this->modx->getOption('sso_key');
        $encryptedKey = sha1($key) . md5($key);
        $data = ['username' => $username, 'password' => $password];

        //encryption
        $hash_len = openssl_cipher_iv_length('AES-256-CBC');
        $hash = openssl_random_pseudo_bytes($hash_len);
        $encrypted = openssl_encrypt(
            json_encode($data),
            'AES-256-CBC',
            $encryptedKey,
            0,
            $hash
        );

        $encryptedData = json_encode(['crypt' => $encrypted, 'hash' => bin2hex($hash)]);

        //send to server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['hashed' => $encryptedData]);
        $result = curl_exec($ch);
        
        curl_close($ch);

        $resultObj = json_decode($result, true);

        if ($resultObj['crypt']) {
            //decrypt recieved data
            $json = openssl_decrypt(
                $resultObj['crypt'],
                'AES-256-CBC',
                $encryptedKey,
                0,
                hex2bin($resultObj['hash'])
            );
            return json_decode($json, true);
        }
        return false;
    }



}
