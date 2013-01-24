<?php

/**
 *
 * ReflexCMS by James King
 * © ReflexCMS, All Rights Reserved.
 *
 * Please see https://github.com/Jamesking56/ReflexCMS for full information & support
 *
 * Licensed under the Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License. Please see ../LICENSING.md for details.
 * 
 */
if(!defined('IN_REFLEX')){ die("HACK ATTEMPT!"); }

// Manually load Config
if(!file_exists(__DIR__.'/config.inc.php'))
	die('<meta http-equiv="refresh" content="0;URL=http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'install/install.php">');
else
	require_once __DIR__.'/config.inc.php';

// Autoload classes when used
function __autoload($className){
	try {
		require_once __DIR__.'/classes/' . $className . '.class.php';
	} catch (Exception $e) {
		die("ReflexCMS FATAL: Failed to load class ".$className);
	}
}

// Manually load extra non-object based functions
try {
	require_once 'functions.inc.php';
} catch (Exception $e) {
	die("ReflexCMS FATAL: Failed to load functions file!");
}

// Do environment checks
doEnvChecks();

// Let's start the backend classes!
$error = new Error($config['debug'], $config['hideAllErrors'], $config['technicalEmail']);
$database = new Database(
	$config['database']['type'],
	$config['database']['host'],
	$config['database']['port'],
	$config['database']['username'],
	$config['database']['password'],
	$config['database']['name']
);

?>