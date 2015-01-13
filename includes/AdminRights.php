<?php

// namespace SpellingDictionary;

class AdminRights {
	public function displayAllWords() {
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
			$result[] = AdminRights::newFromRow( $row );
		}
		return $result;
	}

	public function displayByLanguage( $language ) {
		global $wgSpellingDictionaryDatabase;
		$dbr = wfGetDB( DB_SLAVE, array(), $wgSpellingDictionaryDatabase );
		$rows = $dbr->select(
			'spell_dict_word_list',
			'*',
			array(
				'language' => $language,
			),
			__METHOD__
		);
		$result = array();
		foreach ( $rows as $row ) {
			$result[] = AdminRights::newFromRow( $row );
		}
		return $result;
	}
}

/**
 * The structure of the page would be like a tree where the 
 * Tree contains sections.
 * Every section will have items (which will be possibly links to other pages)
 */

// The 'tree' that holds all the sections and links for the Admin page
class SDTree {

	public $sections;

	function __construct() {
		$this->sections = array();
	}

	function addSection( $section ) {
		$this->sections[] = $section;
		return;
	}

	function toString() {
		$text = "";
		foreach ( $this->sections as $section ) {
			$text .= $section->toString();
		}
		return $text;
	}
}

/**
 * A single section of the Admin Links 'tree', composed of a header and rows
 */
class SDSection {

	public $header;
	public $items;

	function __construct( $header ) {
		$this->header = $header;
		$this->items = array();
	}

	function addItem( $item ) {
		$this->items[] = $item;
		return;
	}

	function toString() {
		$text = '	<h2 class="mw-specialpagesgroup">' . $this->header . "</h2>\n";
		foreach ( $this->items as $item ) {
			$text .= $item->text;
		}
		return $text;
	}

}

/**
 * A single 'item' in the Spelling Dictionary Admin Links page
 */
class SDItem {
	public $link;

	function showPage( $page_title, $desc = null, $query = array() ) {
		$item = new SDItem();
		$item->link = Linker::link( $page_title ,$desc, array(), $query );
		return $item;
	}

}
