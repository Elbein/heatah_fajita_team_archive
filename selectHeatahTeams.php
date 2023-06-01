<!DOCTYPE html>
<html>
<style>
 table, th, td {
    border: 2px solid black;
 }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heatah";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//echo "hi";

//$input = $_POST['input'];

//$radio = $_POST['user'];

//EmployeeID, EmployeeName, EmployeeSalary, JobID, GroupID, isManager
//$sql = "SELECT EmployeeID, EmployeeName, EmployeeSalary, JobID, GroupID, isManager FROM Employees";
$sql = "SELECT * FROM creators";
$results = $conn->query($sql);

if ($results->num_rows > 0)
{
echo "creator_id   creator_name";
    while($entry = $results->fetch_assoc()) {
    echo "<br> ". $entry["creator_id"]. "  " .
                  $entry["creator_name"].
         "<br>";
    }
}
else
{
  echo "Error retrieving creators: " . $conn->error;
}

mysqli_close($conn);
?>
</html>
