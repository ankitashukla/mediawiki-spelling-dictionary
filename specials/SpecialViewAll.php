<?php

class SpecialViewAll extends SpecialPage {

	public function __construct() {
		parent::__construct( 'ViewAll' );
	}

	public function execute( $sub ) {
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'title-view-all' ) );
		$out->addWikiMsg( 'intro-paragraph' );
		$out->addHTML ( AdminRights::displayAllWords() );
	}
}
