<?php

namespace SpellingDictionary;

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

	function addSection( $section ) {
		$this->sections[] = $section;
		return;
	}

}

/**
 * A single section of the Admin Links 'tree', composed of a header and rows
 */
class SDSection {
}

/**
 * A single 'item' in the Spelling Dictionary Admin Links page
 */
class SDItem {
}
