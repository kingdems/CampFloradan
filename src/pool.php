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

<div class = "sidenav">
    <img class="imgsize" src="camp.jpeg" />
    <a href="accountsRecievable.php">Accounts Recievable</a>
    <a href="mailingList.html">Mailing List</a>
    <a href="attendance.html">Attendance</a>
    <a href="expenses.php">Expenses</a>
    <a href="pool.html">Pool</a>
    <a href="reports.html">Reports</a>
</div>

<div class="main">

    <h1>Pool List</h1>

    <form action="createSG.php" method="post">
        <div class="form-group">
            <label for="lname">Last Name </label>
         <input type="text" class="form-control" id="lname" placeholder="Search by the Last Name" name="lname">
        </div>
        <div class="form-group">
            <label for="fname">First Name </label>
            <input type="text" class="form-control" id="fname" placeholder="Search by the First Name" name="fname">
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

</body>

</html>