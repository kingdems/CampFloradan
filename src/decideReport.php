<html>

<head>

</head>
<body>
<?php
session_start();
$servername = "127.0.0.1";
$accrec = $_POST["accrec"];
$mail = $_POST["maillist"];
$att = $_POST["attendance"];
$exp = $_POST["expenses"];
$pool = $_POST["pool"];

$conn = mysqli_connect("127.0.0.1", "root", "", "campfloradan");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

require("fpdf.php");

set_include_path("C:\xampp\php\PEAR");

$pdf = new FPDF('p','mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);

if($pool = "pool"){

    $pdf->cell(40,10,"Last Name", 1, 0, 'C');

    $pdf->OutPut();

}

echo $accrec;
echo $mail;
echo $att;
echo $exp;
echo $pool;


?>

</div>
</body>

</html>
