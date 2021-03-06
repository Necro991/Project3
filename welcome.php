<!Doctype html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="style.css" />
		<script src="cart.js" async></script>
	</head>
	<body>
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

		<?php

		session_start();

		include("config.php");

			if (isset($_POST["login"])){
				if ( $_POST["user"] == "" || $_POST["pass"] == "" ){
					$message = "Invalid inputs";
					echo "<script type='text/javascript'>alert('$message');</script>";
					echo '<br><a href="login.html" class="button">Go back to Login</a><br>
								<a href="register.html" class="button">New Account?</a>';
				}else{
							//Start the session, call this in every page you want to use session variables

							$username = $_POST["user"];
							$password = $_POST["pass"];

							$sql = "SELECT name FROM agency WHERE username = '$username' AND password = '$password'";

							$result = $conn->query($sql);

							if ($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
									//Calling the session here allows you to make what are effecively global variables that can be called in any other php files after using this.
									$_SESSION["namename"] = $row["name"];
									echo "Welcome " . $row["name"]. ",<br>";
									echo '<p><a href="logout.php">Logout</a></p>';
									echo '<form action="itinerary.php" method="post">
										<label>Date Travel:</label>
										<input id="TravelDate" type="date" name="travel"><br>

										<label>City</label>
										<input id="RetDate" type="text" name="city"><br>

										<label>Date Return:</label>
										<input type="date" name="ret"><br>

										<label>Package</label>
										<select name="package">
												<option onclick="flight = 250; updateCartTotal();" value="1">Hotel and Flight</option>
												<option onclick="flight = 500; updateCartTotal();" value="2">Car and Flight</option>
												<option onclick="flight = 1000; updateCartTotal();" value="3">Hotel and Car</option>
										</select><br>

										<input type="submit" name="search" value="Request Itinerary">

									</form>

									<h2>Additional Accessories for the Trip</h2>
									<section class="container content-section">

											<div class="shop-items">
									      <div class="shop-item">
									          <span class="shop-item-title">Blanket</span>
									          <img class="shop-item-image" src="blanket.jpg">
									          <div class="shop-item-details">
									              <span class="shop-item-price">$12.99</span>
									              <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
									          </div>
									      </div>
									      <div class="shop-item">
									          <span class="shop-item-title">Sleeping Mask</span>
									          <img class="shop-item-image" src="mask.jpeg">
									          <div class="shop-item-details">
									              <span class="shop-item-price">$12.99</span>
									              <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
									          </div>
									      </div>
									</section>
									<section class="container content-section">

							            <h2 class="section-header">CART</h2>
							            <div class="cart-row">
							                <span class="cart-item cart-header cart-column">ITEM</span>
							                <span class="cart-price cart-header cart-column">PRICE</span>
							                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
							            </div>
							            <div class="cart-items">
							            </div>
							            <div class="cart-total">
							                <strong class="cart-total-title">Total</strong>
							                <span class="cart-total-price" name="totalPrice">$250</span>
							            </div>

												 <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>

							    </section>';

								}
							}
							else{
								echo "Error";
							}


				}
			}

		?>



	</body>
</html>
