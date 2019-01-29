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
             echo        ' <td height="50">' ?>
               <form action="addToAttendance.php" method="post">
             <input type = "checkbox" name="attendance[]" value=1 /><label>PRESENT</label>
             <?php echo '</td>';
             echo    ' </tr>';
       }
       }

       $att_array[] = $_POST("attendance");


?>

       <button type="submit" class="btn btn-primary">Submit</button>
        </form>


</div>
</body>

</html>