// @prepros-prepend functions.js

$( document ).ready(function() {
	
	console.log("ON DOCUMENT READY TEST 2"); 

});

$(window).resize(function () {
    onResizeStop(function(){

    	console.log("ON RESIZE STOP 2");

    }, 500, "xyz");
});

// @prepros-append ../tpl/forms/contact.js