<?php

	$error = "";
	$successMessage = "";

	if($_POST){

		if(!$_POST["email"]){

			$error .= "An email address is required.<br>";
		}

		if(!$_POST["subject"]){

			$error .= "A subject is required.<br>";
		}

		if(!$_POST["content"]){

			$error .= "A content field is required.<br>";
		}

		if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false){
			 $error .= "The email address is unvalid.<br>";
		}

		if($error != "") {
				$error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>'.$error.'</div>';
		} else {
			$emailTo = "miguel_rb25@hotmail.com";

			$subject = $_POST["subject"];

			$content = $_POST["content"];

			$headers = "From: ".$_POST["email"];

			if(mail($emailTo, $subject, $content, $headers)) {
				$successMessage = '<div class="alert alert-success" role="alert">Your message was sent we\'ll back at you ASAP!</div>';
			} else {
				$error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - please try again later</div>';
			}
		}


	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  
  </head>

  <body >
  	<div class="container">
  	<div id="error"><? echo $error.$successMessage; ?></div>
    <form method="post">
	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
	  </div>
	  <div class="form-group">
	    <label for="subject">Subject</label>
	    <input type="text" class="form-control" id="subject" name="subject">
	  </div>

	  <div class="form-group">
	    <label for="content">What would you like to ask us?</label>
	    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
	  </div>
	  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
	</form>
</div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$("form").submit(function (e) {
			
			//e.preventDefault();

			var error = "";

			if ($("#email").val() == ""){
				error+= "The email field is required.<br>";
			}

			if ($("#subject").val() == ""){
				error+= "The subject field is required.<br>";
			}


			if ($("#content").val() == ""){
				error+= "The content field is required.<br>";
			}

			if(error != "") {
				$("#error").html("<div class=\"alert alert-danger\" role=\"alert\"><p><strong>There were error(s) in your form:</strong></p>"+error+"</div>");
				return false;
			}else{
				return true;
			}
					
		});
	</script>  
  </body>
</html>
