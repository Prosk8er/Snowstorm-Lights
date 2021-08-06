<?php
/**
*
* Snowstorm and Lights extension for the phpBB Forum Software package.
*
* @copyright (c) 2021 Prosk8er <https://www.gotskillslounge.com>
* @license GNU General Public License, version 2 (GPL-2.0)
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
		return array('\phpbb\db\migration\data\v310\dev');
	}
	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'user_scl_enabled'				=> array('BOOL', 1),
					'user_snow_enabled' => array('BOOL', 1),
				),
			),
		);
	}

	public function update_data()
	{
		return array(
			array('config.add', array('scl_enabled', 0)),
			array('config.add', array('snow_enabled', 0)),
			array('config.add', array('snowstorm_lights_version', '1.0.0')),

			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_SNOWSTORM_LIGHTS')),
			array('module.add', array(
				'acp', 'ACP_SNOWSTORM_LIGHTS', array(
					'module_basename'	=> '\prosk8er\snowstormlights\acp\snowstorm_lights_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}

	public function revert_data()
	{
		return array(
			array('config.remove', array('scl_enabled')),
			array('config.remove', array('snow_enabled')),
			array('config.remove', array('snowstorm_lights_version')),

			array('module.remove', array(
				'acp',
				'ACP_SNOWSTORM_LIGHTS',
				array(
					'module_basename'	=> '\prosk8er\snowstormlights\acp\snowstorm_lights_module',
					'modes'				=> array('settings'),
				),
			)),
			array('module.remove', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_SNOWSTORM_LIGHTS'
			)),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'user_scl_enabled',
					'user_snow_enabled',
				),
			),
		);
	}
}
