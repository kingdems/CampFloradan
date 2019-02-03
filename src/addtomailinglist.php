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
$accRecID = NULL;
$payID = NULL;
$genvar = NULL;

//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//setting group
if($gender == "male"){
    $genvar = "B";
    }
else{
    $genvar = "G";
    }
$campGroup = NULL;
echo"<br>$grade<br>";
    if ($grade == "kindergarten" or $grade == "1"){
         $groupvar = "Group 1";
         $campGroup = $groupvar;
    }
    else if($grade == "2" or $grade == "3"){
             $groupvar = $genvar . "2";
             $campGroup = $groupvar;
                 }
                 else if($grade == "4" or $grade == "5"){
                              $groupvar = $genvar . "3";
                              $campGroup = $groupvar;
                                  }
                                  else if($grade == "6" or $grade == "7"){
                                               $groupvar = $genvar . "4";
                                               $campGroup = $groupvar;
                                                   }
                                                   else if($grade == "8" or $grade == "9"){
                                                                $groupvar = "CIT" . $genvar;
                                                                $campGroup = $groupvar;
                                                                    }
// Create camper inside campers table
$sql = "INSERT INTO campers (fname, lname, age, campGroup, emgnum, grade) VALUES ('$fname', '$lname', '$age', '$campGroup', '$emgNum','$grade')";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "SELECT camperID FROM campers WHERE fname = '$fname' AND lname = '$lname'";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

$ID = $conn->query($sql);
$row = $ID->fetch_assoc();
//echo "<br>$row["id"]<br>";
//Setting other ID's
//echo row["camperID"];
$ID = $row["camperID"];
$accRecID = $row["camperID"];
$poolID = $row["camperID"];
$payID = $row["camperID"];

//insert other ID's
$sql = "UPDATE campers SET accRecID = '$accRecID'  WHERE camperID = '$ID'";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "UPDATE campers SET PoolID = '$accRecID'  WHERE camperID = '$ID'";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "UPDATE campers SET payID = '$payID'  WHERE camperID = '$ID'";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "INSERT INTO pool (poolID) VALUES ('$poolID')";
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