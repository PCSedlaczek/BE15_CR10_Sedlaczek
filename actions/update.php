<?php
require_once "connect.php";
require_once "upload.php";

if ($_POST) {
  $type = $_POST["type"];
  $ISBN = $_POST["ISBN"];
  $title = $_POST["title"];
  $subtitle = $_POST["subtitle"];
  $series = $_POST["series"];
  $part = $_POST["part"];
  $author_first_name = $_POST["author_first_name"];
  $author_last_name = $_POST["author_last_name"];
  $publisher_name = $_POST["publisher_name"];
  $publisher_city = $_POST["publisher_city"];
  $edition_date = $_POST["edition_date"];
  $edition_year = $_POST["edition_year"];
  $publish_year = $_POST["publish_year"];
  $pages = $_POST["pages"];
  $length = $_POST["length"];
  $version = $_POST["version"];
  $narrator = $_POST["narrator"];
  $genre = $_POST["genre"];
  $language = $_POST["language"];
  $description = $_POST["description"];
  $cover = $_POST["cover"];
  $id = $_POST["id"];

  // initialise variable for cover upload errors
  $uploadError = "";

  $cover = upload($_FILES["cover"]);
  $values = "
    type = '$type',
    ISBN = '$ISBN',
    title = '$title',
    subtitle = '$subtitle',
    series = '$series',
    part = $part,
    author_first_name = '$author_first_name',
    author_last_name = '$author_last_name',
    publisher_name = '$publisher_name',
    publisher_city = '$publisher_city',
    edition_date = '$edition_date',
    edition_year = $edition_year,
    publish_year = $publish_year,
    pages = $pages,
    length = '$length',
    version = '$version',
    narrator = '$narrator',
    genre = '$genre',
    language = '$language',
    description = '$description'";

  if ($cover->error === 0) {
    ($_POST["cover"] == "cover.png") ?: unlink("../img/$_POST[cover]");
    $sql = "UPDATE media SET $values, cover = '$cover->fileName' WHERE id = $id";
  } else {
    $sql = "UPDATE media SET $values WHERE id = $id";
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