<?php
require_once "connect.php";
require_once "upload.php";

if ($_POST) {
  $title = $_POST["title"];
  $subtitle = $_POST["subtitle"];
  $cover = $_POST["cover"];
  $id = $_POST["id"];
  //variable for upload cover errors is initialised
  $uploadError = "";

  $cover = upload($_FILES["cover"]);

  if ($cover->error === 0) {
    ($_POST["cover"] == "cover.png") ?: unlink("../img/$_POST[cover]");
    $sql = "UPDATE media SET title = '$title', subtitle = $subtitle, cover = '$cover->fileName' WHERE id = $id";
  } else {
    $sql = "UPDATE media SET title = '$title', subtitle = '$subtitle' WHERE id = $id";
  }
  if (mysqli_query($connect, $sql) === TRUE) {
    $class = "success";
    $message = "The record was successfully updated";
    $uploadError = ($cover->error != 0) ? $cover->ErrorMessage : "";
  } else {
    $class = "danger";
    $message = "Error while updating record: <br>" . mysqli_connect_error();
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
      <h1>Update request response</h1>
    </div>
    <div class="alert alert-<?=$class?>" role="alert">
      <p><?=($message) ?? ""?></p>
      <p><?=($uploadError) ?? ""?></p>
      <a href="../update.php?id=<?=$id?>"><button class="btn btn-warning" type='button'>Back</button></a>
      <a href="../index.php"><button class="btn btn-success" type="button">Home</button></a>
    </div>
  </div>
</body>

</html>