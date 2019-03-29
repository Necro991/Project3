<!Doctype html>
<html>
	<head>
		<title>Login Page</title>
	</head>
	<body>
		<?php
			//Start the session, call this in every page you want to use session variables
			session_start();
			
			include("config.php");
			$username = $_POST["user"];
			$password = $_POST["pass"];
			
			$sql = "SELECT name FROM user WHERE username = '$username' AND password = '$password'";
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					//Calling the session here allows you to make what are effecively global variables that can be called in any other php files after using this.
					$_SESSION["namename"] = $row["name"];
					echo "Welcome " . $row["name"]. "<br>";
				}
			}
			else 
				echo "0 results";
			
			//$conn->close();
			
			//header("Location: welcome.php");
		?>
	</body>
</html>