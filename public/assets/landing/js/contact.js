jQuery(document).ready(function () {
  jQuery('#contact-form').on('submit', function (e) {

    $('.batton').html(
      '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Loading...'
    );

    jQuery.ajax({
      url: jQuery(this).attr('action'),
      data: jQuery(this).serialize(),
      type: 'POST',
      success: function (data) {
        $('.batton').prop('disabled', false);
        $('.batton').html('Book a Free Consultation');
       
        var name = jQuery('input[name="contact_name"]').val();
        var email = jQuery('input[name="email_address"]').val();
        var phone = jQuery('input[name="mobile_no"]').val();
        var service = jQuery('input[name="service"]').val();

        var url = "https://wa.me/97145299497?text="
        +"*Your Name :* "+name+"%0a"
        +"*Email :* "+email+"%0a"
        +"*Mobile :* "+phone+"%0a"
        +"*Service Required :* "+service;

        window.open(url,'_blank').focus();
        jQuery('#contact-form')[0].reset();
        // swal({
        //   title: "Thank You!",
        //   text: "Your request has been submitted successfully. We will contact to you soon.",
        //   icon: "success",
        //   timer: 2500
        // }).then(function () {
        //   jQuery('#contact-form')[0].reset();
        // });

      },
      error: function (data) {
        swal({
          title: "Oops...",
          text: "Something went wrong :(",
          icon: "error",
          timer: 2500
        })
      },

    });
    e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
  });
});