<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$section = $_POST["section"];
$pmtnum = $_POST["pmtnum"];
$amt = $_POST["amt"];


$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$user = $_SESSION['user'];
// Create camper inside campers table
$sql = "INSERT INTO campers (fname, lname, age, emergencynumber) VALUES ('$fname', '$lname', '$age', '$emgNum')";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
//Enters address into residence table
$sql = "INSERT INTO residence(lname, address) VALUES ('$lname','$address')";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

  echo "<script type = 'text/javascript'>alert('Congrats! You created a added a camper! Tell your friends! :^D')</script>";
	header("location: reports.html");

mysqli_close($conn);
?>

</body>
</html>