<?php
/**
*
* Snowstorm and Lights extension for the phpBB Forum Software package.
*
* @copyright (c) 2020 Prosk8er <http://www.gotskillslounge.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_SNOWSTORM_LIGHTS'		=> '粉雪とライト',
	'ACP_SNOWSTORM_LIGHTS_SETTINGS'	=> '粉雪とライト設定',
	'SCL_ENABLED'			=> '"スマッシュするクリスマスライト"の有効化',
	'SNOW_ENABLED'			=> '"粉雪"の有効化',
	'SNOWSTORM_LIGHTS'		=> '粉雪とライト',
	'SNOWSTORM_LIGHTS_EXPLAIN'	=> '粉雪とライトを設定します。',
	'SNOWSTORM_LIGHTS_SAVED'	=> '変更を保存しました。',
));
