<?php
/**
 *
 * Giphy for PHPBB. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, Andreas Kourtidis
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace andreask\giphyforphpbb\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Giphy for PHPBB Event listener.
 */
class main_listener implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return array(
			'core.permissions'	=> 'add_permissions',
		);
	}

	/**
	 * Add permissions to the ACP -> Permissions settings page
	 * This is where permissions are assigned language keys and
	 * categories (where they will appear in the Permissions table):
	 * actions|content|forums|misc|permissions|pm|polls|post
	 * post_actions|posting|profile|settings|topic_actions|user_group
	 *
	 * Developers note: To control access to ACP, MCP and UCP modules, you
	 * must assign your permissions in your module_info.php file. For example,
	 * to allow only users with the a_new_andreask_giphyforphpbb permission
	 * access to your ACP module, you would set this in your acp/main_info.php:
	 *    'auth' => 'ext_andreask/giphyforphpbb && acl_a_new_andreask_giphyforphpbb'
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function add_permissions($event)
	{
		$permissions = $event['permissions'];

		$permissions['a_new_andreask_giphyforphpbb'] = array('lang' => 'ACL_A_NEW_ANDREASK_GIPHYFORPHPBB', 'cat' => 'misc');
		$permissions['m_new_andreask_giphyforphpbb'] = array('lang' => 'ACL_M_NEW_ANDREASK_GIPHYFORPHPBB', 'cat' => 'post_actions');
		$permissions['u_new_andreask_giphyforphpbb'] = array('lang' => 'ACL_U_NEW_ANDREASK_GIPHYFORPHPBB', 'cat' => 'post');

		$event['permissions'] = $permissions;
	}
}
