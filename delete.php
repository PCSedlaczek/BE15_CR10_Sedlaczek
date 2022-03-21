<?php
require_once "actions/connect.php";

if ($_GET["id"]) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM media WHERE id = $id";
  $result = mysqli_query($connect, $sql);
  $media = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) == 1) {
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Media</title>
  <link rel="stylesheet" href="css/style.css">
  <?php require_once "components/bootstrap.php"?>
</head>

<body class="bg-dark text-white">
  <div class="container my-4">
    <fieldset class="mx-auto">
      <legend class="h2 mb-3">Delete request<br>
        <img class="img-thumbnail mt-2" src="img/<?= $cover?>" alt="<?=$title?>">
      </legend>
      <h5>You have selected the data below:</h5>
      <table class="table w-75 mt-3 text-white">
        <tr>
          <td><?=$title?></td>
        </tr>
      </table>

      <h3 class="mb-4">Do you really want to delete this entry?<br>This action cannot be undone.</h3>
      <form action="actions/delete.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>"/>
        <input type="hidden" name="cover" value="<?= $cover?>"/>
        <button class="btn btn-danger me-2" type="submit">Delete</button>
        <a href="index.php"><button class="btn btn-warning" type="button">Cancel</button></a>
      </form>
    </fieldset>
  </div>
</body>

</html>