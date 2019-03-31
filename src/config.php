<!Doctype html>
<html>
	<head>
		<title>PHP Config</title>
	</head>
	<body>
		<?php
			$servername="localhost";
			$username="hnguyen154";
			$password="hnguyen154";
			$dbname="hnguyen154";

			//Create Connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			//Check Conncetion
			if ($conn->connect_error){
				die("Connection failed:".$conn->connect_error);
			}

			?>
	</body>
</html>
