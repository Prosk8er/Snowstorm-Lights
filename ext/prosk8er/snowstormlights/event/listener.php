<?php
/**
*
* Snowstorm & Lights extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 Prosk8er <http://www.gotskillslounge.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace prosk8er\snowstormlights\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\request\request      $request            Request object
	* @param \phpbb\template\template    $template           Template object
	* @param \phpbb\user                 $user               User object
	* @return \prosk8er\snowstormlights\event\listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'			=> 'load_language_on_setup',
			'core.page_header_after'		=> 'assign_to_template',
			'core.ucp_prefs_personal_data'		=> 'ucp_prefs_personal_data',
			'core.ucp_prefs_personal_update_data'	=> 'ucp_prefs_personal_update_data',
			'core.ucp_prefs_view_update_data'	=> 'ucp_prefs_view_update_data',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'prosk8er/snowstormlights',
			'lang_set' => 'snowstorm_lights',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function assign_to_template($event)
	{
		$tpl_vars = array(
			'S_SCL_ENABLED'		=> (!empty($this->config['scl_enabled'])) ? true : false,
			'S_SCL_UCP_ENABLED'	=> (!empty($this->user->data['user_scl_enabled'])) ? true : false,
			'S_SNOW_ENABLED'	=> (!empty($this->config['snow_enabled'])) ? true : false,
			'S_SNOW_UCP_ENABLED'	=> (!empty($this->user->data['user_snow_enabled'])) ? true : false,
		);

		$this->template->assign_vars($tpl_vars);
	}

	public function ucp_prefs_personal_data($event)
	{
		$data = array(
			'scl_ucp_enabled'	=> $request->variable('scl_ucp_enabled', (bool) $this->user->data['user_scl_enabled']),
			'snow_ucp_enabled'	=> $request->variable('snow_ucp_enabled', (bool) $this->user->data['user_snow_enabled']),
		);

		$vars = array('submit', 'data');
	}

	public function ucp_prefs_personal_update_data($event)
	{
		$sql_ary = array(
			'user_scl_enabled'	=> $data['scl_ucp_enabled'],
			'user_snow_enabled'	=> $data['snow_ucp_enabled'],
		);

		$vars = array('data', 'sql_ary');
	}

	public function ucp_prefs_view_update_data($event)
	{
		$sql_ary = array(
			'S_SCL_UCP_ENABLED'	=> $data['scl_ucp_enabled'],
			'S_SNOW_UCP_ENABLED'	=> $data['snow_ucp_enabled'],
		);

		$vars = array('data', 'sql_ary');
	}
}
