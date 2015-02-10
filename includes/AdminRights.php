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
		$words = '<b>Spelling &nbsp;&nbsp;&nbsp;&nbsp;Language</b><br>';
		foreach ( $rows as $row ) {
			$words .= "<span class = \"spelling\">".$row->sd_word .
			"</span><span class = \"language\">" . $row->sd_language . "</span><br>";
		}
		return $words;
	}

	public function displayByLanguage( $language ) {
		global $wgSpellingDictionaryDatabase;
		$dbr = wfGetDB( DB_SLAVE, array(), $wgSpellingDictionaryDatabase );
		$rows = $dbr->select(
			'spell_dict_word_list',
			'*',
			array(
				'sd_language' => $language,
			),
			__METHOD__
		);
		$result = array();
		$words = "";
		foreach ( $rows as $row ) {
			$words .= $row->sd_word . " of language " . $row->sd_language;
			$words .= "\t<a href=''>Edit</a> \t<a href='' id = 'deleteSpelling'>Delete</a> <br>";
		}
		return $words;
	}

	public function deleteSpelling( $spelling ) {
		global $wgSpellingDictionaryDatabase;
		$dbr = wfGetDB( DB_SLAVE, array(), $wgSpellingDictionaryDatabase );
		$rows = $dbr->delete(
			'spell_dict_word_list',
			array(
				'sd_word' => $spelling,
			),
			__METHOD__
		);
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
		$text .= "	<p>\n";
		foreach ( $this->items as $i => $item ) {
			if ( $i > 0 )
				$text .= " ·\n";
			$text .= '		' . $item->link;
		}
		return $text . "\n	</p>\n";
	}

}

/**
 * A single 'item' in the Spelling Dictionary Admin Links page
 */
class SDItem {
	public $link;

	function showPage( $page_title, $desc = null, $query = array() ) {
		$item = new SDItem();
		$item->link = Linker::link( $page_title, $desc );
		return $item;
	}

	function customSpecialPage( $page_title ) {
		$item = new SDItem();
		$page = SpecialPageFactory::getPage( $page_title );
		$item->link = Linker::link( $page->getTitle(), $page->getDescription() );
		return $item;
	}

}
