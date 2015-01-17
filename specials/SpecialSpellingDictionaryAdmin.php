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
		$tree = new SDTree();
		$browse_edit = new SDSection( $this->msg( 'sd-admin-browse-edit' )->text() );
		$viewall = SpecialPage::getTitleFor( 'ViewAll' );
		$browse_edit->addItem( SDItem::showPage($viewall, $this->msg( 'sd-admin-viewall' )->text() ));
		$viewByLang = SpecialPage::getTitleFor( 'ViewByLanguage' );
		$browse_edit->addItem( SDItem::showPage($viewByLang, $this->msg( 'sd-admin-view-by-lang' )->text() ));

		$tree->addSection( $browse_edit );
		return $tree;
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
		$out->addHTML( $admin_tree->toString() );
	}

}
