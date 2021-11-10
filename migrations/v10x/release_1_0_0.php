<?php
/**
*
* @package Snowstorm and Lights
* @copyright (c) 2021 Prosk8er <https://www.gotskillslounge.com>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace prosk8er\snowstormlights\migrations\v10x;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['snowstorm_lights_version']) && version_compare($this->config['snowstorm_lights_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return ['\phpbb\db\migration\data\v320\v320'];
	}

	public function update_schema()
	{
		return [
			'add_columns'	=> [
				$this->table_prefix . 'users'	=> [
					'user_scl_enabled'	=> ['BOOL', 1],
					'user_snow_enabled'	=> ['BOOL', 1],
				],
			],
		];
	}

	public function update_data()
	{
		return [
			['config.add', ['scl_enabled', 0]],
			['config.add', ['snow_enabled', 0]],
			['config.add', ['snowstorm_lights_version', '1.0.0']],
			['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'ACP_SNOWSTORM_LIGHTS']],
			['module.add', [
				'acp',
				'ACP_SNOWSTORM_LIGHTS',
				[
					'module_basename'	=> '\prosk8er\snowstormlights\acp\snowstorm_lights_module',
					'modes'			=> ['settings'],
				],
			]],
		];
	}

	public function revert_data()
	{
		return [
			['config.remove', ['scl_enabled']],
			['config.remove', ['snow_enabled']],
			['config.remove', ['snowstorm_lights_version']],
			['module.remove', [
				'acp',
				'ACP_SNOWSTORM_LIGHTS',
				[
					'module_basename'	=> '\prosk8er\snowstormlights\acp\snowstorm_lights_module',
					'modes'			=> ['settings'],
				],
			]],
			['module.remove', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_SNOWSTORM_LIGHTS'
			]],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_columns'	=> [
				$this->table_prefix . 'users'	=> [
					'user_scl_enabled',
					'user_snow_enabled',
				],
			],
		];
	}
}
