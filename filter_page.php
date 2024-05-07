<?php

  // Connect to database 
  //$con = mysqli_connect("localhost","root","","Heatah_Fajita");
  include "login.php";
  $conn = new mysqli($servername, $username, $password, $database_name);

  
  // mysqli_connect("servername","username","password","database_name")
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else
  {
    //echo("Connected successfully!");
  }

  // Get all the categories from category table
  $sqlname = "SELECT DISTINCT pokemon_name FROM `pokemon_individual_testor` ORDER BY pokemon_name ASC";
  $sqlcreator = "SELECT DISTINCT creator_name FROM `team` ORDER BY creator_name ASC";
  $sqlepisode = "SELECT DISTINCT debut_episode FROM `team` ORDER BY debut_episode ASC";
  $sqlformat = "SELECT DISTINCT format FROM `team`";
      $sql = "SELECT * FROM `team`";
  $all_categories = mysqli_query($conn,$sql);

  $pokename_categories = mysqli_query($conn,$sqlname);
  $creator_categories = mysqli_query($conn,$sqlcreator);
  $episode_categories = mysqli_query($conn,$sqlepisode);
  $format_categories = mysqli_query($conn,$sqlformat);

    session_start();
    if(isset($_SESSION['a'])){
        echo $_SESSION['a'];
    }
  
?>


<!DOCTYPE html>
<html>
<head>
<style>

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #black;
}

ul.myUL {
  display: inline-block;
  text-align: left;
}

li {
}

#ex1 {
  float: left;;
}

#ex2 {
  float: right;;
}


li a {
  display: block;
  color: white;
  text-align: right;
  padding: 16px;
  text-decoration: none;
}

a:visited {
  color: #cbddfb;
  background-color: transparent;
  text-decoration: none;
}

h1 {
  color: white;
  padding: 5px;
}

p {
  color: white;
  padding: 5px;
}

div.container {
  text-align: center;
}





li a:hover {
  background-color: #111111;
}
</style>
</head>

<body style="background-color:black;">

  <ul>
  <li><img src="heatah_logo.jpg" alt="team_icon" id = "ex1" style="width:60px;height:80px;object-fit:cover" width="60" height="80" fetchpriority="high"/></li>
  <li><h1 id = "ex1" padding: 5px>Heatah Fajita Archive</h1></li>
  <li><a id = "ex2" style="font-size:150%; margin-top: 15px; "href="filter_page.php">Filter Teams</a></li>
  <li><a id = "ex2" style="font-size:150%; margin-top: 15px; "href="view_teams.php">View Teams</a></li>
  <li><a style="font-size:150%; margin-top: 15px; "href="index.php">Home</a></li>
</ul>

</body>

<hr>

<body>


  <div style="color:white" align="center" id="comp-llo3v1k7"><label style= "padding: 75px;">Filter by:</label>

  <div class="RJZaGO">

  <form method="GET" action="filtered_teams.php">



  <select name = "Category_pokename" id= "pokename_dropdown" id="collection_comp-llo3v1k7" data-testid="select-trigger" aria-required="false" aria-expanded="false">

  <option value="" disabled="" class="R4tv1w U5WS_f" selected="">Pokemon name</option>


      <?php 
        // use a while loop to fetch data 
        // from the $all_categories variable 
        // and individually display as an option
        while ($name_category = mysqli_fetch_array(
            $pokename_categories,MYSQLI_ASSOC)):; 
            //$all_categories,MYSQLI_ASSOC)):; 

      ?>
        <option value="<?php echo $name_category["pokemon_name"];?>">
          <?php 
          echo $name_category["pokemon_name"];
          //echo $name_category["team_name"];
            // To show the category name to the user
          ?>
        </option>
      <?php 
        endwhile; 
        // While loop must be terminated
      ?>
    </select>

    <select name = "Category_creator" id= "creator_dropdown" aria-required="false" aria-expanded="false">

  <option value="" disabled="" class="R4tv1w U5WS_f" selected="">Creator name</option>

      <?php 
        // use a while loop to fetch data 
        // from the $all_categories variable 
        // and individually display as an option
        while ($create_category = mysqli_fetch_array(
            $creator_categories,MYSQLI_ASSOC)):; 
            //$all_categories,MYSQLI_ASSOC)):; 

      ?>
        <option value="<?php echo $create_category["creator_name"];?>">
          <?php 
          echo $create_category["creator_name"];
          //echo $name_category["team_name"];
            // To show the category name to the user
          ?>
        </option>
      <?php 
        endwhile; 
        // While loop must be terminated
      ?>
    </select>

<select name = "Category_episode" id= "episode_dropdown" aria-required="false" aria-expanded="false">

  <option value="" disabled="" class="R4tv1w U5WS_f" selected="">Debut Episode</option>

<?php 
        // use a while loop to fetch data 
        // from the $all_categories variable 
        // and individually display as an option
        while ($episode_category = mysqli_fetch_array(
            $episode_categories,MYSQLI_ASSOC)):; 
            //$all_categories,MYSQLI_ASSOC)):; 

      ?>
        <option value="<?php echo $episode_category["debut_episode"];?>">
          <?php 
          echo $episode_category["debut_episode"];
          //echo $name_category["team_name"];
            // To show the category name to the user
          ?>
        </option>
      <?php 
        endwhile; 
        // While loop must be terminated
      ?>
    </select>

    <select name = "Category_format" id= "format_dropdown" data-testid="select-trigger" aria-required="false" aria-expanded="false">

  <option value="" disabled="" class="R4tv1w U5WS_f" selected="">Format</option>

<?php 
        // use a while loop to fetch data 
        // from the $all_categories variable 
        // and individually display as an option
        while ($format_category = mysqli_fetch_array(
            $format_categories,MYSQLI_ASSOC)):; 
            //$all_categories,MYSQLI_ASSOC)):; 

      ?>
        <option value="<?php echo $format_category["format"];?>">
          <?php 
          echo $format_category["format"];
          //echo $name_category["team_name"];
            // To show the category name to the user
          ?>
        </option>
      <?php 
        endwhile; 
        // While loop must be terminated
      ?>
    </select>

    <a></a>
    <br>
    <input type="submit" value="Filter" name="submit">
  </form>
</div>
</div>

<br><br>

<div class="center" style="width: 80px; height: 20px; border: 5px black; background-color: lightgrey; color: black; padding: 10px; margin: auto" >
<header style="color:black">How to use:</header>
</div>

<br>

<div class="center" style="width: 400px; border: 5px black; background-color: lightgrey; color: black; padding: 10px; margin: auto" >
  <p style="color: black">Select a Pokemon name, team creator name, and/or debut episode name from the dropdown menus above.&nbsp; These will set filters on the team dropdown menus on the following page, for a more streamlined search of the teams

</p>
</div>


</body>
</html>


