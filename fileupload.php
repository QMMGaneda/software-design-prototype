<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
  $targetDirectory = "uploads/tenants/"; // Set your desired directory
  $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if the file is an image (you can add more checks here)
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check === false) {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Check file size (you can adjust this as needed)
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Check if file already exists (you can handle this differently)
  if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // If all checks are passed, move the file to the target directory
  if ($uploadOk === 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
      echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>
