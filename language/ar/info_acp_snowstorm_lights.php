<?php
/**
*
* Snowstorm & Lights extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 Prosk8er <http://www.gotskillslounge.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'ACP_SNOWSTORM_LIGHTS'		=> 'العاصفة الثلجية و المصابيح',
	'ACP_SNOWSTORM_LIGHTS_SETTINGS'	=> 'الإعدادات',
	'SCL_ENABLED'			=> 'تفعيل "المصابيح" ',
	'SNOW_ENABLED'			=> 'تفعيل "العاصفة الثلجية" ',
	'SNOWSTORM_LIGHTS'		=> 'العاصفة الثلجية و المصابيح',
	'SNOWSTORM_LIGHTS_EXPLAIN'	=> 'تستطيع من هنا ضبط الإعدادت الخاصة بالعاصفة الثلجية و المصابيح.',
	'SNOWSTORM_LIGHTS_SAVED'	=> 'تم التحديث بنجاح.',
));
