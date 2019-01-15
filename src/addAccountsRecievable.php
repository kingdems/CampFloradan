<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$section = $_POST["section"];
$pmtnum = $_POST["pmtnum"];
$lname = $_POST["lname"];
$amt = $_POST["amt"];

//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if($section ==  "Transportation"){

    $sql = "INSERT into accountsrecievable (transportation) VALUES ('$amt') ";
}
if($section ==  "Tuition"){

    $sql = "INSERT into accountsrecievable (tuition) VALUES ('$amt') ";
}


mysqli_close($conn);
?>

</body>
</html>