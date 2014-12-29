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

	/**
	 * Shows the page to the user.
	 * @param string $sub: The subpage string argument (if any).
	 *  [[Special:SpellingDictionaryAdmin/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'title-special-admin' ) );
		$out->addWikiMsg( 'intro-paragraph-admin' );

		global $wgSpellingDictionaryDatabase;
		$dbr = wfGetDB( DB_SLAVE, array(), $wgSpellingDictionaryDatabase );
		$rows = $dbr->select(
			'spell_dict_word_list',
			'*',
			1,
			__METHOD__
		);
		// $result = array();
		foreach ( $rows as $row ) {
			$out->addHTML ( $row->sd_word . " of language " . $row->sd_language . "<br>" );

		}
		// return $result;
	}

}
