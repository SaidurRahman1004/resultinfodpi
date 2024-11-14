<?php
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
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Student Result</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="style.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
        </head>
        <body>
            <div class="container text-center">
                <h2 class="my-4">Student Result</h2>
                <div class="result-box">
                    <a href="index.php" class="btn btn-secondary mt-1"><-</a>
                    <center><p><strong style="color: red;"><?php echo $row['Institute']; ?></strong> </p></center>
                    <p><strong>Name:</strong> <?php echo $row['Name']; ?></p>
                    <p><strong>Roll:</strong> <?php echo $row['Roll']; ?></p>
                    <p><strong>RegNo:</strong> <?php echo $row['RegNo']; ?></p>
                    <p><strong>Session:</strong> <?php echo $row['Seassion']; ?></p>
                    <p><strong>Shift:</strong> <?php echo $row['Shift']; ?></p>
                    <p><strong>Department:</strong> <?php echo $row['Department']; ?></p>
                   <center> <h3 class="result-highlight">Result: <?php echo $row['Result']; ?><p>(5th Semester)</p></h3></center>
                    
                    <center><a href="generate_pdf.php?roll=<?php echo $roll; ?>" class="btn btn-success mt-3">Download PDF</a></center>
                </div>
            </div>
        </body>
        </html>

        <?php
    } else {
        echo "<p class='text-center mt-5'>No student found with Roll Number $roll</p>";
        echo "<div class='text-center'><a href='index.php' class='btn btn-secondary mt-3'>Back</a></div>";
    }
    $conn->close();
} else {
    header("Location: index.php");
}
?>
