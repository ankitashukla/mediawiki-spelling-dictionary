<?php

class SpecialViewAll extends SpecialPage {

	public function __construct() {
		parent::__construct( 'ViewAll' );
	}

	public function execute( $sub ) {
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'title-special' ) );
		$out->addWikiMsg( 'intro-paragraph' );
	}
}
