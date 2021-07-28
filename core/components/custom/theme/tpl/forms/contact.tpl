<br />
<form action="" method="post" class="form" id="contactForm">
    <input type="hidden" name="action" value="contactForm" />
    <input type="hidden" name="nospam" value="" />
    <input type="hidden" name="csrf_token" value="[[!csrfhelper? &key=`contact-form`]]">
    <div><label>Fullname:<br /><input type="text" name="fullname" value="[[!+fi.Fullname]]" /></label></div>
    <div><label>Email:<br /><input type="text" name="email" value="[[!+fi.email]]" /></label></div>
 	<div>
	    <label>
	    	Message:<br />
	    	<textarea name="text" id="text" cols="55" rows="7" value="[[!+fi.text]]">[[!+fi.text]]</textarea>
	    </label>
    </div>
    <br />
    <input type="submit" value="Send Contact Inquiry" />
    <div class="msg" style="display: none;"></div>
</form> 