<!Doctype html>
<html>
	<head>
		<title>PHP Config</title>
	</head>
	<body>
		<?php
			$servername="localhost";
			$username="agould5";
			$password="agould5";
			$dbname="agould5";

			//Create Connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			//Check Conncetion
			if ($conn->connect_error){
				die("Connection failed:".$conn->connect_error);
			}

			?>
	</body>
</html>
