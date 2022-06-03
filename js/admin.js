$(function() {
    if ($('#all_links').is(':checked')) {
	$('#new-link-option').hide();
    }

    $('#all_links').click(function() {
	if ($(this).is(':checked')) {
	    $('#new-link-option').fadeOut(2000);
	} else {
	    $('#new-link-option').fadeIn(2000);
	}
    });
});
