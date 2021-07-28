import './functions.js';

$( document ).ready(function() {
	
	console.log("ON DOCUMENT READY TEST"); 

});

$(window).resize(function () {
    onResizeStop(function(){

    	console.log("ON RESIZE STOP");

    }, 500, "xyz");
});