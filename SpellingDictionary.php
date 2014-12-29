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

// Initialize an easy to use shortcut:
$dir = dirname( __FILE__ );
$dirbasename = basename( $dir );

// Globals for this extension
$wgSpellingDictionaryDatabase = false;

// Register files
// MediaWiki need to know which PHP files contains your class. It has a
// registering mecanism to append to the internal autoloader. Simply use
// $wgAutoLoadClasses as below:
$wgAutoloadClasses['SpellingDictionary\Database'] = $dir . '/includes/Database.php';
$wgAutoloadClasses['SpellingDictionary\Words'] = $dir . '/includes/Words.php';
$wgAutoloadClasses['SpellingDictionary\AdminRights'] = $dir . '/includes/AdminRights.php';
$wgAutoloadClasses['SpellingDictionaryHooks'] = $dir . '/SpellingDictionary.hooks.php';
$wgAutoloadClasses['SpecialSpellingDictionary'] = $dir . '/specials/SpecialSpellingDictionary.php';
$wgAutoloadClasses['SpecialSpellingDictionaryAdmin'] = $dir . '/specials/'
													.'SpecialSpellingDictionaryAdmin.php';
$wgAutoloadClasses['ApiQuerySpellingDictionary'] = $dir . '/api/ApiQuerySpellingDictionary.php';

$wgMessagesDirs['SpellingDictionary'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['SpellingDictionaryAlias'] = $dir . '/SpellingDictionary.i18n.alias.php';
$wgExtensionMessagesFiles['SpellingDictionaryMagic'] = $dir . '/SpellingDictionary.i18n.magic.php';

$wgAPIListModules['example'] = 'ApiQuerySpellingDictionary';

// Register hooks
// See also http://www.mediawiki.org/wiki/Manual:Hooks
$wgHooks['BeforePageDisplay'][] = 'SpellingDictionaryHooks::onBeforePageDisplay';
$wgHooks['ResourceLoaderGetConfigVars'][] =
	'SpellingDictionaryHooks::onResourceLoaderGetConfigVars';
$wgHooks['ParserFirstCallInit'][] = 'SpellingDictionaryHooks::onParserFirstCallInit';
$wgHooks['MagicWordwgVariableIDs'][] = 'SpellingDictionaryHooks::onRegisterMagicWords';
$wgHooks['ParserGetVariableValueSwitch'][] =
	'SpellingDictionaryHooks::onParserGetVariableValueSwitch';
# Schema updates for update.php
$wgHooks['LoadExtensionSchemaUpdates'][] = 'SpellingDictionaryHooks::onLoadExtensionSchemaUpdates';

// Register special pages
// See also http://www.mediawiki.org/wiki/Manual:Special_pages
$wgSpecialPages['SpellingDictionary'] = 'SpecialSpellingDictionary';
$wgSpecialPageGroups['SpellingDictionary'] = 'other';
$wgSpecialPages['SpellingDictionaryAdmin'] = 'SpecialSpellingDictionaryAdmin';
$wgSpecialPageGroups['SpellingDictionaryAdmin'] = 'other';

// Register modules
// See also http://www.mediawiki.org/wiki/Manual:$wgResourceModules
// ResourceLoader modules are the de facto standard way to easily
// load JavaScript and CSS files to the client.
$wgResourceModules['ext.SpellingDictionary.welcome'] = array(
	'scripts' => array(
		'modules/ext.SpellingDictionary.welcome.js',
	),
	'styles' => array(
		'modules/ext.SpellingDictionary.welcome.css',
	),
	'messages' => array(
		'title-special',
	),
	'dependencies' => array(
		'mediawiki.util',
		'mediawiki.user',
		'mediawiki.Title',
	),

	'localBasePath' => $dir,
	'remoteExtPath' => 'SpellingDictionary/' . $dirbasename,
);

$wgResourceModules['ext.SpellingDictionary.welcome.init'] = array(
	'scripts' => 'modules/ext.SpellingDictionary.welcome.init.js',
	'dependencies' => array(
		'ext.SpellingDictionary.welcome',
	),

	'localBasePath' => $dir,
	'remoteExtPath' => 'SpellingDictionary/' . $dirbasename,
);

// ULS
$resourcePaths = array(
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'SpellingDictionary'
);


$wgResourceModules['jquery.uls'] = array(
	'scripts' => array(
		'modules/jquery.uls/src/jquery.uls.core.js',
		'modules/jquery.uls/src/jquery.uls.lcd.js',
		'modules/jquery.uls/src/jquery.uls.languagefilter.js',
		'modules/jquery.uls/src/jquery.uls.regionfilter.js',
	),
	'styles' => array(
		'modules/jquery.uls/css/jquery.uls.css',
		'modules/jquery.uls/css/jquery.uls.lcd.css',
	),
	'dependencies' => array(
		'jquery.i18n',
		'jquery.uls.data',
		'jquery.uls.grid',
	),
) + $resourcePaths;

$wgResourceModules['jquery.uls.compact'] = array(
	'styles' => 'modules/jquery.uls/css/jquery.uls.compact.css',
	'dependencies' => 'jquery.uls',
) + $resourcePaths;

$wgResourceModules['jquery.uls.data'] = array(
	'scripts' => array(
		'modules/jquery.uls/src/jquery.uls.data.js',
		'modules/jquery.uls/src/jquery.uls.data.utils.js',
	),
	'targets' => array( 'desktop', 'mobile' ),
) + $resourcePaths;

$wgResourceModules['jquery.uls.grid'] = array(
	'styles' => 'modules/jquery.uls/css/jquery.uls.grid.css',
) + $resourcePaths;


// Configuration


/** Your extension configuration settings. Since they are going to be global
 * always use a "wg" prefix + your extension name + your setting key.
 * The entire variable name should use "lowerCamelCase".
 */

// Enable Welcome
// SpellingDictionary of a configuration setting to enable the 'Welcome' feature:
$wgSpellingDictionaryEnableWelcome = true;

// Color map for the Welcome feature
$wgSpellingDictionaryWelcomeColorDefault = '#eee';
// Days not defined here fall back to the default
$wgSpellingDictionaryWelcomeColorDays = array(
	'Monday' => 'orange',
	'Tuesday' => 'blue',
	'Wednesday' => 'green',
	'Thursday' => 'red',
	'Friday' => 'yellow',
);

// Value of {{MYWORD}} constant
$wgSpellingDictionaryMyWord = 'Awesome';
