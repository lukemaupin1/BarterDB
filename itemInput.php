<?php
//include auth_session.php file on all user panel pages
include("authSession.php");
?>
<!DOCTYPE html>

<html>

<head>
	
	<title> BarterDB </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"> </script>
	<link rel="stylesheet" href="HomeStyle.css">
	<link rel="stylesheet" href="style.css">
	
	<style>
		.items {
			margin: 50px auto;
			width: 500px;
			padding: 30px 25px;
			background: white;
		}
		.BarterDB {
			font-size: 48px;
			font-weight: bold;
			text-align: center;
			padding-top: 10px;
		}
		items{display: table;}
		p{display: table-row}
		label{display: table-cell}
		input{display: table-cell}
	</style>
	
</head>
	
<body>
	<?php
		require('database.php');

		// When form is submitted, insert values into the database.
		if (isset($_REQUEST['itemName'])) {
			// Sanitize the inputs to prevent SQL injection
			$itemName = stripslashes($_REQUEST['itemName']);
			$itemName = mysqli_real_escape_string($con, $itemName);
			
			$description = stripslashes($_REQUEST['description']);
			$description = mysqli_real_escape_string($con, $description);
			
			$value = stripslashes($_REQUEST['value']);
			$value = mysqli_real_escape_string($con, $value);
			
			$quantity = (int) $_REQUEST['quantity'];

			// Insert item into the database
			$query = "INSERT INTO `items` (itemName, description, value) 
					  VALUES ('$itemName', '$description', '$value')"; 
			$result = mysqli_query($con, $query);

			if ($result) {
				// Get the last inserted itemID
				$itemid = mysqli_insert_id($con);

				// Insert into the 'owns' table to associate the user with the item
				$userid = $_SESSION['userid']; // Get the user ID from session
				$queryOwns = "INSERT INTO `owns` (userid, itemid, quantity) 
							  VALUES ('$userid', '$itemid', '$quantity')";
				$resultOwns = mysqli_query($con, $queryOwns);

				if ($resultOwns) {
					echo "<div class='form'>
						  <h3>Item added successfully to your account</h3><br/>
						  <p class='link'>Click to <a href='itemInput.php'>add another item</a></p>
						  </div>";
				} else {
					echo "<div class='form'>
						  <h3>There was an error associating the item with your account. Please try again.</h3><br/>
						  <p class='link'>Click to <a href='itemInput.php'>try again</a></p>
						  </div>";
				}
				} else {
					echo "<div class='form'>
						  <h3>There was an error adding the item. Please try again.</h3><br/>
						  <p class='link'>Click to <a href='itemInput.php'>try again</a></p>
						  </div>";
				}
			} else {
    // Form not submitted, display the input form
?>
	
	<div class="BarterDB"> <p> Input Items </p> </div>
	
	<form class="items" method="post" action="itemInput.php">
	<p>
        <label for="itemName">Item Name:</label>
        <input type="text" id="itemName" name="itemName" required><br><br>
	</p>
	<p>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>
	</p>
	<p>
        <label for="value">Value:</label>
        <input type="number" id="value" name="value" step="0.01" min="0" required><br><br>
	</p>
	<p>
		<label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br><br>
	</p>
        <input type="submit" value="Add Item">
    </div>
<?php
    }
?>
</body>

</html>