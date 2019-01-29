<html>

<head>

</head>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$group = $_POST["group"];


//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    $sql = "select * from campers WHERE campGroup = '$group'";
    if (!mysqli_query($conn, $sql)){
    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $data = mysqli_query($conn, $sql);

       echo  '<table width="750">';
       echo      '<colgroup><col><col><col></colgroup>';
       echo        '<tr>';
       echo         '<th>First Name</th>';
       echo         '<th>Last Name</th>';
       echo         '<th>Present</th>';
       echo    ' </tr>';

        $nums = mysqli_num_rows($data);
       if(mysqli_num_rows($data) > 0) {
            $data_row = mysqli_fetch_assoc($data);

            while($array_row = mysql_fetch_array($data)){
             echo     '<tr>';
             echo        '<td height="50">' . $array_row["fname"] . '</td>';
             echo        ' <td height="50">'. $array_row["lname"] . '</td>';
             echo        ' <td height="50">' ?> <input type = "checkbox" name="att" value=1 />  <?php echo '</td>';
             echo    ' </tr>';
       }
       }

    echo '</table>';
    ?>
</div>
</body>

</html>