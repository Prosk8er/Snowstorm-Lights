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

class snowstorm_lights_module
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string */
	protected $phpbb_root_path;

	/** @var string */
	protected $php_ext;

	/** @var string */
	public $u_action;

	public function main($id, $mode)
	{
		global $config, $db, $request, $template, $user, $phpbb_root_path, $phpEx;

		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $phpEx;

		// Add the common lang file
		$this->user->add_lang(array('acp/common'));

		// Add the board snowstormlights ACP lang file
		$this->user->add_lang_ext('prosk8er/snowstormlights', 'info_acp_snowstorm_lights');

		// Load a template from adm/style for our ACP page
		$this->tpl_name = 'snowstorm_lights';

		// Set the page title for our ACP page
		$this->page_title = $user->lang['ACP_SNOWSTORM_LIGHTS'];

		// Define the name of the form for use as a form key
		$form_name = 'acp_snowstorm_lights';
		add_form_key($form_name);

		// If form is submitted or previewed
		if ($this->request->is_set_post('submit'))
		{
			// Test if form key is valid
			if (!check_form_key($form_name))
			{
				trigger_error('FORM_INVALID');
			}

			// Store the config enable/disable state
			$config->set('scl_enabled', $request->variable('scl_enabled', 0));
			$config->set('snow_enabled', $request->variable('snow_enabled', 0));

			// Output message to user for the update
			trigger_error($this->user->lang('SNOWSTORM_LIGHTS_SAVED') . adm_back_link($this->u_action));
		}

		// Output data to the template
		$this->template->assign_vars(array(
			'SCL_ENABLED'		=> $this->config['scl_enabled'],
			'SNOW_ENABLED'		=> $this->config['snow_enabled'],
			'U_ACTION'		=> $this->u_action,
		));
	}
}
