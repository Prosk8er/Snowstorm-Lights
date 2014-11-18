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

class snowstorm_light_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$user->add_lang('acp/common');
		$this->user->add_lang_ext('prosk8er/snowstormlights', 'info_acp_snowstorm_lights');
		$this->tpl_name = 'snowstorm_lights';
		$this->page_title = $user->lang['CHRISTMAS_LIGHTS_MOD'];
		add_form_key('acp_snowstorm_lights');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('acp_snowstorm_lights'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('scl_enabled', $request->variable('scl_enabled', 0));
			$config->set('snow_enabled', $request->variable('snow_enabled', 0));

			trigger_error($user->lang('SNOWSTORM_LIGHTS_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'SCL_ENABLED'		=> $config['scl_enabled'],
			'SNOW_ENABLED'		=> $config['snow_enabled'],
			'U_ACTION'		=> $this->u_action,
		));
	}
}
