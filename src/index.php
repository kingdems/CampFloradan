<html>
<body>

<?php
session_start();
var_dump($_POST["usernameLogin"]);
$username = $_POST["usernameLogin"];
$pwd = $_POST["pwdLogin"];
$db = "campfloradan";


$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$_SESSION['user'] = $username;

$pwd = crypt($pwd, '$2a$07$usesomesillystringforsalt$');
$sql = "SELECT ID FROM users WHERE username = '$username' and pwd = '$pwd'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

// If result matched $username and $pwd, table row must be 1 row


if($count == 1) {

	 header("location: reports.html");
}else {
	echo "Your Username or Password is invalid";
}




mysqli_close($conn);
?>

</body>
</html>