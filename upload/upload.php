<?php
$uploadDir = '../upload/arrest_persons/';
$newFileName = uniqid('image_') . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
//$uploadedFile = $uploadDir . basename($_FILES['file']['name']);
$uploadedFile = $uploadDir . $newFileName;
// echo "<script>console.log('111111111111111======: " . json_encode($_FILES) . "');</script>";
// echo "<script>console.log('aaaaaaaaaaaa======: " . json_encode($uploadedFile) . "');</script>";
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFile)) {
  echo json_encode(['status' => true, 'filename' => $newFileName]);
} else {
  echo 'Error uploading file';
}
?>
