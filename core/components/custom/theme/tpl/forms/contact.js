var contactFormModal = new bootstrap.Modal(document.getElementById('contactFormModal'), {
    keyboard: false
});

$("#contactForm").submit(function(event) {
    event.preventDefault();
    var form = $(this);
    
    $.ajax({
        type: "POST",
        url: ajaxUrl,
        data: form.serialize(),
        beforeSend: function() {
            $("#contactForm input[type=submit]").prop("disabled",true);
            $("#contactForm .spinner-border").fadeIn();
            $('#contactForm *').removeClass("error");
        },
        success: function(json) {
            $("#contactForm input[type=submit]").prop("disabled",false);
            $("#contactForm .spinner-border").fadeOut();
            
            var data = JSON.parse(json);
            if(data.sent){
                contactFormModal.show();
                $('#contactForm').trigger("reset");
            } else {

                Object.entries(data.errors).forEach((entry) => {
                    const [key, value] = entry;
                    //console.log(`${key}: ${value}`);

                    $("#contactForm input[name=" + `${value}` + "], #contactForm textarea[name=" + `${value}` + "]").addClass("error");
                });

            }
            
        } 
    });
});
