<?php

class Utility {

    public function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;
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
        
        if($check){ //if new route is valid

            $siteStart = $this->modx->getObject('modContextSetting',[
                'key' => 'site_start',
                'context_key' => $check->get('context_key')
            ]);
            
            
            if($this->modx->getObject('modResource',$siteStart->get('value'))->get('published') == 1) 
                $this->modx->sendRedirect($this->modx->makeUrl($siteStart->get('value')),['responseCode' => 'HTTP/1.1 301 Moved Permanently']);
        }
    }

    private function getDataFromAPI($username, $password){
  
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

    public function trySSO($username, $password){
        $existingUser = $this->modx->getObject('modUser', ['username' => $username]);
        if (!$existingUser) {   //if user doesn't exist yet, try to create via API
            $response = $this->getDataFromAPI($username, $password);
            if ($response['success']) {
                $usr = $this->modx->newObject('modUser');
                $usr->set('username', $username);
                $usr->set('password', $password);

                $usr->setSudo(true);
                $prof = $this->modx->newObject("modUserProfile");
                $prof->set('email', $response['user']['email']);
                $prof->set('fullname', $response['user']['fullname']);
                $usr->addOne($prof);
                $usr->save();
                
                //send security email 
                $siteName = $this->modx->getOption('site_name');
                $siteUrl = $this->modx->getOption('site_url');
                $email = $response['user']['email'];
                $message = "
                    Ime strani: $siteName <br/>
                    Url: $siteUrl <br/>
                    Uporabnik: $username <br/>
                    E-naslov: $email <br/>
                ";
                $this->modx->getService('mail', 'mail.modPHPMailer');
                $this->modx->mail->set(modMail::MAIL_BODY,$message);
                $this->modx->mail->set(modMail::MAIL_FROM,'noreply@orgtend.si');
                $this->modx->mail->set(modMail::MAIL_FROM_NAME,'Tend SSO');
                $this->modx->mail->set(modMail::MAIL_SUBJECT,"$siteName - Nov uporabnik");
                $this->modx->mail->address('to', $email);
                $this->modx->mail->address('to','3e28a374.tend.si@emea.teams.ms'); //sso chat in dev teams
                $this->modx->mail->setHTML(true);
                if (!$this->modx->mail->send()) {
                    $this->modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$this->modx->mail->mailer->ErrorInfo);
                }
                $this->modx->mail->reset();
                //end
                
            }
        } else if ($existingUser->get('sudo') == 1) {   //if user exists and is sudo, check for valid auth
            $tryExternalLogin = $this->getDataFromAPI($username, $password);
            if ($tryExternalLogin['success'] == 1) {
                $validLocalLogin = $existingUser->passwordMatches($password);
                if (!$validLocalLogin) {
                    $user = $this->modx->getObject('modUser', ['username' => $username]);
                    $user->set('password', $password);
                    $user->save();
                }
            }
        }
        return; //else classic login - don't do anything
    }



}
