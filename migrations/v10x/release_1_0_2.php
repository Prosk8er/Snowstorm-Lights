<?php
/**
*
* @package Snowstorm and Lights
* @copyright (c) 2021 Prosk8er <https://www.gotskillslounge.com>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace prosk8er\snowstormlights\migrations\v10x;

class release_1_0_2 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return version_compare($this->config['snowstorm_lights_version'], '1.0.2', '>=');
	}

	static public function depends_on()
	{
		return ['\prosk8er\snowstormlights\migrations\v10x\release_1_0_1'];
	}

	public function update_data()
	{
		return [
			['config.update', ['snowstorm_lights_version', '1.0.2']],
		];
	}

	public function revert_data()
	{
		return [
			['config.remove', ['snowstorm_lights_version']],
		];
	}
}
