$(function() {
    var link_class = 'external-link';

    $('a[rel="external"]')
	.filter(function() {
	    return (this.hostname && this.hostname!=location.hostname);
	})
	.each(function() {
	    if ($(this).find('img').length>0) {
		$(this)
		    .click( function() {
			window.open($(this).attr('href'));
			return false;
		    });
	    } else {
		if (external_one_link) {
		    if (external_with_icon) {
			$(this).addClass(link_class);
			$(this).html($(this).html()+'&nbsp;<img src="'+external_links_image+'" class="external-link" alt="" title="'+external_links_title+'"/>');
		    }
		    $(this).click(function() {
			window.open($(this).attr('href'));
			return false;
		    });
		} else {
		    if (external_with_icon) {
			var icon = $('<a class="'+link_class+'" href="'+$(this).attr('href')+'">'+
			    '<img src="'+external_links_image+'" alt="" title="'+external_links_title+'"/></a>');
			icon.click(function() {
			    window.open($(this).attr('href'));
			    return false;
			});
			$(this).append('&nbsp;').after(icon);
		    }
		}
	    }
	});
});
