<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$check = $_POST["att[]"];
//$pmtnum = $_POST["pmtnum"];
$lname = $_POST["lname"];
$fname = $_POST["fname"];
$amt = $_POST["amt"];

//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if(empty($check)){
    echo "NOTHING IN HERE";
    }
else{
    $C = count($check);

    echo ("You selected $C boxes: ");
    for($i=0;$i < $C; $i++;){
    echo ("$check[$i] <br>");
    }
}



//header("location: reports.html");

mysqli_close($conn);
?>

</body>
</html>