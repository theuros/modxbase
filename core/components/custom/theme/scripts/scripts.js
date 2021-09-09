// @prepros-prepend functions.js
// @prepros-prepend vendor/jquery.colorbox.js

$( document ).ready(function() {
	
});

// Lightbox - START
$(".lightbox").colorbox();
$(document).on('cbox_open', function() {
    $('body').css({ overflow: 'hidden' });
}).on('cbox_closed', function() {
    $('body').css({ overflow: '' });
});
// Lightbox - END

$(window).resize(function () {
    onResizeStop(function(){

    }, 500, "xyz");
});

// @prepros-append ../tpl/forms/contact.js