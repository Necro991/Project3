<!Doctype html>
<html>
	<head>
		<title>PHP Config</title>
	</head>
	<body>
		<?php
			$servername="localhost";
			$username="";
			$password="";
			$dbname="";

			//Create Connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			//Check Conncetion
			if ($conn->connect_error){
				die("Connection failed:".$conn->connect_error);
			}

			?>
	</body>
</html>
