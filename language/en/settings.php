<?php

/**
* This file is part of the phpBB Forum extension package
* IUM (Inactive User Manager).
*
* @copyright (c) 2016 by Andreas Kourtidis
* @license   GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the CREDITS.txt file.
*/

if (!defined('IN_PHPBB'))
{
        exit;
}

if (empty( $lang) || !is_array($lang) )
{
        $lang = array();
}

$lang = array_merge(
	$lang, array(
		'ANDREASK_GIPHYFORPHPBB_SETTINGS'		=>	'Settings',
		'GIPHYFORPHPBB_DEV_CODE'			=>	'Giphy API Code',
	));
