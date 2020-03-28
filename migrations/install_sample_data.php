<?php
/**
 *
 * Giphy for PHPBB. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, Andreas Kourtidis
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace andreask\giphyforphpbb\migrations;

class install_sample_data extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\phpbb\db\migration\data\v320\v320');
	}

	/**
	 * Add, update or delete data stored in the database during extension installation.
	 *
	 * https://area51.phpbb.com/docs/dev/3.2.x/migrations/data_changes.html
	 *  permission.add: Add a new permission.
	 *  permission.remove: Remove a permission.
	 *  permission.role_add: Add a new permission role.
	 *  permission.role_update: Update a permission role.
	 *  permission.role_remove: Remove a permission role.
	 *  permission.permission_set: Set a permission to Yes or Never.
	 *  permission.permission_unset: Set a permission to No.
	 *
	 * @return array Array of data update instructions
	 */
	public function update_data()
	{
		return array(
			// Add new permissions
			array('permission.add', array('a_new_andreask_giphyforphpbb')), // New admin permission
			array('permission.add', array('m_new_andreask_giphyforphpbb')), // New moderator permission
			array('permission.add', array('u_new_andreask_giphyforphpbb')), // New user permission

			// array('permission.add', array('a_copy', true, 'a_existing')), // New admin permission a_copy, copies permission settings from a_existing

			// Set our new permissions
			array('permission.permission_set', array('ROLE_ADMIN_FULL', 'a_new_andreask_giphyforphpbb')), // Give ROLE_ADMIN_FULL a_new_andreask_giphyforphpbb permission
			array('permission.permission_set', array('ROLE_MOD_FULL', 'm_new_andreask_giphyforphpbb')), // Give ROLE_MOD_FULL m_new_andreask_giphyforphpbb permission
			array('permission.permission_set', array('ROLE_USER_FULL', 'u_new_andreask_giphyforphpbb')), // Give ROLE_USER_FULL u_new_andreask_giphyforphpbb permission
			array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_new_andreask_giphyforphpbb')), // Give ROLE_USER_STANDARD u_new_andreask_giphyforphpbb permission
			array('permission.permission_set', array('REGISTERED', 'u_new_andreask_giphyforphpbb', 'group')), // Give REGISTERED group u_new_andreask_giphyforphpbb permission
			array('permission.permission_set', array('REGISTERED_COPPA', 'u_new_andreask_giphyforphpbb', 'group', false)), // Set u_new_andreask_giphyforphpbb to never for REGISTERED_COPPA

			// Add new permission roles
			array('permission.role_add', array('giphyforphpbb admin role', 'a_', 'a new role for admins')), // New role "giphyforphpbb admin role"
			array('permission.role_add', array('giphyforphpbb moderator role', 'm_', 'a new role for moderators')), // New role "giphyforphpbb moderator role"
			array('permission.role_add', array('giphyforphpbb user role', 'u_', 'a new role for users')), // New role "giphyforphpbb user role"
		);
	}
}
