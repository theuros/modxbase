<?php
$page = $modx->getService('page','Page',$modx->getOption('core_path').'components/tend/page/',$scriptProperties);
if (!($page instanceof Page)) return 'ERROR';

$o = 'TO DO';

return $o;

/*


switch($_REQUEST['action']){
	
	case 'contactForm':
		
		if($modx->getOption('emailsender'))	{
			$modx->runSnippet('FormIt', [
				'hooks' => 'spam,csrfhelper_formit,email,spamCheck',
				'csrfKey' => 'contact-form',
				'emailTpl' => 'XXX',
				'emailFrom' => $modx->getOption('emailsender'),
				'emailTo' => 'org.tend@gmail.com',
				'validationErrorMessage' => '"error":true',
				'successMessage' => '"sent":true',
				'validate' => 'nospam:blank,
			      fullname:required,
			      email:email:required,
			      text:required:stripTags'
			]);

			$o = '{';
			$o .= $modx->getPlaceholder('fi.validation_error_message');
			$o .= $modx->getPlaceholder('fi.successMessage');
			if($modx->getPlaceholder('fi.error.csrf_token')) $o .= ',"csrf":"invalid"';
			$o .= '}';
		} else {
			$o = '{"error":"Undefined email sender"}';
			$modx->log(modX::LOG_LEVEL_ERROR, 'Ajax snippet: System setting "emailsender" not defined');
		}
		return $o;

	break;

	default: 
		return '{"message":"No action defined"}';
	break;

}
*/