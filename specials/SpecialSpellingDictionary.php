<?php
/**
 * SpellingDictionary SpecialPage for SpellingDictionary extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialSpellingDictionary extends SpecialPage {

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		// A special page should at least have a name.
		// We do this by calling the parent class (the SpecialPage class)
		// constructor method with the name as first and only parameter.
		parent::__construct( 'SpellingDictionary' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub: The subpage string argument (if any).
	 *  [[Special:SpellingDictionary/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();

		$out->setPageTitle( $this->msg( 'title-special' ) );

		// Parses message from .i18n.php as wikitext and adds it to the
		// page output.
		$out->addWikiMsg( 'intro-paragraph' );
		$formDescriptor = array(
			'word' => array(
				'type' => 'text',
				'label-message' => 'spell-dict-word',
				'required' => true,
			),
			'language' => array(
				'type' => 'select',
				'label-message' => 'spell-dict-language',
				'required' => true,
				'options' => array(
					'English' => 'en',
					'French' => 'fr',
					'Hindi' => 'hi'
				),
			)
		);

		$form = HTMLForm::factory( 'vform', $formDescriptor, $this->getContext(), 'add-word' );
		$form->setSubmitText( wfMessage( 'add-word-form-submit' )->text() );
		//Callback function
		$form->setSubmitCallback( array( 'SpecialSpellingDictionary', 'store' ) );

		$form->show();

	}

	static function store( $formData ) {
		Words::addWord( $formData );
	}

}
