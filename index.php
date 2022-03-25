<?php
require_once "actions/connect.php";

// $_GET Filters set
if (
  isset($_GET["type"]) ||
  isset($_GET["author_fname"]) &&
  isset($_GET["author_lname"]) ||
  isset($_GET["publisher"]) ||
  isset($_GET["publisher_city"]) ||
  isset($_GET["edition_year"]) ||
  isset($_GET["publish_year"]) ||
  isset($_GET["series"]) ||
  isset($_GET["part"]) ||
  isset($_GET["version"]) ||
  isset($_GET["narrator"]) ||
  isset($_GET["genre"]) ||
  isset($_GET["status"])
) {
  // Filter by type 
  if (isset($_GET["type"])) {
    $type = $_GET["type"];
    $filter = "type = '$type'";
    $title = "Type: $type";
  }
  // Filter by author
  else if (
    isset($_GET["author_fname"]) &&
    isset($_GET["author_lname"])
  ) {
    $author_fname = $_GET["author_fname"];
    $author_lname = $_GET["author_lname"];
    $filter = "author_first_name = '$author_fname' AND author_last_name = '$author_lname'";
    $title =  "Author: $author_fname $author_lname";
  }
  // Filter by publisher
  elseif (isset($_GET["publisher"])) {
    $publisher = $_GET["publisher"];
    $filter = "publisher_name = '$publisher'";
    $title = "Publisher: $publisher";
  }
  // Filter by publisher city
  elseif (isset($_GET["publisher_city"])) {
    $publisher_city = $_GET["publisher_city"];
    $filter = "publisher_city = '$publisher_city'";
    $title = "Publisher city: $publisher_city";
  }
  // Filter by edition year
  elseif (isset($_GET["edition_year"])) {
    $edition_year = $_GET["edition_year"];
    $filter = "edition_year = '$edition_year'";
    $title = "Edition published: $edition_year";
  }
  // Filter by original publish year
  elseif (isset($_GET["publish_year"])) {
    $publish_year = $_GET["publish_year"];
    $filter = "publish_year = '$publish_year'";
    $title = "Originally published: $publish_year";
  }
  // Filter by series
  elseif (isset($_GET["series"])) {
    $series = $_GET["series"];
    $filter = "series = '$series'";
    $title = "Series: $series";
  }
  // Fiter by part
  elseif (isset($_GET["part"])) {
    $part = $_GET["part"];
    $filter = "part = '$part'";
    $title = "Part: $part";
  }
  // Fiter by audio version
  elseif (isset($_GET["version"])) {
    $version = $_GET["version"];
    $filter = "version = '$version'";
    $title = "Audio version: $version";
  }
  // Fiter by narrator
  elseif (isset($_GET["narrator"])) {
    $narrator = $_GET["narrator"];
    $filter = "narrator = '$narrator'";
    $title = "Narrator: $narrator";
  }
  // Filter by genre
  elseif (isset($_GET["genre"])) {
    $genre = $_GET["genre"];
    $filter = "find_in_set('$genre', genre)";
    $title = "Genre: $genre";
  }
  // Filter by status
  elseif (isset($_GET["status"])) {
    $status = $_GET["status"];
    $filter = "status = '$status'";
    $title = "Status: $status";
  }
  $query = "SELECT * FROM media WHERE $filter";
} 
// No $_GET filters set
else {
  $query = "SELECT * FROM media";
  $title = "All media";
  $display = "d-none";
}

// SQL Query
$result = mysqli_query($connect, $query);
$media = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Create tbody for query results
if (mysqli_num_rows($result) > 0) {
  $tbody = "";

  foreach ($media as $entry) {
    $tbody .= "
      <tr>
        <td>
          <a href='index.php?type=$entry[type]'>
            <button class='btn badge btn-dark'>
              $entry[type]
            </button>
          </a><br>
          <a href='media/view.php?id=$entry[id]'>
            <img class='img-thumbnail my-1' src='img/$entry[cover]'>
          </a>
        </td>
        <td>
          <a href='index.php?author_fname=$entry[author_first_name]&author_lname=$entry[author_last_name]' class='link-light'>
            <h6 class='my-2'>$entry[author_first_name] $entry[author_last_name]
            </h6>
          </a>
          <a href='media/view.php?id=$entry[id]' class='link-light'>
            <h5>$entry[title]</h5>
          </a>
          <a href='index.php?publisher=$entry[publisher_name]' class='link-light'>
            $entry[publisher_name]
          </a>
          <a href='index.php?edition_year=$entry[edition_year]' class='link-light'>
            $entry[edition_year]
          </a><br>
          <a href='index.php?status=$entry[status]'>
        </p>
        <p>
          <a href='index.php?series=$entry[series]' class='link-light'>
            $entry[series]
          </a>
          <a href='index.php?part=$entry[part]' class='link-light'>
            $entry[part]
          </a>
        </p>
          <a href='index.php?status=$entry[status]' class='link-light'>
            <button class='btn btn-sm btn-dark'>
            $entry[status]</button>
          </a>
        </td>
        <td class='text-center'>
          <a href='media/view.php?id=$entry[id]'>
            <button class='btn btn-dark btn-sm m-1' type='button'>View</button>
          </a><br>
          <a href='media/edit.php?id=$entry[id]'>
            <button class='btn btn-primary btn-sm m-1' type='button'>Edit</button>
          </a><br>
          <a href='media/delete.php?id=$entry[id]'>
            <button class='btn btn-danger btn-sm m-1' type='button'>Delete</button>
          </a>
        </td>
      </tr>";
  }
}
// No query results
else {
  $tbody = "
  <tr>
    <td colspan='5'>
      <center>No Data Available</center>
    </td>
  </tr>";

  mysqli_close($connect);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filter Catalogue</title>
  <link rel="stylesheet" href="css/style.css">
  <?php require_once "components/bootstrap.php"?>
</head>

<body class="bg-dark text-white">

  <div class="container">
    <div class="d-flex my-3 justify-content-between">
      <div class="text-start">
        <a href="index.php">
          <button class="btn btn-primary <?=$display?>" type="button">
            All media</button>
        </a>
      </div>
      <div class="text-end">
        <a href="media/add.php">
          <button class="btn btn-primary" type="button">
            Add media</button>
        </a>
      </div>
    </div>

    <h2 class="text-white mt-0 mb-4"><?=$title?></h2>

    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th style="width: 20%">Cover</th>
          <th style="width: 70%">Title</th>
          <th style="width: 10%" class="text-center">Actions</th>
        </tr>
      </thead>

      <tbody>
        <?=$tbody?>
      </tbody>
    </table>
  </div>
  </div>

</body>

</html>