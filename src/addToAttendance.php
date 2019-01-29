<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$check = $_POST['attendance'];
$thing = $_POST['att_array'];


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

    echo "You selected $C boxes: ";
    for($i=0;$i < $C; $i++){
    echo "$check[$i] <br>";
    }
}


$sql = "select * from campers WHERE campGroup = '$group' ORDER BY 'lname' DESC"

if (!mysqli_query($conn, $sql)){
    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }

$data = mysqli_query($conn, $sql);

if(empty($check)){
    echo "NOTHING IN HERE";
    }
else{
    $C = count($check);

    echo "You selected $C boxes: ";
    for($i=0;$i < $C; $i++){
    echo "$check[$i] <br>";
    }
}



//header("location: reports.html");

mysqli_close($conn);
?>

</body>
</html>