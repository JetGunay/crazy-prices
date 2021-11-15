$(document).ready(function() {
  $("form").submit(function(event) {
    event.preventDefault();
    var email = $("#email").val();
    var submit = $("#submit").val();
    $(".form-message").load("mail.php", {
      email: email,
      submit: submit
    });
  });

  $('#email').on('keyup', function(){
      var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test(this.value)) {
          $.ajax({
              type: 'POST',
              url: 'success.php',
              success: function(result) {
                $('.form-message').html('Valid Email');
                console.log(result);
              },
          });
          $('.form-message').addClass('success');
          $('.form-message').removeClass('err');
        }
        else {
          $.ajax({
              type: 'POST',
              url: 'mail.php',
              success: function(result) {
                $('.form-message').html('Invalid Email');
                console.log(result);
              },
          });
          $('.form-message').addClass('err');
          $('.form-message').removeClass('success');
        }
  });

  $("button.login").click(function() {
    var client_parameter = true;
    window.location = "https://www.coral.co.uk?client=" + client_parameter;
  });
  $(".logo").click(function() {
    var betvalue_parameter = "8-1";
    window.location = "https://www.coral.co.uk?betvalue=" + betvalue_parameter;
  });

  $(".slidingDiv").hide();
  $(".show_hide").show();

  $('.show_hide').click(function(){
  $(".slidingDiv").slideToggle();
  });
});
