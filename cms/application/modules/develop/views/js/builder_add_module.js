/**
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
$(function() {
	$('#module_name_singular').keyup(function() {
		var table_name = $(this).val().replace(/\s+/g, '_').toLowerCase() + '_';
		$('.table-name').text(table_name);
	});

	$('#clone').click(function(){
		$('#row_template').clone().insertAfter($('.table_column').last());
	});
});

