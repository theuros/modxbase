<br />
<form action="" method="post" id="contactForm">
    <input type="hidden" name="script" value="contactForm" />
    <input type="hidden" name="nospam" value="" />
    <input type="hidden" name="csrf_token" value="{'!csrfhelper' | snippet : ['key'=>'contact-form']}">
    <div><label>Fullname *:<br /><input type="text" name="fullname" class="form-control" /></label></div>
    <div><label>Email *:<br /><input type="text" name="email" class="form-control" /></label></div>
 	<div>
	    <label>
	    	Message *:<br />
	    	<textarea name="text" rows="5" class="form-control"></textarea>
	    </label>
    </div>
    <br />
    
    <input type="submit" class="btn btn-primary" value="Pošlji" />
    <div class="spinner-border ms-3" role="status" style="display: none;">&nbsp;</div>

</form>

<style>
    #contactForm .error {
        border: 1px solid red;
        border-left-width: 4px;
    }    
</style>

<div class="modal fade" id="contactFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>