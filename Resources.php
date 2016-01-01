<?php
/**
 * Resource loader module definitions.
 *
 * @file
 * @license GPL-2.0+
 */

// Initialize an easy to use shortcut:
$dir = dirname( __FILE__ );
$dirbasename = basename( $dir );

$resourcePaths = array(
	'localBasePath' => $dir,
	'remoteExtPath' => 'Spellingictionary/' . $dirbasename
);

// Register modules
// See also http://www.mediawiki.org/wiki/Manual:$wgResourceModules
// ResourceLoader modules are the de facto standard way to easily
// load JavaScript and CSS files to the client.
$wgResourceModules['SpellingDictionary'] = array(
	'styles' => array(
		'modules/SpellingDictionary.css',
	),
	'scripts' => array(
		'modules/SpellingDictionary.js',
	),
	'messages' => array(
		'title-special',
	),
	'dependencies' => array(
		'mediawiki.util',
		'mediawiki.user',
		'mediawiki.Title',
		'oojs-ui',
	),
) + $resourcePaths;
$wgResourceModules['ext.SpellingDictionary.styles'] = array(
	'styles' => 'modules/ext.SpellingDictionary.styles.css',
) + $resourcePaths;
$wgResourceModules['ext.SpellingDictionary.viewByLanguage'] = array(
	'scripts' => 'modules/ext.SpellingDictionary.viewByLanguage.js',
	'messages' => array(
		'sd-admin-select-language',
		'-section-chooselanguage',
		'sd-admin-view-selected-language',
		'uls-select-language',
	),
	'dependencies' => array(
		'jquery.uls',
		'oojs-ui',
		'jquery.i18n',
		'mediawiki.jqueryMsg',
		'ext.uls.messages',
		'ext.SpellingDictionary.styles',
	),
) + $resourcePaths;
