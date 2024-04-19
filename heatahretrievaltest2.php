<?php

	// Connect to database 
	//$con = mysqli_connect("localhost","root","","Heatah_Fajita");
	$servername = "heatah-fajita-teams.cfxkylwbw80w.us-east-2.rds.amazonaws.com";
	$username = "admin";
	$password = "l4IJy2Nsp5TeqlVvIvMu";
	$database_name = "Heatah_Fajita";
	$conn = new mysqli($servername, $username, $password, $database_name);
	
	// mysqli_connect("servername","username","password","database_name")
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		echo("Connected successfully!");
	}

	// Get all the categories from category table
	$sql = "SELECT * FROM `team`";
	
	$all_categories = mysqli_query($conn,$sql);

	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0"> 
</head>
<body>
	<form method="POST">
		<label>Select a Team Name</label>
		<select name="Category">
			<?php 
				// use a while loop to fetch data 
				// from the $all_categories variable 
				// and individually display as an option
				while ($category = mysqli_fetch_array(
						$all_categories,MYSQLI_ASSOC)):; 
			?>
				<option value="<?php echo $category["_id"];
					// The value we usually set is the primary key
				?>">
					<?php echo $category["team_name"];
						// To show the category name to the user
					?>
				</option>
			<?php 
				endwhile; 
				// While loop must be terminated
			?>

		</select>
		<input type="submit" name="submit" value="Get Selected Values" />


		<br>
		<span id = "team_name_main"; style="font-size:46px;" class="wixui-rich-text__text">Fabio Origin with Offensive Amoongus</span>
		<br>
		<input type="submit" value="submit" name="submit">
	</form>


	<?php
		if(isset($_POST['submit'])){
		$selected_val = $_POST['Category'];  // Storing Selected Value In Variable

		

	// Get all the categories from category table
	//$stmt = $conn -> prepare("SELECT * FROM team WHERE _id = ?");
	//$all_categories = mysqli_query($conn,$sql);
		
		//$stmt = $mysql -> prepare("SELECT * FROM your_table WHERE user_id = ?");
		//$stmt = $mysqli -> prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");

// Bind the variable to the prepared statement
		//$stmt->bind_param("i", $selected_val);

// Execute the statement
		//$stmt->execute();

// Get the results
		//$result = $stmt->get_result();
		//$sqla = "SELECT * FROM `team` WHERE '_id' = $selected_val";
		//$one_category = mysqli_query($conn,$sqla);

		echo "You have selected: " .$selected_val;  // Displaying Selected Value

		$sql2 = "SELECT team_name, creator_name, debut_episode FROM team WHERE _id = '".$selected_val."'";
		$result2 = $conn->query($sql2);

		if ($result2->num_rows > 0) 
		{
  // output data of each row
  		while($row2 = $result2->fetch_assoc()) 
  		{
    		echo "Team: " . $row2["team_name"]. " - Name: " . $row2["creator_name"]. " - Episode: " . $row2["debut_episode"]. "<br>";
 	    }
		} 
		else 
		{
  				echo "0 results";
	    }

		}
	?>

	<?php 

	if(isset($POST['formSubmit']))
	{
		$varTnam = $_POST['Category'];
		$html = <<<EOT
<script>
   document.getElementById("team_name_main").textContent="$varTnam;
</script>
<div>
   The value of the variable is: $var
</div>
EOT;
	}


	?>

		<script>
			const dropdown = document.getElementById('Category');
			dropdown.addEventListener('change', function() {
				const selectedOption = dropdown.value;
				const heading = document.getElementById('team_name_main');
				heading.textContent = selectedOption;

			}
		</script>


	<?php

$var = "Hello World!";



echo $html;
?>
 <!--  <?php //echo 'document.getElementById("team_name_main").textContent=$varTnam;'; ?>

	<script>
		document.getElementById("team_name_main").textContent=$varTnam;
	</script>

	<br> -->

<!-- <form action="#" method="post">
<select name="Color">
<option value="Red">Red</option>
<option value="Green">Green</option>
<option value="Blue">Blue</option>
<option value="Pink">Pink</option>
<option value="Yellow">Yellow</option>
</select>
<input type="submit" name="submit" value="Get Selected Values" />
</form>
<?php
//if(isset($_POST['submit'])){
//$selected_val = $_POST['Color'];  // Storing Selected Value In Variable
//echo "You have selected: " .$selected_val;  // Displaying Selected Value
//}
?> -->

</body>
</html>
