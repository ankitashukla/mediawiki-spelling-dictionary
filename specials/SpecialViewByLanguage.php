<?php

class SpecialViewByLanguage extends SpecialPage {

	public function __construct() {
		parent::__construct( 'ViewByLanguage', 'spelladmin' );
	}

	public function execute( $sub ) {
		if ( !$this->userCanExecute( $this->getUser() ) ) {
			$this->displayRestrictionError();
			return;
		}
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'title-view-by-language' ) );
		$out->addWikiMsg( 'view-by-lang-intro' );
		$formDescriptor = array(
			'language' => array(
				'type' => 'select',
				'label-message' => 'sd-admin-select-language',
				'required' => true,
				'options' => array(
					'English' => 'en',
					'French' => 'fr',
					'Hindi' => 'hi'
				),
			)
			);
		$form = HTMLForm::factory( 'vform', $formDescriptor, $this->getContext() );
		$form->setSubmitText( wfMessage( 'sd-admin-view-selected-language' )->text() );
		//Callback function
		$form->setSubmitCallback( array( 'SpecialViewByLanguage', 'showSpellings' ) );

		$form->show();
	}

	public function showSpellings( $formData ) {
		$language = $formData['language'];
		$out = $this->getOutput();
		$out->addHTML ( AdminRights::displayByLanguage( $language ) );
	}
}
