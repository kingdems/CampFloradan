<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script

</head>

<body>
<?php
session_start();

//creating connection
$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>

    <div class = "sidenav">
        <img class="imgsize" src="camp.jpeg" />
        <a href="accountsRecievable.php">Accounts Recievable</a>
        <a href="mailingList.html">Mailing List</a>
        <a href="attendance.html">Attendance</a>
        <a href="expenses.html">Expenses</a>
        <a href="medical.html">Medical</a>
        <a href="pool.html">Pool</a>
        <a href="reports.html">Reports</a>
    </div>

<div class="main">

    <h1>Accounts Reciaveable</h1>
    <form action="addAccountsRecievable.php" method="post">
        <div class="form-group">
            <label for="section">What Section? </label>
            <select name="section" id="section">
                <option value="Tuition">Tuition</option>
                <option value="Transportation">Transportation</option>
                <option value="Payment">Payment</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pmtnum">Payment Number</label>
            <select name="pmtnum" id="pmtnum" disabled="">
                <option value="0">Does Not Apply</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" placeholder="Enter the last name" name="lname">
                </div>
        <div class="form-group">
            <label for="amt">Amount </label>
            <input type="text" class="form-control" id="amt" placeholder="Enter the amount" name="amt">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php

$sql = "select * from accountsrecievable ORDER BY dateAndTime ASC ";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

$data = mysqli_query($conn, $sql);

   echo  '<table width="750">';
   echo      '<colgroup><col><col><col></colgroup>';
   echo        '<tr>';
   echo         '<th>Date</th>';
   echo         '<th>Last Name</th>';
   echo         '<th>Net Total</th>';
   echo    ' </tr>';
   if(mysqli_num_rows($data) > 0) {
        $data_row = mysqli_fetch_assoc($data);
        //foreach ($data_row as $row){
        $ID = $data_row['accrecID'];
        while($row = mysql_fetch_array($data, MYSQL_ASSOC)){
        $sql = "SELECT lname from campers where accRecID = '$ID'";
        $info = mysqli_query($conn, $sql);
        $get_info = mysqli_fetch_assoc($info);
         echo     '<tr>';
         echo        '<td height="50">' . $data_row['dateAndTime'] . '</td>';
         echo        ' <td height="50">'. $get_info['lname'] . '</td>';
         echo        ' <td height="50">'. $data_row['netTotal'] . '</td>';
         echo    ' </tr>';
   //}
   }
   }
   /* echo    ' <tr>';
   echo         '<td height="50"></td>';
   echo        ' <td height="50"></td>';
   echo        ' <td height="50"></td>';
   echo  '  </tr>';
   echo    ' <tr>';
   echo        ' <td height="50"></td>';
   echo       '  <td height="50"></td>';
   echo        ' <td height="50"></td>';
   echo    ' </tr>';
*/
   echo ' </table>';
    ?>
</div>

</body>

</html>
<script type="text/javascript">

    let sec = document.getElementById("section");
    let pmt = document.getElementById("pmtnum");

    //console.log(sec.value);
    //console.log(pmt.value);
    sec.addEventListener('change', function(event){
        if(sec.value == "Payment") {
            pmt.disabled = !pmt.disabled;
            //console.log(pmt.disabled)
        }
        else{
            pmt.disabled = true;
            pmt.value = 0;
            //console.log("disable is on. set to true");
        }
    });
    sec.addEventListener('change', function(event){
        //alert("Value changed");
    });


</script>