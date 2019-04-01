<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Credit Card</title>
  </head>
  <body>
	<?php
		session_start();

		include("config.php");
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
			}
		}
	?>
	<script>
		function validateCard(){
			var owner = document.getElementById("owner").value;
			var cvv = document.getElementById("cvv").value;
			var cardNum = document.getElementById("cardNumber").value;
			var address = document.getElementById("address").value;
			var baddress = document.getElementById("baddress").value;
			var phone = document.getElementById("phone").value;
			
			if(owner != "" && cvv != "" && cardNum != "" && address != "" && baddress != "" && phone != ""){
				alert("Payment Accepted, Redirecting...");
				window.location = "welcome.php";
			}
			else {
				alert("Payment Not Accepted");
			}
		}
	</script>
	<div class="creditCardForm">
    <div class="heading">
        <h1>Confirm Purchase</h1>
    </div>
    <div class="payment">
        <form>
            <div class="form-group owner">
                <label for="owner">Owner</label>
                <input type="text" class="form-control" id="owner">
            </div>
			<div>
				<label for="company">Company</label>
				<select>
					<option value="01">Mastercard</option>
					<option value="02">Visa</option>
				</select>
			</div>
            <div class="form-group CVV">
                <label for="cvv">CVV</label>
                <input type="text" pattern="[0-9]{3}" class="form-control" id="cvv">
            </div>
            <div class="form-group" id="card-number-field">
                <label for="cardNumber">Card Number</label>
                <input type="text" pattern="[0-9]{15,16}" class="form-control" id="cardNumber">
            </div>
            <div class="form-group" id="expiration-date">
                <label>Expiration Date</label>
                <select>
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select>
                    <option value="19"> 2019</option>
                    <option value="20"> 2020</option>
                    <option value="21"> 2021</option>
					<option value="21"> 2022</option>
					<option value="21"> 2023</option>
                </select>
            </div>
			<div>
				<label for="address">Address</label>
				<input type="text" class="form-control" id="address">
			</div>
			<div>
				<label for="address">Billing Address</label>
				<input type="text" class="form-control" id="baddress">
			</div>
			<div>
				<label for="address">Phone Number</label>
				<input type="text" pattern="[0-9]{10}" class="form-control" id="phone">
			</div>
            <div class="form-group" id="pay-now">
                <button type="button" onclick="validateCard()" class="btn btn-default" id="confirm-purchase">Confirm</button>
            </div>
			<div id="returnButton"></div>
        </form>
    </div>
</div>
  </body>
</html>
