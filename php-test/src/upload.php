<?php
$target_dir = "uploads/";
$filename = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $filename;

if ($_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
    echo "Upload failed. Error code: " . $_FILES["fileToUpload"]["error"];
    exit;
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Uploaded: $target_file<br>";
    echo "<a href='$target_file'>View File</a>";
} else {
    echo "Failed to move uploaded file.";
}
?>
