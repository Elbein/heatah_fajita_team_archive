
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





li a:hover {
  background-color: #111111;
}

.center { 
  height: 200px;
  position: relative;
}

.center p {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.center p {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.center p {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>
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
  <img src="member_banner.png" style="width: calc(100% - 80px);height: 460px; padding-left: 40px; object-fit: cover; fetchpriority="high">
  <h1 style = "text-align: center">How and Why I Did This</h1>
  <br>
  <br>

  <div class="center">
  <p>This is the first independent database project I have worked on.  What began a year ago as a little archive I kept in Notes has turned into one of my biggest passion projects yet.  This database has gone through several phases.  The more formal version started as a local mySQL project before being migrated to an AWS server as an RDS database.  That database was then hosted on the site you see in front of you to create this publicly accessible, searchable archive of over 500 competitive Pokémon teams. You can view my code on my github page, accessible via the button below. 
    <br> <br> 
  In the future, I plan to continue developing both the database and this site; adding more search features, improving the visuals, and if any more lost episodes of Heatah Fajita are recovered, preserving their teams here.  I will admit that while Pokémon and databases are passions of mine, web design is not.

</p>
</div>
<br>
<br>
<div style = "text-align: center">
<form style = "display: inline-block; text-align: center;" action="https://github.com/Elbein/heatah_fajita_team_archive">
    <input type="submit" value="Go to my Github" />
</form>
<form style = "display: inline-block; text-align: center;" action="https://www.linkedin.com/in/benjamin-horn-a565021ba/">
    <input type="submit" value="Go to my LinkedIn" />
</form>
</div>

</body>

</html>


