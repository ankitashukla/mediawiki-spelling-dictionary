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

	'localBasePath' => $dir,
	'remoteExtPath' => 'SpellingDictionary/' . $dirbasename,
);