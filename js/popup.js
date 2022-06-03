$(function() {
    $('#href', '#link-insert-form').focus();
    $('#link-insert-cancel').click(function() {
	window.close();
    });

    $('#link-insert-ok')
	.click(function() {
	    sendClose();
	    window.close();
	});

    function sendClose() {
	var insert_form = $('#link-insert-form').get(0);
	if (insert_form == undefined) { return; }

	var tb = window.opener.the_toolbar;
	var data = tb.elements.link.data;

	data.href = tb.stripBaseURL($('#href', insert_form).val());
	data.hreflang = $('#hreflang', insert_form).val();
	if ($('#external', insert_form).attr('checked')) {
	    data.external = 1;
	} else {
	    data.external = 0;
	}

	tb.elements.link.fncall[tb.mode].call(tb);
    };
});
