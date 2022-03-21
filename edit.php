<?php
require_once 'actions/connect.php';

if ($_GET["id"]) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM media WHERE id = $id";
  $result = mysqli_query($connect, $sql);

  if (mysqli_num_rows($result) == 1) {
    $media = mysqli_fetch_assoc($result);
    $title = $media["title"];
    $subtitle = $media["subtitle"];
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
  <?php require_once "components/bootstrap.php" ?>
</head>

<body class="bg-dark text-white">
  <div class="container my-4">
    <fieldset class="mx-auto">
      <legend class="h2">Update request<br>
        <img class="img-thumbnail mt-2" src="img/<?= $cover?>" alt="<?=$title?>">
      </legend>
      <form action="actions/update.php" method="post" enctype="multipart/form-data">
        <table class="table text-white">
          <tr>
            <th>Name</th>
            <td><input class="form-control bg-dark" type="text" name="title" placeholder="Title" value="<?=$title?>" /></td>
          </tr>
          <tr>
            <th>Subtitle</th>
            <td><input class="form-control bg-dark" name="subtitle" placeholder="Subtitle" value="<?= $subtitle ?>" /></td>
          </tr>
          <tr>
            <th>Cover</th>
            <td><input class="form-control bg-dark" type="file" name="cover"/></td>
          </tr>
          <tr>
            <input type="hidden" name="id" value="<?= $media['id'] ?>" />

            <input type="hidden" name="cover" value="<?= $media['cover'] ?>" />
            <td><button class="btn btn-success" type="submit">Update</button></td>
            <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
          </tr>
        </table>
      </form>
    </fieldset>
  </div>
</body>

</html>