<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Team_panels_model extends MY_Model {

	protected $table				= "team_panels";
	protected $key					= "team_panel_id";
	protected $date_format			= "datetime";
	
	protected $log_user				= TRUE;
	
	protected $set_created			= TRUE;
	protected $created_field 		= "team_panel_created_on";
	protected $created_by_field 	= "team_panel_created_by";
	
	protected $set_modified 		= TRUE;
	protected $modified_field 		= "team_panel_modified_on";
	protected $modified_by_field	= "team_panel_modified_by";
	
	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "team_panel_deleted";
	protected $deleted_field 		= "team_panel_deleted_on";
	protected $deleted_by_field 	= 'team_panel_deleted_by';
}