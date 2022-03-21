<?php
require_once "connect.php";
require_once "upload.php";

if ($_POST) {
  $type = $_POST["type"];
  $isbn = $_POST["isbn"];
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
    isbn = '$isbn',
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

  
  $uploadError = "";

  // Function in the upload service
  $cover = upload($_FILES["cover"]);

  $sql = 
    "INSERT INTO media (type, ISBN, title, subtitle, series, part, author_first_name, author_last_name, publisher_name, publisher_city, edition_date, edition_year, publish_year, pages, length, version, narrator, genre, language, description, cover)
    VALUES ('$type','$ISBN','$title','$subtitle','$series','$part','$author_first_name','$author_last_name','$publisher_name','$publisher_city','$edition_date','$edition_year','$publish_year','$pages','$length','$version','$narrator','$genre','$language','$description','$cover->fileName')"; 

  if (mysqli_query($connect, $sql) === true) {
    $class = "success";
    $message = "The entry below was successfully created <br>
      <table class='table w-50'>
        <tr>
          <td>$type</td>
          <td>$ISBN</td>
          <td>$title</td>
          <td>$subtitle</td>
          <td>$series</td>
          <td>$part</td>
          <td>$author_first_name</td>
          <td>$author_last_name</td>
          <td>$publisher_name</td>
          <td>$publisher_city</td>
          <td>$edition_date</td>
          <td>$edition_year</td>
          <td>$publish_year</td>
          <td>$pages</td>
          <td>$length</td>
          <td>$version</td>
          <td>$narrator</td>
          <td>$genre</td>
          <td>$language</td>
          <td>$description</td>
        </tr>
      </table>
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
    <div class="alert alert-<?= $class; ?>" role="alert">
      <p><?php echo ($message) ?? ""; ?></p>
      <p><?php echo ($uploadError) ?? ""; ?></p>
      <a href="../index.php"><button class="btn btn-primary" type="button">Home</button></a>
    </div>
  </div>
</body>

</html>