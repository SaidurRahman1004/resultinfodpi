<?php
require_once 'fpdf/fpdf.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resultinfo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['roll'])) {
    $roll = $_GET['roll'];
    $sql = "SELECT * FROM resultinfo WHERE Roll = '$roll'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(0, 10, "Student Result", 1, 1, 'C');
        $pdf->Ln(10);
        foreach ($row as $key => $value) {
            $pdf->Cell(50, 10, $key, 1);
            $pdf->Cell(140, 10, $value, 1, 1);
        }

        $pdf->Output();
    } else {
        echo "No data found";
    }
} else {
    echo "Invalid request";
}
?>
