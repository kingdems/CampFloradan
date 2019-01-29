<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$check = $_POST['attendance'];


//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['attendance'])){
    echo "CHECKED!";
    }

if(!empty($_POST['attendance'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['attendance'] as $selected){
echo $selected."</br>";
}
}
echo "PAST ME <br>";
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