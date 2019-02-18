<html>

<head>

</head>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$accrec = $_POST["accrec"];
$mail = $_POST["maillist"];
$att = $_POST["attendance"];
$exp = $_POST["expenses"];
$pool = $_POST["pool"];

$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function drawAccRec($conn){
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

                 $sql = "SELECT * FROM campers WHERE accrecID = $row[accrecID]";
                 $info = mysqli_query($conn, $sql);
                 $name_get = mysql_fetch_assoc($info);

                 echo     '<tr>';
                 echo        '<td height="50">' . $name_get["fname"] . $name_get["lname"] . '</td>';
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
if($accrec == "accrec"){
    $report = "accrec";
    }
if($mail == "maillist"){
    $report = "mail";
    }
if($att == "attendance"){
    $report = "att";
    }
if($exp == "expenses"){
    $report = "exp";
    }
if($pool == "pool"){
    $report = "pool";
    }

switch($report){
    case "accrec":
        drawAccRec();
        echo "IN HERE";
        break;
    default:
        echo "Not Right";
        break;
}


echo $accrec;
echo $mail;
echo $att;
echo $exp;
echo $pool;


?>

</div>
</body>

</html>
