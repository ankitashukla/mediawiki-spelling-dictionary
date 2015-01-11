<?php

class SpecialViewAll extends SpecialPage {

	public function __construct() {
		parent::__construct( 'ViewAll' );
	}

	public function execute( $sub ) {
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'title-view-all' ) );
		$out->addWikiMsg( 'intro-paragraph' );

		global $wgSpellingDictionaryDatabase;
		$dbr = wfGetDB( DB_SLAVE, array(), $wgSpellingDictionaryDatabase );
		$rows = $dbr->select(
			'spell_dict_word_list',
			'*',
			1,
			__METHOD__
		);
		$result = array();
		foreach ( $rows as $row ) {
			$out->addHTML ( $row->sd_word . " of language " . $row->sd_language . "<br>" );
		}
	}
}
