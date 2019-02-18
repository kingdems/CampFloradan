<html>

<head>

</head>
<body>
<?php
session_start();
$servername = "127.0.0.1";
if(isset($_POST["accrec"])){
    $accrec = $_POST["accrec"];
    drawAccRec();
}
if(isset($_POST["maillist"])){
    $mail = $_POST["maillist"];
}
if(isset($_POST["attendance"])){
    $att = $_POST["attendance"];
}
if(isset($_POST["expenses"])){
    $exp = $_POST["expenses"];
}
if(isset($_POST["pool"])){
    $pool = $_POST["pool"];
}


$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function drawAccRec(){

    $conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <form action="reports.html" method="post">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
     echo  '<table width="750">';
           echo      '<colgroup><col><col><col><col><col><col><col></colgroup>';
           echo        '<tr>';
           echo         '<th>Name</th>';
           echo         '<th>Transportation</th>';
           echo         '<th>Tuition</th>';
           echo         '<th>Total</th>';
           echo         '<th>Payments</th>';
           echo         '<th>Net Total</th>';
           echo         '<th>Last Updated</th>';
           echo    ' </tr>';

        $sql = "SELECT * FROM accountsrecievable";
        $data = mysqli_query($conn,$sql);

           if(mysqli_num_rows($data) > 0) {
                //$data_row = mysqli_fetch_assoc($data);


                 while($row = mysqli_fetch_assoc($data)){

                $ID = $row["accrecID"];
                 $sql = "SELECT fname FROM campers WHERE accrecID = '$ID'";
                 $info = mysqli_query($conn, $sql);
                 $fname_get = mysqli_fetch_assoc($info);
                 $sql = "SELECT lname FROM campers WHERE accrecID = '$ID'";
                 $info = mysqli_query($conn, $sql);
                 $lname_get = mysqli_fetch_assoc($info);
                 echo     '<tr>';
                 echo        '<td height="50">' . $fname_get['fname'] . ' ' . $lname_get['lname'] . '</td>';
                 echo        ' <td height="50">'. $row["transportation"] . '</td>';
                 echo        ' <td height="50">'. $row["tuition"] . '</td>';
                 echo        ' <td height="50">'. $row["total"] . '</td>';
                 echo        ' <td height="50">'. $row["paymentTotal"] . '</td>';
                 echo        ' <td height="50">'. $row["netTotal"] . '</td>';
                 echo        ' <td height="50">'. $row["dateAndTime"] . '</td>';
                 echo    ' </tr>';
                }
                }


}




?>

</div>
</body>

</html>
