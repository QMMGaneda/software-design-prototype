<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_FILES['file'])) {
  $file = $_FILES['file'];

  // File properties
  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_size = $file['size'];

  // File extension
  $file_ext = explode('.', $file_name);
  $file_actual_ext = strtolower(end($file_ext));

  // Allowed file extensions
  $allowed_ext = array('jpg', 'jpeg', 'png');

  if (in_array($file_actual_ext, $allowed_ext)) {
    if ($file_size < 10000000) { // Adjust the file size limit as needed
      $file_name_new = uniqid('', true) . '.' . $file_actual_ext;
      $file_destination = 'uploads/' . $file_name_new;

      if (move_uploaded_file($file_tmp, $file_destination)) {
        // Redirect to a success page after successful upload
        header("Location: success_page.html");
        exit;
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    } else {
      echo "File is too large.";
    }
  } else {
    echo "Invalid file type.";
  }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
//   $targetDirectory = "uploads/"; // Set your desired directory
//   $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
//   $uploadOk = 1;
//   $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//   // Check if the file is an image (you can add more checks here)
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if ($check === false) {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }

//   // Check file size (you can adjust this as needed)
//   if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
//   }

//   // Check if file already exists (you can handle this differently)
//   if (file_exists($targetFile)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
//   }

//   // If all checks are passed, move the file to the target directory
//   if ($uploadOk === 1) {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
//       echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
//     } else {
//       echo "Sorry, there was an error uploading your file.";
//     }
//   }
// }
?>
