<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$age = $_POST["age"];
$emgNum = $_POST["emgnum"];
$gender = $_POST["gender"];
$grade = $_POST["grade"];


$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//setting group
if($gender == "male"){
    $genvar = B;
    }
else{
    $genvar = G;
    }
$campGroup = NULL;
switch($grade){
    case (kindergarten || 1):
        $groupvar = "Group 1";
        $campGroup = $groupvar;
        break;
    case (2 || 3):
            $groupvar = $genvar . "2";
            $campGroup = $groupvar;
            break;
    case (4 || 5):
            $groupvar = $genvar . "3";
            $campGroup = $groupvar;
            break;
    case (6 || 8):
            $groupvar = $genvar . "4";
            $campGroup = $groupvar;
            break;
    case (8 || 9):
            $groupvar = "CIT" . $genvar;
            $campGroup = $groupvar;
            break;
}

// Create camper inside campers table
$sql = "INSERT INTO campers (fname, lname, age, campGroup, emergencynumber, grade) VALUES ('$fname', '$lname', '$age', '$campGroup', '$emgNum','$grade')";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "Select camperID FROM campers WHERE fname = $fname AND lname = $lname";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
//Setting other ID's
$ID = $sql
$accRecID = $ID
$payID = $ID

//insert other ID's
$sql = "INSERT INTO campers (accRecID, payID) VALUES ('$accRecID', '$payID')";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "INSERT INTO accountsrecievable (accrecID) VALUES ('$accRecID')";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "INSERT INTO payments (payID) VALUES ('$payID')";
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