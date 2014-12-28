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
