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

