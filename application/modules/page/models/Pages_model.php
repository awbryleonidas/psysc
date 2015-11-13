<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Pages_model Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Pages_model extends BF_Model 
{
	protected $table_name			= 'pages';
	protected $key					= 'page_id';
	protected $date_format			= 'datetime';
	protected $log_user				= TRUE;

	protected $set_created			= TRUE;
	protected $created_field		= 'page_created_on';
	protected $created_by_field		= 'page_created_by';

	protected $set_modified			= TRUE;
	protected $modified_field		= 'page_modified_on';
	protected $modified_by_field	= 'page_modified_by';

	protected $soft_deletes			= TRUE;
	protected $deleted_field		= 'page_deleted';
	protected $deleted_by_field		= 'page_deleted_by';
}