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

/**
 * Checks the server environment to make sure ReflexCMS will run correctly.
 */
function doEnvChecks()
{
	// Check the environment to make sure it matches the requied env
	$phpVersion = PHP_MAJOR_VERSION . "." . PHP_MINOR_VERSION;

	if($phpVersion < "5.3")
		die('ReflexCMS FATAL: ReflexCMS does not support PHP '.$phpVersion.'.x! PHP 5.3.x or greater required!');
}

function redirect($url=false, $die=true, $code=301)
{
	if(isset($url) && $url != "")
	{
		$meta = '<meta http-equiv="refresh" content="0;URL='.$url.'">';

		if($die)
			die($meta);
		else
			echo $meta;

		return true;
	}
	else
		return false;
}

?>