<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$section = $_POST["section"];
//$pmtnum = $_POST["pmtnum"];
$lname = $_POST["lname"];
$fname = $_POST["fname"];
$amt = $_POST["amt"];

//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "select accRecID from campers where lname = '$lname' AND fname = '$fname'";
$ID = $conn->query($sql);
$row = $ID->fetch_assoc();
$data = $row['accRecID'];

if($section ==  "Payment"){
    $sql = "SELECT paymentTotal FROM accountsrecievable WHERE accrecID = '$data'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $pmtTot = $row["paymentTotal"];
    $Amount = $pmtTot + $amt;

    $sql = "UPDATE accountsrecievable set paymentTotal = $Amount WHERE accrecID = '$data'";
    if (!mysqli_query($conn, $sql)){
    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
if($section ==  "Transportation"){

    $sql = "UPDATE accountsrecievable set transportation = $amt WHERE accrecID = '$data'";
    if (!mysqli_query($conn, $sql)){
    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
if($section ==  "Tuition"){

    $sql = "UPDATE accountsrecievable set tuition = $amt WHERE accrecID = '$data'";
     if (!mysqli_query($conn, $sql)){
        	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        }
}
/*$sql = "SELECT * from accountsrecievable WHERE accrecID = '$data'";
$result = $conn->query($sql);
echo $result;*/
$sql = "SELECT * FROM accountsrecievable WHERE accrecID = '$data'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Transportation: " . $row["transportation"]. " - Tuition: " . $row["tuition"]. "<br>";
        $tuition1 = $row["tuition"];
        echo "Tuition: " . $tuition1. "<br>";
        $transportation1 = $row["transportation"];
        echo "Transportation: " . $transportation1. "<br>";
        $Total = $tuition1 + $transportation1;
        echo "Total: " . $Total. "<br>";
        $netTotal = $Total - $row["paymentTotal"];
        echo "netTotal: " . $netTotal. "<br>";
        echo "accrecID: " . $data. "<br>";

        $sql = "UPDATE accountsrecievable SET total = '$Total' WHERE accrecID = '$data'";
        //$result = $conn->query($sql);
        if (!mysqli_query($conn, $sql)){
                	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                }
               $sql = "UPDATE accountsrecievable SET netTotal = '$netTotal' WHERE accrecID = '$data'";
                       //$result = $conn->query($sql);
                       if (!mysqli_query($conn, $sql)){
                               	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                               }
    }
} else {
    echo "0 results";
}
/*
if (result->num_rows > 0){
    $row = result->fetch_assoc();
    $Total = $row["transportation"] + $row["tuition"];
    $netTotal = $Total - $row["paymentTotal"];
}
else{
    echo "NOTHING IN ACCOUNTSRECIEVABLE TO ADD HERE!!!!";
}
$sql = "UPDATE accountsrecievable set total = '$Total' AND netTotal = '$netTotal' WHERE accrecID = '$data'";

if (!mysqli_query($conn, $sql)){
        	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        }
*/
header("location: reports.html");

mysqli_close($conn);
?>

</body>
</html>