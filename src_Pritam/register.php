<!Doctype html>
<html>
	<head>
		<title>Registration Page</title>
	</head>
	<body>
		<?php
			include("config.php");
			if (isset($_POST["register"])){
					if ($_POST["name"] == "" || $_POST["user"] == "" || $_POST["pass"] == "" || $_POST["email"] == "" ){
							echo "Fill in all the blanks";
					}
					else{
							$name = $_POST["name"];
							$username = $_POST["user"];
							$password = $_POST["pass"];
							$email = $_POST["email"];
							$sql = "INSERT INTO agency(name, username, password, email) VALUES ('$name', '$username', '$password', '$email')";
							if ($conn->query($sql)===TRUE){
								echo "Record Updated";
							}
							else{
								echo "Record Not Updated";
							}
					}
			}


		?>
		<br><a href="register.html" class="button">Go back to Sign Up</a><br>
		<a href="login.html" class="button">Continue to Login</a>
	</body>
</html>
