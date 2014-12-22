<?php
/**
 * SpellingDictionary Database Connection abstraction
 */
namespace SpellingDictionary;

class Database {
	/**
	 * Gets a database connection to the SpellingDictionary database
	 * @param int $type Either DB_SLAVE or DB_MASTER
	 * @return IDatabase
	 */
	public static function getConnection( $type ) {
		global $wgSpellingDictionaryDatabase;

		$lb = wfGetLB( $wgSpellingDictionaryDatabase );

		return $lb->getConnectionRef( $type, array(), $wgSpellingDictionaryDatabase );
	}

}
