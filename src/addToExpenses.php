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
             $sql = "INSERT INTO expenses(nurses) VALUES ('$amt')";
             if (!mysqli_query($conn, $sql)){
                 echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
             }
            break;
    case "Salary Advances":
            echo "IN SA";
             $sql = "INSERT INTO expenses(salaryAdvance) VALUES ('$amt')";
             if (!mysqli_query($conn, $sql)){
                 echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
             }
            break;
    case "Snack":
            echo "IN SNACK";
            $sql = "INSERT INTO expenses(snack) VALUES ('$amt')";
            if (!mysqli_query($conn, $sql)){
                echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            break;
    case "Rainy Day":
            echo "IN RD";
             $sql = "INSERT INTO expenses(rainyDay) VALUES ('$amt')";
                    if (!mysqli_query($conn, $sql)){
                    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            break;
    case "GAS":
            echo "IN GAS";
             $sql = "INSERT INTO expenses(gas) VALUES ('$amt')";
                    if (!mysqli_query($conn, $sql)){
                    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            break;
    case "BBQ":
            echo "IN BBQ";
             $sql = "INSERT INTO expenses(bbq) VALUES ('$amt')";
                    if (!mysqli_query($conn, $sql)){
                    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            break;
    case "Sports":
            echo "IN SPORTS";
             $sql = "INSERT INTO expenses(sports) VALUES ('$amt')";
                    if (!mysqli_query($conn, $sql)){
                    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            break;
    case "A&C":
            echo "IN A&C";
             $sql = "INSERT INTO expenses(artsAndCrafts) VALUES ('$amt')";
                    if (!mysqli_query($conn, $sql)){
                    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            break;
    case "Misc":
            echo "IN MISC";
             $sql = "INSERT INTO expenses(misc) VALUES ('$amt')";
                    if (!mysqli_query($conn, $sql)){
                    	echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            break;

}

//sends to reports.html after this is done
header("location: reports.html");

mysqli_close($conn);
?>

</body>
</html>