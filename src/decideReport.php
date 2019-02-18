<html>

<head>
        <link rel="stylesheet" href="style.css">
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
    drawMail();
}
if(isset($_POST["attendance"])){
    $att = $_POST["attendance"];
    drawAtt();
}
if(isset($_POST["expenses"])){
    $exp = $_POST["expenses"];
    drawExp();
}
if(isset($_POST["pool"])){
    $pool = $_POST["pool"];
    drawPool();
}


$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


function drawPool(){

    $conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <form action="reports.html" method="post">
    <button type="submit" class="btn btn-primary">Back</button>
    </form>
    <?php
     echo  '<table width="750">';
           echo      '<colgroup><col><col><col></colgroup>';
           echo        '<tr>';
           echo         '<th>Name</th>';
           echo         '<th>Pool End</th>';
           echo         '<th>Entry Date</th>';
           echo    ' </tr>';

        $sql = "SELECT * FROM pool ORDER BY lname DESC";
        $data = mysqli_query($conn,$sql);

           if(mysqli_num_rows($data) > 0) {
                //$data_row = mysqli_fetch_assoc($data);

                 while($row = mysqli_fetch_assoc($data)){


                 echo     '<tr>';
                 echo        '<td height="50">' . $row['lname'] . ', ' . $row['fname'] . '</td>';
                 echo        '<td height="50">' . $row['poolend'] . '</td>';
                 echo        '<td height="50">' . $row['entryDate'] . '</td>';
                 echo    ' </tr>';


                }
                }


}


function drawExp(){

    $conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <form action="reports.html" method="post">
    <button type="submit" class="btn btn-primary">Back</button>
    </form>
    <?php
     echo  '<table width="750">';
           echo      '<colgroup><col><col><col><col><col><col><col><col><col><col><col></colgroup>';
           echo        '<tr>';
           echo         '<th>Entry Date</th>';
           echo         '<th>Drivers</th>';
           echo         '<th>Nurses</th>';
           echo         '<th>Salary Advance</th>';
           echo         '<th>Snack</th>';
           echo         '<th>Rainy Days</th>';
           echo         '<th>Gas</th>';
           echo         '<th>BBQ</th>';
           echo         '<th>Sports</th>';
           echo         '<th>A & C</th>';
           echo         '<th>Misc</th>';
           echo    ' </tr>';

        $sql = "SELECT * FROM expenses ORDER BY entryDate DESC";
        $data = mysqli_query($conn,$sql);

           if(mysqli_num_rows($data) > 0) {
                //$data_row = mysqli_fetch_assoc($data);

                 while($row = mysqli_fetch_assoc($data)){


                 echo     '<tr>';
                 echo        '<td height="50">' . $row['entryDate'] . '</td>';
                 echo        '<td height="50">' . $row['drivers'] . '</td>';
                 echo        '<td height="50">' . $row['nurses'] . '</td>';
                 echo        '<td height="50">' . $row['salaryAdvance'] . '</td>';
                 echo        '<td height="50">' . $row['snack'] . '</td>';
                 echo        '<td height="50">' . $row['rainyDay'] . '</td>';
                 echo        '<td height="50">' . $row['gas'] . '</td>';
                 echo        '<td height="50">' . $row['bbq'] . '</td>';
                 echo        '<td height="50">' . $row['sports'] . '</td>';
                 echo        '<td height="50">' . $row['artsAndCrafts'] . '</td>';
                 echo        '<td height="50">' . $row['misc'] . '</td>';
                 echo    ' </tr>';


                }
                }


}


function drawAtt(){

    $conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <form action="reports.html" method="post">
    <button type="submit" class="btn btn-primary">Back</button>
    </form>
    <?php
     echo  '<table width="750">';
           echo      '<colgroup><col><col><col></colgroup>';
           echo        '<tr>';
           echo         '<th>Name</th>';
           echo         '<th>Group</th>';
           echo         '<th>Days in camp</th>';
           echo    ' </tr>';

        $sql = "SELECT * FROM campers ORDER BY campGroup DESC";
        $data = mysqli_query($conn,$sql);

           if(mysqli_num_rows($data) > 0) {
                //$data_row = mysqli_fetch_assoc($data);

                 while($row = mysqli_fetch_assoc($data)){


                 echo     '<tr>';
                 echo        '<td height="50">' . $row['fname'] . ' ' . $row['lname'] . '</td>';

                 echo        '<td height="50">' . $row['campGroup'] . '</td>';

                 echo        '<td height="50">' . $row['daysInCamp'] . '</td>';

                 echo    ' </tr>';


                }
                }


}

function drawMail(){

    $conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <form action="reports.html" method="post">
    <button type="submit" class="btn btn-primary">Back</button>
    </form>
    <?php
     echo  '<table width="750">';
           echo      '<colgroup><col><col><col></colgroup>';
           echo        '<tr>';
           echo         '<th></th>';
           echo         '<th></th>';
           echo         '<th></th>';
           echo    ' </tr>';

        $sql = "SELECT * FROM campers";
        $data = mysqli_query($conn,$sql);

           if(mysqli_num_rows($data) > 0) {
                //$data_row = mysqli_fetch_assoc($data);
            $i = 0;
            $j = 0;
            $x = 0;

                 while($row = mysqli_fetch_assoc($data)){

                $ID = $row["camperID"];
                 $sql = "SELECT address FROM residence WHERE resID = '$ID'";
                 $info = mysqli_query($conn, $sql);
                 $add_get = mysqli_fetch_assoc($info);
                 if($i == 0){
                 echo     '<tr>';
                 echo        '<td height="50">' . $row['fname'] . ' ' . $row['lname'] . '<br>' . $add_get["address"] . '</td>';
                 $i++;
                 }
                 else if($i == 1){
                                  echo        '<td height="50">' . $row['fname'] . ' ' . $row['lname'] . '<br>' . $add_get["address"] . '</td>';

                 $i++;
                 }
                 else if($i == 2){
                                  echo        '<td height="50">' . $row['fname'] . ' ' . $row['lname'] . '<br>' . $add_get["address"] . '</td>';

                 $i = 0;
                 echo    ' </tr>';
                 }

                }
                }


}



function drawAccRec(){

    $conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <form action="reports.html" method="post">
    <button type="submit" class="btn btn-primary">Back</button>
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
