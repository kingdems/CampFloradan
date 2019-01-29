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

    $sql = "select * from campers WHERE campGroup = '$group' ORDER BY 'lname' DESC";
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


       if(mysqli_num_rows($data) > 0) {
            //$data_row = mysqli_fetch_assoc($data);

            while($row = mysqli_fetch_assoc($data)){
             echo     '<tr>';
             echo        '<td height="50">' . $row["fname"] . '</td>';
             echo        ' <td height="50">'. $row["lname"] . '</td>';
             echo        ' <td height="50">' ?> <input type = "checkbox" name="att[]" value=1 />  <?php echo '</td>';
             echo    ' </tr>';
       }
       }
?>
       <form action="addToAttendance.php" method="post">
       <button type="submit" class="btn btn-primary">Submit</button>
        </form>

<?php

    echo '</table>';

    $check = $_POST['att'];
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
    ?>
</div>
</body>

</html>