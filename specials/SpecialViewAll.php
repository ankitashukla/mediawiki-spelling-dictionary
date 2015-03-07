<?php

class SpecialViewAll extends SpecialPage {

	public function __construct() {
		parent::__construct( 'ViewAll', 'spelladmin' );
	}

	public function execute( $sub ) {
		if ( !$this->userCanExecute( $this->getUser() ) ) {
			$this->displayRestrictionError();
			return;
		}
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'title-view-all' ) );
		$out->addWikiMsg( 'view-all-intro' );
		$out->addHTML ( AdminRights::displayAllWords() );
	}
}
