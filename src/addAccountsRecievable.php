<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$section = $_POST["section"];
//$pmtnum = $_POST["pmtnum"];
$lname = $_POST["lname"];
$amt = $_POST["amt"];

//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "select accRecID from campers where lname = '$lname'";
$ID = $conn->query($sql);
$row = $ID->fetch_assoc();
$data = $row['accRecID'];

if($section ==  "Transportation"){

    $sql = "UPDATE accountsrecievable set transportation = $amt WHERE accrecID = '$data'";
    if (!mysqli_query($conn, $sql)){
    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
if($section ==  "Tuition"){

    $sql = "INSERT into accountsrecievable (tuition) VALUES ('$amt') ";
}


mysqli_close($conn);
?>

</body>
</html>