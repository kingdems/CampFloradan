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

    if(mysqli_num_rows($data) > 0){

    $C = count($data);

     for($i=0;$i < $C; $i++){
        echo "HERE <br>";
    }
}


//
//if(mysqli_num_rows($data) > 0) {
//            //$data_row = mysqli_fetch_assoc($data);
//
//            while($row = mysqli_fetch_assoc($data)){
//             echo     '<tr>';
//             echo        '<td height="50">' . $row["fname"] . '</td>';
//             echo        ' <td height="50">'. $row["lname"] . '</td>';

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