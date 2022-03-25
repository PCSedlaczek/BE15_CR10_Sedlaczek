<?php
require_once "../actions/connect.php";

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
    if ($subtitle) {
      $subtitle = "- $subtitle";
    }
    $series = $media["series"];
    if (!$series) {
      $display = "d-none";
    }
    $part = $media["part"];
    $author_first_name = $media["author_first_name"];
    $author_last_name = $media["author_last_name"];
    $publisher_name = $media["publisher_name"];
    $publisher_city = $media["publisher_city"];
    $edition_date = date_create($media["edition_date"]);
    $edition_date = date_format($edition_date, "j F Y");
    $edition_year = $media["edition_year"];
    $publish_year = $media["publish_year"];
    $pages = $media["pages"];
    if (!$pages) {
      $book = "d-none";
    }
    
    // Audiobook
    $length = date_create($media["length"]);
    $length = date_format($length, "h:m");
    $version = $media["version"];
    $narrator = $media["narrator"];
    if (!$narrator) {
      $audio = "d-none";
    }

    // Genres
    $genre = $media["genre"];
    if ($genre > 0) {
      $genres = explode(",", $genre);  // String>Array
      $genre = implode(", ", $genres); // Array>String
    }
    $genreList = "";
    $link = "";
    $links = [];
    foreach ($genres as $value) {
      $link = "<a class='link-light' href='../index.php?genre=$value'>$value</a>";
      array_push($links, $link);
    }
    $genre = implode(", ", $links);

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= "$title - $author_first_name $author_last_name" ?></title>
  <link rel="stylesheet" href="../css/style.css">
  <?php require_once "../components/bootstrap.php"?>
</head>

<body class="bg-dark text-white">

  <div class="container">
    <div class="m-auto mt-3">

      <div class="text-end">
        <a href="../index.php">
          <button class="btn btn-primary" type="button">
            Back</button>
        </a>
      </div>
      <h2 class="text-white mt-0 mb-4">Media details</h2>

      <table class="table table-striped table-dark">
        <tbody>
          <tr>
            <td>
              <a href="../index.php?type=<?=$type?>">
                <span class="badge bg-dark"><?=$type?></span>
              </a><br>
              <a href="../img/<?=$cover?>">
                <img class="img-thumbnail my-1" src="../img/<?=$cover?>">
              </a>
            </td>

            <td>
              <p>
                <b>Author:</b>
                <a class="link-light" href="../index.php?author_fname=<?=$author_first_name?>&author_lname=<?=$author_last_name?>">
                  <?=$author_first_name?>
                  <?=$author_last_name?>
                </a>
              </p>
              <p>
                <b>Title:</b>
                <?=$title?>
                <?=$subtitle?>
              </p>
              <p class="<?=$display?>">
                <b>Series:</b>
                <a class="link-light" href="../index.php?series=<?=$series?>">
                  <?="$series"?>
                </a>
              </p>
              <p class="<?=$display?>">
                <b>Part:</b>
                <a class="link-light" href="../index.php?part=<?=$part?>">
                  <?="$part"?>
                </a>
              <p>
              <p>
                <b>Publisher:</b>
                <a class="link-light" href="../index.php?publisher=<?=$publisher_name?>">
                  <?=$publisher_name?>,
                </a>
                <a class="link-light" href="../index.php?publisher_city=<?=$publisher_city?>">
                  <?=$publisher_city?>
                </a>
              </p>
              <p>
                <b>Published:</b>
                <?=$edition_date?>
              </p>
              <p>
                <b>Originally published:</b>
                <a class="link-light" href="../index.php?publish_year=<?=$publish_year?>">
                  <?=$publish_year?>
                </a>
              </p>
              <p class="<?=$book?>">
                <b>Pages:</b>
                <?=$pages?>
              </p>
              <p class="<?=$audio?>">
                <b>Length:</b>
                <?=$length?> hrs
              </p>
              <p class="<?=$audio?>">
                <b>Version:</b>
                <a class="link-light" href="../index.php?version=<?=$version?>">
                  <?=$version?>
                </a>
              </p>
              <p class="<?=$audio?>">
                <b>Narrator:</b>
                <a class="link-light" href="../index.php?narrator=<?=$narrator?>">
                  <?=$narrator?>
                </a>
              </p>
              <p>
                <b>Genre:</b>
                <?=$genre?>
              </p>
              <p>
                <b>ISBN:</b>
                <?=$ISBN?>
              </p>

              <button class="btn btn-sm btn-dark my-2">
                <a class="link-light" href="../index.php?status=<?=$status?>">
                  <?=$status?>
                </a>
              </button>

            </td>

            <td class="text-center">
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