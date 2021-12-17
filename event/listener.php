<?php
/**
*
* @package Snowstorm and Lights
* @copyright (c) 2021 Prosk8er <https://www.gotskillslounge.com>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
		return [
			'core.user_setup'			=> 'load_language_on_setup',
			'core.page_header_after'		=> 'assign_to_template',
			'core.ucp_prefs_personal_data'		=> 'ucp_prefs_personal_data',
			'core.ucp_prefs_personal_update_data'	=> 'ucp_prefs_personal_update_data',
		];
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name' => 'prosk8er/snowstormlights',
			'lang_set' => 'snowstorm_lights',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function assign_to_template($event)
	{
		$this->template->assign_vars([
			'S_SCL_ENABLED'			=> isset($this->config['scl_enabled']) ? $this->config['scl_enabled'] : '',
			'S_SCL_UCP_ENABLED'		=> isset($this->user->data['user_scl_enabled']) ? $this->user->data['user_scl_enabled'] : '',
			'S_LIGHTSCSS_ENABLED'		=> isset($this->config['lightscss_enabled']) ? $this->config['lightscss_enabled'] : '',
			'S_LIGHTSCSS_UCP_ENABLED'	=> isset($this->user->data['user_lightscss_enabled']) ? $this->user->data['user_lightscss_enabled'] : '',
			'S_SNOW_ENABLED'		=> isset($this->config['snow_enabled']) ? $this->config['snow_enabled'] : '',
			'S_SNOW_UCP_ENABLED'		=> isset($this->user->data['user_snow_enabled']) ? $this->user->data['user_snow_enabled'] : '',
			'S_SNOWCSS_ENABLED'		=> isset($this->config['snowcss_enabled']) ? $this->config['snowcss_enabled'] : '',
			'S_SNOWCSS_UCP_ENABLED'		=> isset($this->user->data['user_snowcss_enabled']) ? $this->user->data['user_snowcss_enabled'] : '',
			'S_SNOWBG_ENABLED'		=> isset($this->config['snowbg_enabled']) ? $this->config['snowbg_enabled'] : '',
			'S_SNOWBG_UCP_ENABLED'		=> isset($this->user->data['user_snowbg_enabled']) ? $this->user->data['user_snowbg_enabled'] : '',
			'S_SANTAHAT_ENABLED'		=> isset($this->config['santahat_enabled']) ? $this->config['santahat_enabled'] : '',
			'S_SANTAHAT_UCP_ENABLED'	=> isset($this->user->data['user_santahat_enabled']) ? $this->user->data['user_santahat_enabled'] : '',
		]);
	}

	public function ucp_prefs_personal_data($event)
	{
		$data = $event['data'];

		$data = array_merge($data, [
			'scl_ucp_enabled'	=> $this->request->variable('scl_ucp_enabled', (bool) $this->user->data['user_scl_enabled']),
			'lightscss_ucp_enabled'	=> $this->request->variable('lightscss_ucp_enabled', (bool) $this->user->data['user_lightscss_enabled']),
			'snow_ucp_enabled'	=> $this->request->variable('snow_ucp_enabled', (bool) $this->user->data['user_snow_enabled']),
			'snowcss_ucp_enabled'	=> $this->request->variable('snowcss_ucp_enabled', (bool) $this->user->data['user_snowcss_enabled']),
			'snowbg_ucp_enabled'	=> $this->request->variable('snowbg_ucp_enabled', (bool) $this->user->data['user_snowbg_enabled']),
			'santahat_ucp_enabled'	=> $this->request->variable('santahat_ucp_enabled', (bool) $this->user->data['user_santahat_enabled']),
		]);

		$event['data'] = $data;
	}

	public function ucp_prefs_personal_update_data($event)
	{
		$data = $event['data'];
		$sql_ary = $event['sql_ary'];

		$sql_ary = array_merge($sql_ary, [
			'user_scl_enabled'		=> $data['scl_ucp_enabled'],
			'user_lightscss_enabled'	=> $data['lightscss_ucp_enabled'],
			'user_snow_enabled'		=> $data['snow_ucp_enabled'],
			'user_snowcss_enabled'		=> $data['snowcss_ucp_enabled'],
			'user_snowbg_enabled'		=> $data['snowbg_ucp_enabled'],
			'user_santahat_enabled'		=> $data['santahat_ucp_enabled'],
		]);

		$event['sql_ary'] = $sql_ary;
	}
}
