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
  <?php require_once "components/bootstrap.php" ?>
</head>

<body class="bg-dark text-white">
  <div class="container my-4">
    <fieldset class="mx-auto">
      <legend class="h2">Update request<br>
        <img class="img-thumbnail mt-2" src="img/<?= $cover ?>" alt="<?= $title ?>">
      </legend>
      <form action="actions/update.php" method="post" enctype="multipart/form-data">
        <table class="table text-white">

          <tr>
            <th>Type</th>
            <td>
              <select class="form-select bg-dark text-white" name="type" aria-label="Type">
                <option selected><?= $type ?></option>
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
            <td><input class="form-control bg-dark" name="title" placeholder="Title" value="<?= $title ?>" /></td>
            <td><input class="form-control bg-dark" name="subtitle" placeholder="Subtitle" value="<?= $subtitle ?>" /></td>
          </tr>

          <tr>
            <th>Series</th>
            <td><input class="form-control bg-dark" name="series" placeholder="Series" value="<?= $series ?>" />
              <input class="form-control bg-dark mt-2" type="number" name="part" placeholder="Part" value="<?= $part ?>" />
            </td>
          </tr>

          <tr>
            <th>Author</th>
            <td>
              <input class="form-control bg-dark" name="author_first_name" placeholder="First name" value="<?= $author_first_name ?>" />
              <input class="form-control bg-dark mt-2" name="author_last_name" placeholder="Last name" value="<?= $author_last_name ?>" />
            </td>
          </tr>

          <tr>
            <th>Publisher</th>
            <td>
              <input class="form-control bg-dark" name="publisher_name" placeholder="Name" value="<?= $publisher_name ?>" />
              <input class="form-control bg-dark mt-2" name="publisher_city" placeholder="City" value="<?= $publisher_city ?>" />
            </td>
          </tr>

          <tr>
            <th>Edition</th>
            <td>
              <input class="form-control bg-dark text-uppercase" type="date" name="edition_date" placeholder="Date" value="<?= $edition_date ?>" />
              <input class="form-control bg-dark my-2" type="year" name="edition_year" placeholder="Edition Year" value="<?= $edition_year ?>" />
              <input class="form-control bg-dark" type="year" name="publish_year" placeholder="Originally published" value="<?= $publish_year ?>" />
            </td>
          </tr>

          <tr>
            <th>Pages</th>
            <td><input class="form-control bg-dark" type="number" name="pages" placeholder="Number of Pages" value="<?= $pages ?>" /></td>
          </tr>

          <tr>
            <th>Audio</th>
            <td>
              <input class="form-control bg-dark" name="length" placeholder="Length" value="<?= $length ?>" />
              <select class="form-select bg-dark my-2 text-white" name="version" aria-label="Version">
                <option selected><?= $version ?></option>
                <option value="Unabridged">Unabridged</option>
                <option value="Abridged">Abridged</option>
                <option value="Adapted">Adapted</option>
              </select>
              <input class="form-control bg-dark" name="narrator" placeholder="Narrator" value="<?= $narrator ?>" />
            </td>
          </tr>

          <tr>
            <th>Language</th>
            <td>
              <select class="form-select bg-dark my-2 text-white" name="version" aria-label="Version">
                <option selected><?= $language ?></option>
                <option value="English">English</option>
                <option value="French">French</option>
                <option value="German">German</option>
                <option value="Spanish">Spanish</option>
                <option value="Irish">Irish</option>
              </select>
            </td>
          </tr>

          <tr>
            <th>Description</th>
            <td>
              <textarea class="form-control bg-dark" style="height:250px" name="description" placeholder="Description">
              <?= $description ?>
              </textarea>
            </td>
          </tr>

          <tr>
            <th>Genre</th>
            <td>
              <select class="form-select bg-dark text-white" style="height:230px" aria-label="Genre" name="genre[]" multiple="multiple">
                <option value="Fiction">Fiction</option>
                <option value="Children">Children</option>
                <option value="Middle Grade">Middle Grade</option>
                <option value="Young Adult">Young Adult</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Adventure">Adventure</option>
                <option value="Magic">Magic</option>
                <option value="Coming of Age">Coming of Age</option>
                <option value="Asian">Asian</option>
                <option value="Folklore">Folklore</option>
                <option value="Nonfiction">Nonfiction</option>
                <option value="Psychology">Psychology</option>
                <option value="Memoir">Memoir</option>
                <option value="Animals">Animals</option>
                <option value="Self Help">Self Help</option>
                <option value="Programming">Programming</option>
              </select>
            </td>
          </tr>

          <tr>
            <th>ISBN</th>
            <td>
              <input class="form-control bg-dark" name="isbn" placeholder="ISBN number" value="<?= $isbn ?>" />
            </td>
          </tr>

          <tr>
            <th>Cover</th>
            <td><input class="form-control bg-dark" type="file" name="cover" /></td>
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