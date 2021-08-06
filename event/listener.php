<?php
/**
*
* Snowstorm and Lights extension for the phpBB Forum Software package.
*
* @copyright (c) 2021 Prosk8er <https://www.gotskillslounge.com>
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
		$this->template->assign_vars(array(
			'S_SCL_ENABLED'			=> isset($this->config['scl_enabled']) ? $this->config['scl_enabled'] : '',
			'S_SCL_UCP_ENABLED'		=> isset($this->user->data['user_scl_enabled']) ? $this->user->data['user_scl_enabled'] : '',
			'S_SNOW_ENABLED'		=> isset($this->config['snow_enabled']) ? $this->config['snow_enabled'] : '',
			'S_SNOW_UCP_ENABLED'		=> isset($this->user->data['user_snow_enabled']) ? $this->user->data['user_snow_enabled'] : '',
			'S_SANTAHAT_ENABLED'		=> isset($this->config['santahat_enabled']) ? $this->config['santahat_enabled'] : '',
			'S_SANTAHAT_UCP_ENABLED'	=> isset($this->user->data['user_santahat_enabled']) ? $this->user->data['user_santahat_enabled'] : '',
		));
	}

	public function ucp_prefs_personal_data($event)
	{
		$data = $event['data'];

		$data = array_merge($data, array(
			'scl_ucp_enabled'	=> $this->request->variable('scl_ucp_enabled', (bool) $this->user->data['user_scl_enabled']),
			'snow_ucp_enabled'	=> $this->request->variable('snow_ucp_enabled', (bool) $this->user->data['user_snow_enabled']),
			'santahat_ucp_enabled'	=> $this->request->variable('santahat_ucp_enabled', (bool) $this->user->data['user_santahat_enabled']),
		));

		$event['data'] = $data;
	}

	public function ucp_prefs_personal_update_data($event)
	{
		$data = $event['data'];
		$sql_ary = $event['sql_ary'];

		$sql_ary = array_merge($sql_ary, array(
			'user_scl_enabled'	=> $data['scl_ucp_enabled'],
			'user_snow_enabled'	=> $data['snow_ucp_enabled'],
			'user_santahat_enabled'	=> $data['santahat_ucp_enabled'],
		));

		$event['sql_ary'] = $sql_ary;
	}
}
