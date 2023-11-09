<!-- view_receipts.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Receipts</title>
</head>
<body>

<h1>Receipts Uploaded by Tenants</h1>

<?php
$targetDirectory = "uploads/";
$files = scandir($targetDirectory);

// Display each file as a link
foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        echo "<a href='$targetDirectory$file' target='_blank'>$file</a><br>";
    }
}
?>

</body>
</html>