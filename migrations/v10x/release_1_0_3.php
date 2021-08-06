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

class release_1_0_3 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return version_compare($this->config['snowstorm_lights_version'], '1.0.3', '>=');
	}

	static public function depends_on()
	{
		return array('\prosk8er\snowstormlights\migrations\v10x\release_1_0_2');
	}

	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'user_santahat_enabled' => array('BOOL', 1),
				),
			),
		);
	}

	public function update_data()
	{
		return array(
			array('config.add', array('santahat_enabled', 0)),
			array('config.update', array('snowstorm_lights_version', '1.0.3')),
		);
	}

	public function revert_data()
	{
		return array(
			array('config.remove', array('santahat_enabled')),
			array('config.remove', array('snowstorm_lights_version')),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'user_santahat_enabled',
				),
			),
		);
	}
}
