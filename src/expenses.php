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
    <a href="attendance.php">Attendance</a>
    <a href="expenses.php">Expenses</a>
    <a href="pool.php">Pool</a>
    <a href="reports.html">Reports</a>
</div>

<div class="main">

    <h1>Expenses</h1>
    <form action="addToExpenses.php" method="post">
        <div class="form-group">
            <label for="section">What Section? </label>
            <select name="section">
                <option value="Drivers">Drivers</option>
                <option value="Nurses">Nurses</option>
                <option value="Salary Advances">Salary Advances</option>
                <option value="Snack">Snack</option>
                <option value="Rainy Day">Rainy Day</option>
                <option value="Gas">Gas</option>
                <option value="BBQ">BBQ</option>
                <option value="Sports">Sports</option>
                <option value="A&C">A&C</option>
                <option value="Misc">Misc</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amt">Amount </label>
            <input type="text" class="form-control" id="amt" placeholder="Enter the amount" name="amt">
        </div>
<button type="submit" class="btn btn-primary">Submit</button>

    </form>
    <?php

    $sql = "select * from expenses ORDER BY entryDate DESC ";
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

       if(mysqli_num_rows($data) > 0) {
            $data_row = mysqli_fetch_assoc($data);
            $col_name = "";
            $sql = "SELECT * from expenses WHERE $col_name IS NOT NULL";

            for($i = 0; $i < 10; $i++){

                switch($i){
                    case 1:
                        $col_group = 'drivers';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                            }
                        break;
                    case 2:
                        $col_group = 'nurses';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    case 3:
                        $col_group = 'salaryAdvance';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    case 4:
                        $col_group = 'snack';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    case 5:
                        $col_group = 'rainyDay';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    case 6:
                        $col_group = 'gas';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    case 7:
                        $col_group = 'bbq';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    case 8:
                        $col_group = 'sports';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    case 9:
                        $col_group = 'artsAndCrafts';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    case 10:
                        $col_group = 'drivers';
                        $column = mysqli_query($conn, $sql);
                        if($column != NULL){
                            $info = $column;
                        }
                        break;
                    default:
                        echo 'ALL NULL';
                        break;
                }

            }

            for($x = 0; $x <1; $x++){
             echo     '<tr>';
             echo        '<td height="50">' . $data_row['entryDate'] . '</td>';
             echo        ' <td height="50">'. $data_row[$info] . '</td>';
             echo        ' <td height="50">'. $data_row['bbq'] . $data_row['drivers'] . '</td>';
             echo    ' </tr>';
       }
       }

    echo '</table>';
    ?>
</div>
</body>

</html>