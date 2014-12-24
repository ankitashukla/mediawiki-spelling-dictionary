<?php

namespace SpellingDictionary;

class AdminRights {
	public function displayAllWords() {
		$dbr = Database::getConnection( DB_SLAVE );
		$rows = $dbr->select(
			'spelling_dictionary',
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
		$dbr = Database::getConnection( DB_SLAVE );
		$rows = $dbr->select(
			'spelling_dictionary',
			'*',
			array(
				'language' => $language;
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