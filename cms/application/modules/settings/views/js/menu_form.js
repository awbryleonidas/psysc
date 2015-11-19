$(document).ready(function() {
	$('#customer_birthday').datepicker({
		dateFormat: 'yy-mm-dd',
		autoclose: true,
		changeMonth: true,
      	changeYear: true,
      	maxDate: 0,
      	yearRange: '1900:c',
    });
	
	// $('.datepicker-select').datepickerSelect();
	
	// $('#guest_country').select2();
	// $.mask.definitions['~']='[+-]';
	// $('.guest_birthday_mask').mask('99-99-9999');
});