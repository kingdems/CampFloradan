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

$sql = "select * from accountsrecievable ORDER BY dateAndTime DESC ";
if (!mysqli_query($conn, $sql)){
	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <form action="createSG.php" method="post">
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

    <table width="750">
        <colgroup><col><col><col><col></colgroup>
        <tr>
            <th>Date</th>
            <th>Person</th>
            <th>Section</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td height="50"></td>
            <td height="50"></td>
            <td height="50"></td>
            <td height="50"></td>
        </tr>
        <tr>
            <td height="50"></td>
            <td height="50"></td>
            <td height="50"></td>
            <td height="50"></td>
        </tr>
        <tr>
            <td height="50"></td>
            <td height="50"></td>
            <td height="50"></td>
            <td height="50"></td>
        </tr>

    </table>
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