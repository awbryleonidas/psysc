$(document).ready(function() {
	// var opts=$("#select-departments").html(), opts2="<option></option>"+opts;
	// $("select.populate-departments").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts2:opts); });
 //   	$("#departments").select2();
 //    // console.log(default_departments);
 //    if (default_departments)
 //        $('#departments').data().select2.updateSelection(default_departments);

    var opts=$("#select-groups").html(), opts2="<option></option>"+opts;
	$("select.populate-groups").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts2:opts); });
   	$("#user_groups").select2();
    $('#user_groups').data().select2.updateSelection(default_groups);

    set_form();
});