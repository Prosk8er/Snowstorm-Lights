<?php
/**
*
* Snowstorm & Lights extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 Prosk8er <http://www.gotskillslounge.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace prosk8er\snowstormlights\acp;

class snowstorm_lights_info
{
	function module()
	{
		return array(
			'filename'	=> '\prosk8er\snowstormlights\acp\snowstorm_lights_module',
			'title'		=> 'ACP_SNOWSTROM_LIGHTS',
			'modes'		=> array(
				'settings'	=> array(
					'title' => 'ACP_SNOWSTORM_LIGHTS_SETTINGS',
					'auth' => 'ext_prosk8er/snowstormlights && acl_a_board',
					'cat' => array('ACP_SNOWSTROM_LIGHTS')
				),
			),
		);
	}
}
