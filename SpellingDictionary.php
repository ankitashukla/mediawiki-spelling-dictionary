<?php
/**
 * SpellingDictionary extension
 * For more info see mediawiki.org/wiki/Extension:SpellingDictionary
 *
 * @author Ankita Shukla
 *
 * To mention the file version in the documentation:
 * @version 0.1.0
 *
 * The license governing the extension code:
 * @license GNU General Public Licence 2.0 or later
 */

/**
 * MediaWiki has several global variables which can be reused or even altered
 * by your extension. The very first one is the $wgExtensionCredits which will
 * expose to MediaWiki metadata about your extension. For additional
 * documentation, see its documentation block in includes/DefaultSettings.php
 */
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'SpellingDictionary',
	'author' => array(
		'Ankita Shukla'
	),
	'version'  => '0.1.0',
	//Delete this url and uncomment the next one when the extension goes live on the core page.
	'url' => 'https://www.mediawiki.org/wiki/User:Ankitashukla/Extension:SpellingDictionary',
	//'url' => 'https://www.mediawiki.org/wiki/Extension:SpellingDictionary',
	'descriptionmsg' => 'desc',
);

// Setup

$GLOBALS['wgGroupPermissions']['sysop']['spelladmin'] = true;
$GLOBALS['wgAvailableRights'][] = 'spelladmin';


$dir = __DIR__;

require_once "$dir/Resources.php";
require_once "$dir/Autoload.php";


// Globals for this extension
$GLOBALS['wgSpellingDictionaryDatabase'] = false;

// Register files
// MediaWiki need to know which PHP files contains your class. It has a
// registering mecanism to append to the internal autoloader. Simply use
// $wgAutoLoadClasses as below:


$GLOBALS['wgMessagesDirs']['SpellingDictionary'] = __DIR__ . '/i18n';
$GLOBALS['wgExtensionMessagesFiles']['SpellingDictionaryAlias'] =
	$dir . '/SpellingDictionary.i18n.alias.php';
$GLOBALS['wgExtensionMessagesFiles']['SpellingDictionaryMagic'] =
	$dir . '/SpellingDictionary.i18n.magic.php';

$GLOBALS['wgAPIListModules']['example'] = 'ApiQuerySpellingDictionary';

// Register hooks
// See also http://www.mediawiki.org/wiki/Manual:Hooks
$GLOBALS['wgHooks']['BeforePageDisplay'][] = 'SpellingDictionaryHooks::onBeforePageDisplay';
$GLOBALS['wgHooks']['ResourceLoaderGetConfigVars'][] =
	'SpellingDictionaryHooks::onResourceLoaderGetConfigVars';
$GLOBALS['wgHooks']['ParserFirstCallInit'][] = 'SpellingDictionaryHooks::onParserFirstCallInit';
$GLOBALS['wgHooks']['MagicWordwgVariableIDs'][] = 'SpellingDictionaryHooks::onRegisterMagicWords';
$GLOBALS['wgHooks']['ParserGetVariableValueSwitch'][] =
	'SpellingDictionaryHooks::onParserGetVariableValueSwitch';
# Schema updates for update.php
$GLOBALS['wgHooks']['LoadExtensionSchemaUpdates'][] =
	'SpellingDictionaryHooks::onLoadExtensionSchemaUpdates';

// Register special pages
// See also http://www.mediawiki.org/wiki/Manual:Special_pages
$GLOBALS['wgSpecialPages']['SpellingDictionary'] = 'SpecialSpellingDictionary';
$GLOBALS['wgSpecialPageGroups']['SpellingDictionary'] = 'other';
$GLOBALS['wgSpecialPages']['SpellingDictionaryAdmin'] = 'SpecialSpellingDictionaryAdmin';
$GLOBALS['wgSpecialPageGroups']['SpellingDictionaryAdmin'] = 'other';
$GLOBALS['wgSpecialPages']['ViewAll'] = 'SpecialViewAll';
$GLOBALS['wgSpecialPageGroups']['ViewAll'] = 'other';
$GLOBALS['wgSpecialPages']['ViewByLanguage'] = 'SpecialViewByLanguage';
$GLOBALS['wgSpecialPageGroups']['ViewByLanguage'] = 'other';

