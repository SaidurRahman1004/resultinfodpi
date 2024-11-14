<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <h1 class="my-5">Student Result Checker</h1>
        <form action="result.php" method="get">
            <input type="text" name="roll" class="form-control mb-3" placeholder="Enter Roll Number" required>
            <button type="submit" class="btn btn-primary">Check Result</button>
        </form>
    </div>
</body>
</html>
