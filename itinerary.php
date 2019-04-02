<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Package Page</title>
  </head>
  <body>
    <?php
    session_start();
    include("config.php");

    if (isset($_POST["search"])){

      if ( $_POST["travel"] == "" || $_POST["travel"] == "" || $_POST["city"] == ""){
        $message = "Invalid inputs";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo '<br><a href="login.html" class="button">Login Again</a><br>';
      }else{

          echo "Hi " . $_SESSION["namename"] . ",<br>";

          $name = $_SESSION["namename"];
    			$travel = $_POST["travel"];
    			$ret = $_POST["ret"];
    			$city = $_POST["city"];
          $package = $_POST["package"];

          $to = "flightco101@gmail.com"; // this is the company Email address, password is Test123;
          $from = $_SESSION["emailemail"]; // this is the sender's Email address

          $subject = "Form submission";

          $packValue = "";
          if ($package == 1){
              $packValue = "Hotel and Flight";
          }
          else if ($package == 2){
              $packValue = "Car and Flight";
          }else{
              $packValue = "Hotel and Car";
          }

          $headers = "From: " . $from . "\r\n";

          $message = $name . " chooses the follow package:" . "\n\n" . $packValue . " at " . $city . "\n\n From " . $travel .  " to " . $ret ;




          $sql = "INSERT INTO info (username, travel, ret, city, package) VALUES ('$name', '$travel', '$ret', '$city', $package)";

          if ($conn->query($sql)===TRUE){
            mail($to,$subject,$message, $headers);
            echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";


    			}
    			else{
    				echo "Submission Failed.";
            echo '<p><a href="login.html">Log in again to resubmit.</a></p>';
    			}
      }
    }
    ?>

		<p><a href="logout.php">Logout</a></p>

  </body>
</html>
