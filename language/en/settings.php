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
		'ANDREASK_GIPHYFORPHPBB_SETTINGS'             =>	'Settings',
		'GIPHYFORPHPBB_DEV_KEY'                      =>    'Giphy API Code',
        'ANDREASK_GIPHYFORPHPBB_DEV_KEY_EXPLAIN'     =>    'Put here the Key that is given by the Giphy development website.<br>You can create this key following the <a href="https://developers.giphy.com/docs/api#quick-start-guide" target="parent" rel="noreferrer noopener">Giphy documentation</a>: "Apply for an API Key(s)"',
        'PUT_GIPHY_API_KEY_HERE'                    =>  'Giphy API Key goes here!',
        'EMPTY_INPUT_NOT_ALLOWED'                   =>  'Empty submition, <strong>nothing</strong> was saved.',
	));
