Dropzone.autoDiscover = false;
// or disable for specific dropzone:
// Dropzone.options.myDropzone = false;

$(function() {
	// Now that the DOM is fully loaded, create the dropzone, and setup the
	// event listeners
	// var myDropzone = new Dropzone("#dropzone");
	// myDropzone.on("complete", function(file) {
	//     if(file.xhr.responseText){
	//         var error = file.xhr.responseText;
	//         alert(error.replace(/(<([^>]+)>)/ig,""))
	//     }
	// });

	$("#dropzone").dropzone({
		maxFiles: 1,
	}).on("complete", function(file) {
		console.log(file);
		if (file.xhr.responseText){
			var error = file.xhr.responseText;
			alert(error.replace(/(<([^>]+)>)/ig,""))
		}
	});

 //    $("#dropzone").click(function() {
	// 	$(".dz-complete").hide();
	// });

	// $('#about_panel_duration').daterangepicker({timePicker: true, timePickerIncrement: 5, format: 'YYYY-MM-DD H:mm'});

	$('#about_panel_starts_on, #about_panel_ends_on').datetimepicker({
		format: 'yyyy-mm-dd hh:ii:ss',
		autoclose: true,
		todayBtn: true,
		pickerPosition: "bottom-left"
	});

	// brand
	$('#about_panel_brand').autocomplete({
		source: site_url + 'content/brands/search',
		minLength: 2,
	});
});