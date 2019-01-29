<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$check = $_POST['att'];


//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['att'])){
    echo "CHECKED!";
    }

if(!empty($_POST['att'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['att'] as $selected){
echo $selected."</br>";
}
}
echo "PAST ME";
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