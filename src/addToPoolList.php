<html>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$check = $_POST['pool'];
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

    $C = count($check);

if(empty($check)){
    echo "NOTHING IN HERE";
    }
else{
//    $camp_ar = explode(', ',$check[0]);
//    echo "<br> Array Sub 0 $camp_ar[0]";
//    echo "<br> You selected $C boxes: ";
    foreach($check as $name=>$val){
        $camp_ar = explode(', ',$val);
        echo "<br> $camp_ar";
        echo "<br> $val";

//    echo "$check[$i] <br>";
    }
}

//foreach($check as $name=>$val){
//    $ID = $val;
//
//    $sql = "SELECT * FROM pools WHERE poolID = '$ID'";
//    $data = mysqli_query($conn, $sql);
//    $row = mysqli_fetch_assoc($data);
//
//    $sql = "UPDATE pool SET poolend = '$val' WHERE poolID = '$ID'";
//            if (!mysqli_query($conn, $sql)){
//                    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
//                    }
//            }

//    echo 'NUMBER ' . $row["daysInCamp"] . '';
//    if($row["daysInCamp"] <= 0){
//        $sql = "UPDATE `campers` SET `daysInCamp`= 1 WHERE camperID = '$ID'";
//        if (!mysqli_query($conn, $sql)){
//                	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
//                }
//        }
//
//    else{
//
//        $sql = "UPDATE `campers` SET `daysInCamp`=`daysInCamp` + 1 WHERE camperID = '$ID'";
//
//        if (!mysqli_query($conn, $sql)){
//                echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
//            }
//        echo '<br> Success';
//    }
//}
//header("location: reports.html");

mysqli_close($conn);
?>

</body>
</html>