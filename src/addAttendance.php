<html>

<head>

</head>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$section = $_POST["section"];
$amt = $_POST["amt"];


//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    $sql = "select * from campers WHERE campGroup = '$section'";
    if (!mysqli_query($conn, $sql)){
    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $data = mysqli_query($conn, $sql);

       echo  '<table width="750">';
       echo      '<colgroup><col><col><col></colgroup>';
       echo        '<tr>';
       echo         '<th>Date</th>';
       echo         '<th>Section</th>';
       echo         '<th>Amount</th>';
       echo    ' </tr>';

        $nums = mysqli_num_rows($data);
       if(nums > 0) {
            $data_row = mysqli_fetch_assoc($data);

            for($x = 0; $x < nums; $x++){
             echo     '<tr>';
             echo        '<td height="50">' . $data_row['fname'] . '</td>';
             echo        ' <td height="50">'. $data_row['lname'] . '</td>';
             echo        ' <td height="50">' ?> <input type = "checkbox" name="att" value=1 />  <?php echo '</td>';
             echo    ' </tr>';
       }
       }

    echo '</table>';
    ?>
</div>
</body>

</html>