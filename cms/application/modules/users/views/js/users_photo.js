/**
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
$(function() {
	Dropzone.autoDiscover = false;
	$("#dropzone").dropzone({
		maxFiles: 1,
	}).on("complete", function(file) {
		console.log(file);
		if (file.xhr.responseText){
			var error = file.xhr.responseText;
			alert(error.replace(/(<([^>]+)>)/ig,""))
		}
	});
});