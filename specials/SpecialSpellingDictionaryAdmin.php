<?php
/**
 * SpellingDictionaryAdmin SpecialPage for admins for SpellingDictionary extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialSpellingDictionaryAdmin extends SpecialPage {

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		parent::__construct( 'SpellingDictionaryAdmin' );
	}

	public function initializeTree() {
		$tree = new SpellingDictionary\SDTree();
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub: The subpage string argument (if any).
	 *  [[Special:SpellingDictionaryAdmin/subpage]].
	 */
	public function execute( $sub ) {

		$out = $this->getOutput();
		$this->setHeaders();
		$out->setPageTitle( $this->msg( 'title-special-admin' ) );
		$out->addWikiMsg( 'intro-paragraph-admin' );
		$admin_tree = $this->initializeTree();
	}

}
