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
<html>
<head>
    <title>Dropdown Menu Example</title>
</head>
<body>
    <label for="dropdown">Choose a new heading:</label>
    <select id="dropdown">
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
					
					<?php 
					echo $category["team_name"];
					echo '<span style="color:#FFF;text-align:center;">Request has been sent. Please wait for my reply!
					</span>';

						//echo $category['format']
						// To show the category name to the user
					?>

					
				</option>
			<?php 
				endwhile; 
				// While loop must be terminated
			?>
    </select>

    <h1 id="dynamicHeading">This heading will change</h1>

    <script>
        // Get a reference to the dropdown menu
        const dropdown = document.getElementById('dropdown');

        // Get a reference to the heading you want to change
        const heading = document.getElementById('dynamicHeading');

        // Add an event listener to the dropdown
        dropdown.addEventListener('change', function() {
            // Check which option is selected
            const selectedOption = dropdown.value;




            // Update the heading based on the selected option
            heading.textContent = selectedOption;
        });
    </script>

    <?php 

    echo '<span style="color:#AFA;text-align:center;">Request has been sent. Please wait for my reply!</span>';

    ?>
</body>
</html>
