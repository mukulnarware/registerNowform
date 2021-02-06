<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
<div id="login-module">
	
		<h4 class="sent-notification"></h4>

		<form id="myForm">
			<h2>Register Now!!</h2>

			<label>Enter Your Name</label>
			<input id="name" type="text" placeholder="Enter Name">
			<br><br>

			<label>Enter Username/Email</label>
			<input id="email" type="text" placeholder="Enter Email">
			<br><br>

			<label>Enter address</label>
			<input id="subject" type="text" placeholder=" Enter Address">
			<br><br>

			<p>Message</p>
			<textarea id="body" rows="5" placeholder="Type Message"></textarea>
			<br><br>

			<button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
		</form>
	
</div>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Email Sent Successfully.");
                        
                        
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
      