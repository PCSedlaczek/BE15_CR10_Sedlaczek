<?php
require_once 'actions/connect.php';

if ($_GET["id"]) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM media WHERE id = $id";
  $result = mysqli_query($connect, $sql);

  if (mysqli_num_rows($result) == 1) {
    $media = mysqli_fetch_assoc($result);
    $type = $media["type"];
    $isbn = $media["isbn"];
    $title = $media["title"];
    $subtitle = $media["subtitle"];
    $series = $media["series"];
    $part = $media["part"];
    $author_first_name = $media["author_first_name"];
    $author_last_name = $media["author_last_name"];
    $publisher_name = $media["publisher_name"];
    $publisher_city = $media["publisher_city"];
    $edition_date = $media["edition_date"];
    $edition_year = $media["edition_year"];
    $publish_year = $media["publish_year"];
    $pages = $media["pages"];
    $length = $media["length"];
    $version = $media["version"];
    $narrator = $media["narrator"];
    $genre = $media["genre"];
    $language = $media["language"];
    $description = $media["description"];
    $cover = $media["cover"];
  } else {
    header("location: error.php");
  }
  mysqli_close($connect);
} else {
  header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Media</title>
  <link rel="stylesheet" href="css/style.css">
  <?php require_once "components/bootstrap.php"?>
</head>

<body class="bg-dark text-white">
  <div class="container my-4">
    <fieldset class="mx-auto">
      <legend class="h2">Update request<br>
        <img class="img-thumbnail mt-2" src="img/<?=$cover?>" alt="<?=$title?>">
      </legend>
      <form action="actions/update.php" method="post" enctype="multipart/form-data">
        <table class="table text-white">

        <tr>
            <th>Type</th>
            <td>
              <select class="form-select bg-dark text-white" name="type" aria-label="Type"> 
                <option selected><?=$type?></option>
                <option value="Paperback">Paperback</option>
                <option value="Hardcover">Hardcover</option>
                <option value="E-Book">E-Book</option>
                <option value="E-Audio">E-Audio</option>
                <option value="Audiobook">Audiobook</option>
                <option value="CD">CD</option>
                <option value="CD-ROM">CD-ROM</option>
                <option value="DVD">DVD</option>
                <option value="Newspaper">Newspaper</option>
                <option value="Magazine">Magazine</option>
              </select>
            </td>
          </tr>

          <tr>
            <th>Title</th>
            <td><input class="form-control bg-dark" name="title" placeholder="Title" value="<?=$title?>"/></td>
            <td><input class="form-control bg-dark" name="subtitle" placeholder="Subtitle" value="<?=$subtitle?>"/></td>
          </tr>

          <tr>
            <th>x</th>
            <td><input class="form-control bg-dark" name="title" placeholder="x" value="<?=$x?>"/></td>
          </tr>

          
















          <tr>
            <th>Cover</th>
            <td><input class="form-control bg-dark" type="file" name="cover"/></td>
          </tr>
          <tr>
            <input type="hidden" name="id" value="<?= $media['id'] ?>"/>

            <input type="hidden" name="cover" value="<?= $media['cover'] ?>"/>
            <td><button class="btn btn-success" type="submit">Update</button></td>
            <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
          </tr>
        </table>
      </form>
    </fieldset>
  </div>
</body>

</html>