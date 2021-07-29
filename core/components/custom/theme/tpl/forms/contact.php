<?php 

$modx->getService('lexicon','modLexicon');
$modx->lexicon->load('theme:default');

$modx->runSnippet('FormIt',[
   'hooks' => 'spam,csrfhelper_formit,email',
   'emailTpl' => 'contactForm_email',
   'emailTo' => 'uros.likar@tend.si',
   'emailFrom' => 'noreply@orgtend.si',
   'emailFromName' => 'Spletni obrazec',
   'emailReplyTo' => $modx->getPlaceholder('email'),
   'emailReplyToName' => $modx->getPlaceholder('name'),
   'emailSubject' => 'Kontaktni obrazec test',
   'validate' => 'nospam:blank,
      fullname:required,
      email:email:required,
      text:required:stripTags,
	',
	'csrfKey'=>'contact-form'
]);

if($modx->getPlaceholder('fi.error.nospam'))    	$o['errors'][] = 'nospam';
if($modx->getPlaceholder('fi.error.fullname')) 		$o['errors'][] = 'fullname';
if($modx->getPlaceholder('fi.error.email')) 		$o['errors'][] = 'email';
//if($modx->getPlaceholder('fi.error.text')) 			$o['errors'][] = 'text = '.$modx->lexicon('test');
if($modx->getPlaceholder('fi.error.text')) 			$o['errors'][] = 'text';
if($modx->getPlaceholder('fi.error.csrf_token')) 	$o['errors'][] = 'csrf token';

if($modx->getPlaceholder('fi.validation_error_message')) {
	$o['error'] = true;        	
	$o['post'][] = $_POST;
} else {
	$o['sent'] = true;
}

if($modx->getPlaceholder('fi.successMessage')) $o['sent'] = true;

return json_encode($o);