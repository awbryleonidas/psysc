$(document).ready(function() {
    //$("body").tooltip({ selector: '[tooltip-toggle=tooltip]' });

    // disable caching of ajax content
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
        // $('.modal-body', this).empty();
    });

    // $("#modal").on("shown.bs.modal", function () {
    //     google.maps.event.trigger(map, "resize");
    // });


});