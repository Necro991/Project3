<!Doctype html>
<html>
	<head>
		<title>Registration Page</title>
	</head>
	<style>
form {
  text-align: center;
}
body {
	background-color:#FBFAF8;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
</style>
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
