$(document).ready(function() {
	Dropzone.autoDiscover = false;
	$(".dropzone").dropzone({ 
		maxFiles: 1,
		init: function() {
			this.on("addedfile", function(file) {
				$(".dz-message").hide();
			});

			this.on("complete", function(file) {
				console.log('Completed');
			});
		}
	});
});