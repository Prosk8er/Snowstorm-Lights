<?php
/**
*
* @package Snowstorm and Lights
* @copyright (c) 2021 Prosk8er <https://www.gotskillslounge.com>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
	$lang = [];
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

$lang = array_merge($lang, [
	'SCL_ENABLED'			=> 'Enable Smashable Christmas Lights',
	'SCL_ENABLED_EXPLAIN'		=> 'Enables or disables the Smashable Christmas Lights.',
	'LIGHTSCSS_ENABLED'		=> 'Enable Christmas Lights CSS',
	'LIGHTSCSS_ENABLED_EXPLAIN'	=> 'Enables or disables the Christmas Lights CSS.',
	'SNOW_ENABLED'			=> 'Enable Snowstorm',
	'SNOW_ENABLED_EXPLAIN'		=> 'Enables or disables the Snowstorm.',
	'SNOWCSS_ENABLED'		=> 'Enable Snowflakes CSS',
	'SNOWCSS_ENABLED_EXPLAIN'	=> 'Enables or disables the Snowflakes CSS.',
	'SNOWBG_ENABLED'		=> 'Enable snow on forum headers',
	'SNOWBG_ENABLED_EXPLAIN'	=> 'Enables or disables the snow on forum headers.',
	'SANTAHAT_ENABLED'		=> 'Enable Santa Hat',
	'SANTAHAT_ENABLED_EXPLAIN'	=> 'Enables or disables the Santa Hat.',
]);
