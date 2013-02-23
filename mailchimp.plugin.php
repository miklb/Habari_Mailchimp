<?php if ( !defined( 'HABARI_PATH' ) ) { die( 'No direct access' ); }

class HabariMC extends Plugin
{
	public function theme_mailchimp_form ($theme) {

		$form = new FormUI ('mailchimp');

		//Create the First Name Field
		$form->append(
		'text',
		'mc_fname',
		'null:null',
		_t('First Name <span class="required">*Required</span>'),
		'formcontrol_text'
		)->add_validator( 'validate_required', _t('First name is required.') )
		->id = 'mc_fname';
		$form->mc_fname->tabindex = 1;
		$form->mc_fname->value = $mc_fname;

		//Create the Last Name Field
		$form->append(
		'text',
		'mc_lname',
		'null:null',
		_t('Last Name <span class="required">*Required</span>'),
		'formcontrol_text'
		)->add_validator( 'validate_required', _t('Last name is required.') )
		->id = 'mc_lname';
		$form->mc_lname->tabindex = 2;
		$form->mc_lname->value = $mc_lname;

		//Create the Email Field
		$form->append(
		'text',
		'mc_email',
		'null:null',
		_t( 'Email <span class="required">*Required</span>' ),
		'formcontrol_text'
		)->add_validator( 'validate_email', _t( 'Your Email must be a valid address.' ) )
		->id = 'mc_email';
		$form->mc_email->tabindex = 3;
		$form->mc_email->value = $mc_email;

		$form->append(
		'text',
		'mc_phone',
		'null:null',
		_t('Phone Number'),
		'formcontrol_text'
		)->id = 'mc_phone';
		$form->mc_phone->tabindex = 4;
		$form->mc_phone->value = $mc_phone;

		// Create the Submit button
		$form->append( 'submit', 'mc_submit', _t( 'Submit' ), 'formcontrol_submit' );
		$form->cf_submit->tabindex = 5;

		// Set up form processing
		$form->on_success( array($this, 'process_mailchimp') );
		// Return the form object
		return $form->get();


	}

	function process_mailchimp ($form) {

		include_once 'MCAPI.class.php';

		$api = new MCAPI ('1298434a4273ac7b51a74dbcecb130f1-us6');

		$list_id = '54affe386b';

		$merge_vars = array(
			'FNAME' => $form->mc_fname->value,
			'LNAME' => $form->mc_lname->value,
			'MMERGE3' => $form->mc_phone->value,
			);

		$retval = $api->listSubscribe( $list_id, $form->mc_email->value, $merge_vars );

		if ($api->errorCode) {
			echo "Unable to load listSubscribe()!\n";
			echo "\tCode=".$api->errorCode."\n";
			echo "\tMsg=".$api->errorMessage."\n";
			echo $mc_fname;
		} else {
    		echo "Subscribed - look for the confirmation email!\n";
		};
	}
	
}

?>