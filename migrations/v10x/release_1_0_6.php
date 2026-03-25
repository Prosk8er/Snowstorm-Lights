<?php
/**
*
* @package Snowstorm and Lights
* @copyright (c) 2026 Prosk8er <https://www.gotskillslounge.com>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace prosk8er\snowstormlights\migrations\v10x;

class release_1_0_6 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return !$this->config->offsetExists('snowstorm_lights_version');
	}

	static public function depends_on()
	{
		return ['\prosk8er\snowstormlights\migrations\v10x\release_1_0_5'];
	}

	public function update_data()
	{
		return [
			['config.remove', ['snowstorm_lights_version']],
		];
	}
}
