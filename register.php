<!Doctype html>
<html>
	<head>
		<title>Registration Page</title>
	</head>
	<body>
		<?php
			include("config.php");
			$name = $_POST["name"];
			$username = $_POST["user"];
			$password = $_POST["pass"];
			$question = $_POST["quest"];
			$answer = $_POST["ans"];
			$sql = "INSERT INTO user(name, username, password, question, answer) VALUES ('$name', '$username', '$password', '$question', '$answer')";
			if ($conn->query($sql)===TRUE){
				echo "Record Updated";
			}
			else{
				echo "Record Not Updated";
			}
		?>
		
		<a href="login.html" class="button">Continue to Login</a>
	</body>
</html>