<html>
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

switch($section){
    case "Drivers":
        echo "IN DRIVERS";
        $sql = "INSERT INTO expenses(drivers) VALUES ('$amt')";
        if (!mysqli_query($conn, $sql)){
        	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        break;
    case "Nurses":
            echo "IN NURSES";
            break;
    case "Salary Advances":
            echo "IN SA";
            break;
    case "Snack":
            echo "IN SNACK";
            break;
    case "Rainy Day":
            echo "IN RD";
            break;
    case "GAS":
            echo "IN GAS";
            break;
    case "BBQ":
            echo "IN BBQ";
            break;
    case "Sports":
            echo "IN SPORTS";
            break;
    case "A&C":
            echo "IN A&C";
            break;
    case "Misc":
            echo "IN MISC";
            break;

}

//sends to reports.html after this is done
//header("location: reports.html");

mysqli_close($conn);
?>

</body>
</html>