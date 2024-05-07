<?php
 session_start();

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

  $var_poke = $_GET['Category_pokename'];
  $var_create = $_GET['Category_creator'];
  $var_episode = $_GET['Category_episode'];
  $var_format = $_GET['Category_format'];
  //echo $var_poke;
  //echo $var_create;

  // Get all the categories from category table
  //$sql = "SELECT * FROM `pokemon_individual_testor` WHERE pokemon_name = '".$var_poke."'";
  $sql = "SELECT * FROM team INNER JOIN pokemon_individual_testor ON team._id = pokemon_individual_testor.team_id WHERE pokemon_name = '".$var_poke."'";
  //Select * from Heatah_Fajita.team INNER JOIN Heatah_Fajita.pokemon_individual_testor ON team._id = pokemon_individual_testor.team_id WHERE pokemon_individual_testor.pokemon_name = 'Rhyperior';


  $all_categories = mysqli_query($conn,$sql);
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


  <div style="color:white" align="right" id="comp-llo3v1k7"><label style= "padding: 75px;">Filter by team name</label>

  <div class="RJZaGO">

  <form method="POST">
  <select name = "Category" id= "dropdown" id="collection_comp-llo3v1k7" data-testid="select-trigger" aria-required="false" aria-expanded="false">

  <option value="" disabled="" class="R4tv1w U5WS_f" selected="">Select team name</option>


      <?php 
        // use a while loop to fetch data 
        // from the $all_categories variable 
        // and individually display as an option
        while ($category = mysqli_fetch_array(
            $all_categories,MYSQLI_ASSOC)):; 
      ?>
        <option value="<?php echo $category["team_id"];
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
    <a></a>
    <br>
    <input type="submit" value="display team" name="submit">
  </form>
</div>
</div>

<h1 id = "team_name_main"; disabled="yes" style="font-size:40px; text-align: center">
   <?php
    if(isset($_POST['submit'])){
    $selected_val = $_POST['Category'];  // Storing Selected Value In Variable
    $sql2 = "SELECT team_name FROM team WHERE _id = '".$selected_val."'";
    $result2 = $conn->query($sql2);

    //$selected_team_name = "Fabio";

    if ($result2->num_rows > 0) 
    {
  // output data of each row
      while($row2 = $result2->fetch_assoc()) 
      {
        //echo "Team: " . $row2["team_name"]. " - Name: " . $row2["creator_name"]. " - Episode: " . $row2["debut_episode"]. "<br>";
        //$selected_team_name = $row2["team_name"];
        echo "" . $row2["team_name"] . "<br>";
      }
    } 
    else 
    {
          echo "0 results";

       }

    }
  ?>
</h1>

<p id = "team_desc_main"; style="font-size:20px; color: white; text-align: center">
<!-- Fabio team that replaces Azu with Aim&#39;s signature Amoongus set -->
<?php
    if(isset($_POST['submit'])){
    $selected_val = $_POST['Category'];  // Storing Selected Value In Variable

    $sql2 = "SELECT Description FROM team WHERE _id = '".$selected_val."'";
    $result2 = $conn->query($sql2);

    //$selected_Description = "Fabio team that replaces Azu with Aim&#39;s signature Amoongus set";

    if ($result2->num_rows > 0) 
    {
  // output data of each row
      while($row2 = $result2->fetch_assoc()) 
      {
        echo "" . $row2["Description"] . "<br>";
      }
    } 
    else 
    {
          echo "0 results";
       }

    }
  ?>
</p>

<div class = "container">

<ul class = "myUL">

<li style="float: left">

<p style="color: white; margin-top: 100px;">Creator:</p>
<p id = "team_creator_name_main"; style="color:#FFFFFF; ">
<?php
    if(isset($_POST['submit'])){
    $selected_val = $_POST['Category'];  // Storing Selected Value In Variable

    $sql2 = "SELECT creator_name FROM team WHERE _id = '".$selected_val."'";
    $result2 = $conn->query($sql2);

    //$selected_Description = "Fabio team that replaces Azu with Aim&#39;s signature Amoongus set";

    if ($result2->num_rows > 0) 
    {
  // output data of each row
      while($row2 = $result2->fetch_assoc()) 
      {
        echo "" . $row2["creator_name"] . "<br>";
      }
    } 
    else 
    {
          echo "0 results";
       }

    }
  ?>
</p>

</li>


<li style = "float: left">


<p>

<?php
    if(isset($_POST['submit'])){
    $selected_val = $_POST['Category'];  // Storing Selected Value In Variable

    $sql2 = "SELECT image_link FROM team WHERE _id = '".$selected_val."'";
    $result2 = $conn->query($sql2);

    //$selected_Description = "Fabio team that replaces Azu with Aim&#39;s signature Amoongus set";

    if ($result2->num_rows > 0) 
    {
  // output data of each row
      while($row2 = $result2->fetch_assoc()) 
      {
        //echo "" . $row2["creator_name"] . "<br>";
        $imageNumber = $row2["image_link"];
      }
    } 
    else 
    {
          //echo "0 results";
       }

    }
  ?>


<img src="<?php echo $imageNumber ?>" alt="" style="width:300px;height:270px;object-fit:cover" width="339" height="245" srcSet="<?php echo $imageNumber ?>" fetchpriority="high"/>
</p>

</li>



<li style = "float: left">

<p style="color:#FFFFFF; margin-top: 100px;">Format:</p>

  <p id = "team_format_main"; style="color:#FFFFFF;">

<?php
    if(isset($_POST['submit']))
    {
       $selected_val = $_POST['Category'];  // Storing Selected Value In Variable

      $sql2 = "SELECT format FROM team WHERE _id = '".$selected_val."'";
      $result2 = $conn->query($sql2);

       //$selected_Description = "Fabio team that replaces Azu with Aim&#39;s signature Amoongus set";

      if ($result2->num_rows > 0) 
      {
     // output data of each row
        while($row2 = $result2->fetch_assoc()) 
        {
          echo "" . $row2["format"] . "<br>";
        }
      } 
      else 
      {
          echo "0 results";
      }

    }
  ?>
</p>

</li>
</ul>
</div>


<p style="text-align: center; color:white;">Importable:</p>

<p style="text-align: center; color:white;"><a data-auto-recognition="true" href="https://pokepast.es/9a74b73b4ed48194" target="_blank" style="text-align: center" >
  <?php
    if(isset($_POST['submit'])){
    $selected_val = $_POST['Category'];  // Storing Selected Value In Variable

    $sql2 = "SELECT url FROM team WHERE _id = '".$selected_val."'";
    $result2 = $conn->query($sql2);

    //$selected_Description = "Fabio team that replaces Azu with Aim&#39;s signature Amoongus set";

    if ($result2->num_rows > 0) 
    {
  // output data of each row
      while($row2 = $result2->fetch_assoc()) 
      {
        //echo "" . $row2["url"] . "<br>";
        //$productId = 123;
        $url = $row2["url"];
        echo "<a target='_blank' href='$url'>$url</a>";
      }
    } 
    else 
    {
          echo "0 results";
       }

    }
  ?>
</a>
</p>


</body>
</html>


