<?php
require_once "actions/connect.php";

if ($_GET["id"]) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM media WHERE id = $id";
  $result = mysqli_query($connect, $sql);

  if (mysqli_num_rows($result) == 1) {
    $media = mysqli_fetch_assoc($result);
    $type = $media["type"];
    $ISBN = $media["ISBN"];
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
    $status = $media["status"];
  } else {
    header("location: error.php");
  }
  mysqli_close($connect);
} else {
  header("location: error.php");
}

// Create tbody
$tbody .= "
  ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Media Details</title>
  <link rel="stylesheet" href="css/style.css">
  <?php require_once "components/bootstrap.php"?>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="m-auto mt-3">

      <div class="text-end">
        <a href="index.php">
          <button class="btn btn-primary" type="button">
            Back</button>
        </a>
      </div>
      <h2 class="text-white mt-0 mb-4">Media details</h2>

      <table class="table table-striped table-dark">
        <tbody>
          <tr>
            <td>
              <span class="badge bg-dark"><?=$type?></span><br>
              <a href="img/<?=$cover?>">
                <img class="img-thumbnail my-1" src="img/<?=$cover?>">
              </a>
            </td>

            <td>
              <p>
               <b>Author:</b>
                <?=$author_first_name?>
                <?=$author_last_name?>
              </p>
              <p>
                <b>Title:</b>
                <?=$title?><br>
                <?=$subtitle?>
              </p>
              <p>
                <b>Series:</b>
                <?=$series?> 
                <?=$part?> 
              </p>
              <p>
                <b>Publisher:</b>
                <?=$publisher_name?>, 
                <?=$publisher_city?>
              </p>
              <p>
                <b>Publish date:</b>
                <?=$edition_date?>
              </p>
              <p>
                <b>Originally published:</b>
                <?=$publish_year?>
              </p>
              <p>
                <b>Pages:</b>
                <?=$pages?>
              </p>
              <p>
                <b>Length:</b>
                <?=$length?>
              </p>
              <p>
                <b>Version:</b>
                <?=$version?>
              </p>
              <p>
                <b>Narrator:</b>
                <?=$narrator?>
              </p>
              <p>
                <b>Genre:</b>
                <?=$genre?>
              </p>
              <p>
                <b>ISBN:</b>
                <?=$ISBN?>
              </p>
              
              <span class="btn btn-sm btn-dark my-2"><?=$status?>
            </span>

            </td>

            <td class="text-center">
              <a href="detail.php?id=<?=$id?>">
                <button class="btn btn-dark btn-sm m-1" type="button">View</button>
              </a><br>
              <a href="edit.php?id=<?=$id?>">
                <button class="btn btn-primary btn-sm m-1" type="button">Edit</button>
              </a><br>
              <a href="delete.php?id=<?=$id?>">
                <button class="btn btn-danger btn-sm m-1" type="button">Delete</button>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>