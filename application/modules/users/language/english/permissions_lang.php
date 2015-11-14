<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Breadcrumbs
$lang['crumb_home']					= '<i class="fa fa-home"></i> Dashboard';
$lang['crumb_users']				= 'Users';
$lang['crumb_permissions']			= 'Permissions';

// Labels
$lang['label_permission']			= 'Permission Name';
$lang['label_simple']				= 'Simple (Options are "Deny" and "Allow" only)';
$lang['label_active']				= 'Active';

// Buttons
$lang['button_add_permission']		= 'Add Permission';
$lang['button_edit_this']			= 'Edit This';
$lang['button_update_permission']	= 'Update Permission';
$lang['button_delete_permission']	= 'Delete Permission';

// Index Function
$lang['index_heading']				= 'Permissions';
$lang['index_subhead']				= 'List of all user group permissions';
$lang['index_th_id']				= 'ID';
$lang['index_th_permission']		= 'Permission Name';
$lang['index_th_active']			= 'Active';
$lang['index_th_action']			= 'Action';
$lang['index_active']				= 'Active';
$lang['index_inactive']				= 'Inactive';
$lang['index_delete_confirm']		= 'Are you sure you want to delete this permission?';

// View Function 
$lang['view_heading']				= 'View Permission';
$lang['view_subhead']				= 'View permission information';

// Add Function 
$lang['add_heading']				= 'Add Permission';
$lang['add_success']				= 'Permission has been successfully added';
$lang['add_existing']				= 'Permission is already in the list';

// Edit Function
$lang['edit_heading']				= 'Edit Permission ';
$lang['edit_success']				= 'Permission has been successfully updated';

// Delete Function
$lang['delete_heading']				= 'Delete Permission';
$lang['delete_confirm']				= 'Are you sure you want to delete this permission?';
$lang['delete_success']				= 'Permission has been successfully deleted';

// Text 
$lang['text_instruction1']			= 'Do not add List and View, Add, Edit and Delete in the Method_name as these are added automatically.';
$lang['text_instruction2']			= 'FORMAT: <strong>Module_name.Controller_name.Method_name</strong>. Eg, Accounting.Entries.Approve';