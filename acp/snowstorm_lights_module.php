<?php
/**
*
* @package Snowstorm and Lights
* @copyright (c) 2021 Prosk8er <https://www.gotskillslounge.com>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace prosk8er\snowstormlights\acp;

class snowstorm_lights_module
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string */
	public $u_action;

	public function main($id, $mode)
	{
		global $config, $request, $template, $user;

		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;

		// Add the common lang file
		$this->user->add_lang(['acp/common']);

		// Add the board snowstormlights ACP lang file
		$this->user->add_lang_ext('prosk8er/snowstormlights', 'info_acp_snowstorm_lights');

		// Load a template from adm/style for our ACP page
		$this->tpl_name = 'snowstorm_lights';

		// Set the page title for our ACP page
		$this->page_title = $user->lang['ACP_SNOWSTORM_LIGHTS'];

		// Define the name of the form for use as a form key
		$form_key = 'acp_snowstorm_lights';
		add_form_key($form_key);

		// If form is submitted or previewed
		if ($this->request->is_set_post('submit'))
		{
			// Test if form key is valid
			if (!check_form_key($form_key))
			{
				trigger_error('FORM_INVALID');
			}

			// Store the config enable/disable state
			$scl_enabled = $this->request->variable('scl_enabled', 0);
			$this->config->set('scl_enabled', $scl_enabled);

			$lightscss_enabled = $request->variable('lightscss_enabled', 0);
			$this->config->set('lightscss_enabled', $lightscss_enabled);

			$snow_enabled = $request->variable('snow_enabled', 0);
			$this->config->set('snow_enabled', $snow_enabled);

			$snowcss_enabled = $request->variable('snowcss_enabled', 0);
			$this->config->set('snowcss_enabled', $snowcss_enabled);

			$snowbg_enabled = $request->variable('snowbg_enabled', 0);
			$this->config->set('snowbg_enabled', $snowbg_enabled);

			$santahat_enabled = $request->variable('santahat_enabled', 0);
			$this->config->set('santahat_enabled', $santahat_enabled);

			// Output message to user for the update
			trigger_error($this->user->lang('SNOWSTORM_LIGHTS_SAVED') . adm_back_link($this->u_action));
		}

		// Output data to the template
		$this->template->assign_vars([
			'SCL_ENABLED'		=> $this->config['scl_enabled'],
			'LIGHTSCSS_ENABLED'	=> $this->config['lightscss_enabled'],
			'SNOW_ENABLED'		=> $this->config['snow_enabled'],
			'SNOWCSS_ENABLED'	=> $this->config['snowcss_enabled'],
			'SNOWBG_ENABLED'	=> $this->config['snowbg_enabled'],
			'SANTAHAT_ENABLED'	=> $this->config['santahat_enabled'],
			'U_ACTION'		=> $this->u_action,
		]);
	}
}
