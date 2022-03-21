<?php
require_once "connect.php";
require_once "upload.php";

if ($_POST) {
  $title = $_POST["title"];
  $subtitle = $_POST["subtitle"];
  $uploadError = "";
  // Function in the upload service
  $cover = upload($_FILES["cover"]);

  $sql = "INSERT INTO media (title, subtitle, cover) VALUES ('$title', '$subtitle','$cover->fileName')";

  if (mysqli_query($connect, $sql) === true) {
    $class = "success";
    $message = "The entry below was successfully created <br>
      <table class='table w-50'><tr>
      <td>$title</td>
      <td>$subtitle</td>
      </tr></table><hr>";
    $uploadError = ($cover->error != 0) ? $cover->ErrorMessage : "";
  } else {
    $class = "danger";
    $message = "Error while creating record. Try again: <br>".$connect->error;
    $uploadError = ($cover->error != 0) ? $cover->ErrorMessage : "";
  }
  mysqli_close($connect);
} else {
  header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Update</title>
  <?php require_once "../components/bootstrap.php"?>
</head>

<body>
  <div class="container">
    <div class="mt-3 mb-3">
      <h1>Create request response</h1>
    </div>
    <div class="alert alert-<?= $class; ?>" role="alert">
      <p><?php echo ($message) ?? ""; ?></p>
      <p><?php echo ($uploadError) ?? ""; ?></p>
      <a href="../index.php"><button class="btn btn-primary" type="button">Home</button></a>
    </div>
  </div>
</body>

</html>