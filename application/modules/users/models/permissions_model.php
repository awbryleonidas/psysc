<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permissions_model extends MY_Model {
	
	protected $table		= "permissions";
	protected $key			= "permission_id";
	protected $soft_deletes	= false;
	protected $set_created	= false;
	protected $set_modified = false;
	protected $deleted 		= "permission_deleted";
}
