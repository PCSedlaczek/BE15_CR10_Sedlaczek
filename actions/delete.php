<?php
require_once "connect.php";

if ($_POST) {
  $id = $_POST["id"];
  $cover = $_POST["cover"];
  ($cover == "cover.png") ?: unlink("../img/$cover");

  $sql = "DELETE FROM media WHERE id = $id";
  if (mysqli_query($connect, $sql) === TRUE) {
    $class = "success";
    $message = "Successfully Deleted!";
  } else {
    $class = "danger";
    $message = "The entry was not deleted due to: <br>".$connect->error;
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
  <title>Delete</title>
  <link rel="stylesheet" href="../css/style.css">
  <?php require_once "../components/bootstrap.php"?>
</head>

<body class="bg-dark text-white">
  <div class="container my-4 w-75">
    <div class="mt-3 mb-3">
      <h1>Delete request response</h1>
    </div>
    <div class="alert alert-<?=$class?>" role="alert">
      <p><?=$message?></p>
      <a href="../index.php"><button class="btn btn-success" type="button">Home</button></a>
    </div>
  </div>
</body>

</html>