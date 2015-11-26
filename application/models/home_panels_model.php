<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_panels_model extends MY_Model
{

	protected $table				= "home_panels";
	protected $key					= "home_panel_id";
	protected $date_format			= "datetime";

	protected $log_user				= TRUE;

	protected $set_created			= TRUE;
	protected $created_field 		= "home_panel_created_on";
	protected $created_by_field 	= "home_panel_created_by";

	protected $set_modified 		= TRUE;
	protected $modified_field 		= "home_panel_modified_on";
	protected $modified_by_field	= "home_panel_modified_by";

	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "home_panel_deleted";
	protected $deleted_field 		= "home_panel_deleted_on";
	protected $deleted_by_field 	= 'home_panel_deleted_by';

}
