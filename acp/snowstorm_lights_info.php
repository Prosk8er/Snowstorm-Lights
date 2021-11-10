<?php
/**
*
* @package Snowstorm and Lights
* @copyright (c) 2021 Prosk8er <https://www.gotskillslounge.com>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace prosk8er\snowstormlights\acp;

class snowstorm_lights_info
{
	function module()
	{
		return [
			'filename'	=> '\prosk8er\snowstormlights\acp\snowstorm_lights_module',
			'title'		=> 'ACP_SNOWSTROM_LIGHTS',
			'modes'		=> [
				'settings'	=> [
					'title' => 'ACP_SNOWSTORM_LIGHTS_SETTINGS',
					'auth' => 'ext_prosk8er/snowstormlights && acl_a_board',
					'cat' => ['ACP_SNOWSTROM_LIGHTS']
				],
			],
		];
	}
}
