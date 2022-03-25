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
  $genres = $_POST["genre"];
  $genre = implode(", ", $genres);
  // echo $genre;
  $language = $_POST["language"];
  // echo $language;
  $description = $_POST["description"];

  // initialise variable for cover upload errors
  $uploadError = "";

  $cover = upload($_FILES["cover"]);
  
  $uploadError = "";

  // Function in the upload service
  $cover = upload($_FILES["cover"]);

  $sql = 
    "INSERT INTO media (type, ISBN, title, subtitle, series, part, author_first_name, author_last_name, publisher_name, publisher_city, edition_date, edition_year, publish_year, pages, length, version, narrator, genre, language, description, cover)
    VALUES ('$type','$ISBN','$title','$subtitle','$series','$part','$author_first_name','$author_last_name','$publisher_name','$publisher_city','$edition_date','$edition_year','$publish_year','$pages','$length','$version','$narrator','$genre','$language','$description','$cover->fileName')"; 

  if (mysqli_query($connect, $sql) === true) {
    $class = "success";
    $message = "The entry below was successfully created <br>
      <p>$type</p>
      <p>$ISBN</p>
      <p>$title</p>
      <p>$subtitle</p>
      <p>$series</p>
      <p>$part</p>
      <p>$author_first_name</p>
      <p>$author_last_name</p>
      <p>$publisher_name</p>
      <p>$publisher_city</p>
      <p>$edition_date</p>
      <p>$edition_year</p>
      <p>$publish_year</p>
      <p>$pages</p>
      <p>$length</p>
      <p>$version</p>
      <p>$narrator</p>
      <p>$genre</p>
      <p>$language</p>
      <p>$description</p>
      <hr>";
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
    <div class="alert alert-<?= $class ?>" role="alert">
      <p><?= ($message) ?? ""; ?></p>
      <p><?= ($uploadError) ?? "" ?></p>
      <a href="../index.php"><button class="btn btn-primary" type="button">Home</button></a>
    </div>
  </div>
</body>

</html>