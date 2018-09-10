<?php 

	if(array_key_exists("submit", $_POST)){

		$link = mysqli_connect("shareddb-i.hosting.stackcp.net","secretdi-3337ffc0","lpehhbtb8l","secretdi-3337ffc0");

		if(mysqli_connect_error()) {

			die ("Database Connection Error");

		}

		$error = "";

		if(!$_POST['email']) {

			$error .= "An email address is required<br>";

		}

		if(!$_POST['password']) {

			$error .= "A password is required<br>";

		}

		if($error != "") {

			$error = "<p>There were error(s) in your form:</p>".$error;

		} else {

			$query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($_POST['email'])."' LIMIT 1";

			$result = mysqli_query($link, $query);

			if(mysqli_num_rows($result) > 0) {

				$error = "That email address is taken.";

			} else {

				$query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";

				if(!mysqli_query($link, $query)){

					$error = "<p>Could not sign you upp - pleas try again later.</p>";

				} else {

					echo "Sign up successful";

				}
			}
		}
	
	}

?>

<div id="error"><?php echo $error; ?></div>

<form method="post">

	<input type="email" name="email" placeholder="Your Email">

	<input type="password" name="password" placeholder="Password">

	<input type="checkbox" name="stayLoggedIn" value=1>

	<input type="submit" name="submit" value="Sign Up!">	

</form>