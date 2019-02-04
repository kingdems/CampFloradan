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
    <a href="attendance.php">Attendance</a>
    <a href="expenses.php">Expenses</a>
    <a href="pool.html">Pool</a>
    <a href="reports.html">Reports</a>
</div>

<div class="main">

    <h1>Pool List</h1>
    <form action="addPoolList.php" method="post">
         <div class="form-group">
             <label for="group">What Group? </label>
             <select name="group">
                 <option value="GroupOne">Group 1</option>
                 <option value="B2">B2</option>
                 <option value="G2">G2</option>
                 <option value="B3">B3</option>
                 <option value="G3">G3</option>
                 <option value="B4">B4</option>
                 <option value="G4">G4</option>
                 <option value="CITBOYS">CIT Boys</option>
                 <option value="CITGIRLS">CIT Girls</option>
             </select>
         </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


</body>

</html>