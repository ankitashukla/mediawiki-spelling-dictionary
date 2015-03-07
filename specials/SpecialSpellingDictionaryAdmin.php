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
		parent::__construct( 'SpellingDictionaryAdmin', 'editinterface' );
	}

	public function initializeTree() {
		$tree = new SDTree();

		// SECTION: browse spellings
		$browse_edit = new SDSection( $this->msg( 'sd-admin-browse-edit' )->text() );

		//Item: Add new spellings -> redirect to SpecialDictionary
		$add_new = SpecialPage::getTitleFor( 'SpellingDictionary' );
		$browse_edit->addItem( SDItem::showPage( $add_new ,
								$this->msg( 'sd-admin-add-more-spellings' )->text() ));

		// Item: View All
		$viewall = SpecialPage::getTitleFor( 'ViewAll' );
		$browse_edit->addItem( SDItem::showPage( $viewall , 
								$this->msg( 'sd-admin-viewall' )->text() ));

		// Item: View By Language
		$viewByLang = SpecialPage::getTitleFor( 'ViewByLanguage' );
		$browse_edit->addItem( SDItem::showPage( $viewByLang,
								$this->msg( 'sd-admin-view-by-lang' )->text() ));

		$tree->addSection( $browse_edit );

		// SECTION: import and export
		$import_export = new SDSection( $this->msg( 'sd-admin-importexport' )->text() );
		$import_export->addItem( SDItem::customSpecialPage( 'Export' ) );
		$import_export->addItem( SDItem::customSpecialPage( 'Import' ) );
		$tree->addSection( $import_export );

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
