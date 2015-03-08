<?php
/**
 * Autoload definitions.
 *
 * @file
 * @copyright See AUTHORS.txt
 * @license GPL-2.0+
 */

global $wgAutoloadClasses;
$dir = __DIR__;

$wgAutoloadClasses += array(
	'Words' => "$dir/includes/Words.php",
	'AdminRights' => "$dir/includes/AdminRights.php",
	'SpellingDictionaryHooks' => "$dir/SpellingDictionary.hooks.php",
	'SpecialSpellingDictionary' => "$dir/specials/SpecialSpellingDictionary.php",
	'SpecialSpellingDictionaryAdmin' => "$dir/specials/SpecialSpellingDictionaryAdmin.php",
	'SpecialViewAll' => "$dir/specials/SpecialViewAll.php",
	'SpecialViewByLanguage' => "$dir/specials/SpecialViewByLanguage.php",
	'ApiQuerySpellingDictionary' => "$dir/api/ApiQuerySpellingDictionary.php",
	'SDTree' => "$dir/includes/AdminRights.php",
	'SDSection' => "$dir/includes/AdminRights.php",
	'SDItem' => "$dir/includes/AdminRights.php",
);
