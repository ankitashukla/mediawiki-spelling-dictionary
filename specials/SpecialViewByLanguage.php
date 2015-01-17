<?php

class SpecialViewByLanguage extends SpecialPage {

	public function __construct() {
		parent::__construct( 'ViewByLanguage' );
	}

	public function execute( $sub ) {
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'title-view-by-language' ) );
		$out->addWikiMsg( 'view-by-lang-intro' );
	}
}
