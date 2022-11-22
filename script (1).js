function submitData() {
    $(document).ready(function() {
       var data = {
          name: $("#name").val(),
          email: $("#email").val(),
          address: $("#address").val(),
          dob: $("#dob").val(),
          password: $("#password").val(),
          confirm_password: $("confirm_password").val(),
          action: $("#action").val(),
       };

       console.log(data)
       $.ajax({
          url: './register.php',
          type: 'post',
          data: data,
          success: function(response) {
             if (response == "Login Successful") {
                window.location.reload();
             }
          }
       });
    });
 }

