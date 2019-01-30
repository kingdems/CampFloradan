<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$check = $_POST['attendance'];
$session_group = $_SESSION['group'];


//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "select * from campers WHERE campGroup = '$session_group' ORDER BY 'lname' DESC";

if (!mysqli_query($conn, $sql)){
    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }

$data = mysqli_query($conn, $sql);

//    if(mysqli_num_rows($data) > 0){
//
//    $C = count($data);
//
//     for($i=0;$i < $C; $i++){
//        echo "HERE <br>";
//    }
//}

    $C = count($check);

if(empty($check)){
    echo "NOTHING IN HERE";
    }
else{
    echo "You selected $C boxes: ";
    foreach($check as $name=>$val){
        echo "<br> $val";
//    echo "$check[$i] <br>";
    }
}

foreach($check as $name=>$val){
    $ID = $val;
    $sql = "SELECT daysInCamp FROM campers WHERE camperID = '$ID'";

    $att = mysqli_query($conn, $sql);
    $num = mysql_fetch_assoc($att);

    $num = $num + 1;

    $sql = "UPDATE `campers` SET `daysInCamp`= '$num' WHERE camperID = '$ID'";

    echo ' ' . $num . '';

    if (!mysqli_query($conn, $sql)){
        	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    echo '<br> Success';
}

//header("location: reports.html");

mysqli_close($conn);
?>

</body>
</html>