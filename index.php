<?php
require_once "actions/connect.php";


$query = "SELECT * FROM media";
$media = mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($media);

$tbody = "";

// Create tbody
if (mysqli_num_rows($media) > 0) {
  while ($row = mysqli_fetch_assoc($media)) {
    $tbody .= "
      <tr>
        <td>
          <span class='badge bg-dark'>$row[type]</span><br>
          <a href='detail.php?id=$row[id]'>
            <img class='img-thumbnail my-1' src='img/$row[cover]'>
          </a>
        </td>
        <td>
          <h6 class='my-2'>
            $row[author_first_name] 
            $row[author_last_name]
          </h6>
          <a href='detail.php?id=$row[id]' class='link-light'>
            <h5>$row[title]</h5>
          </a>
          $row[publisher_name]
          $row[edition_year]<br>
          <span class='btn btn-sm btn-dark my-2'>$row[status]</span>
        </td>
        <td class='text-center'>
          <a href='detail.php?id=$row[id]'>
            <button class='btn btn-dark btn-sm m-1' type='button'>View</button>
          </a><br>
          <a href='edit.php?id=$row[id]'>
            <button class='btn btn-primary btn-sm m-1' type='button'>Edit</button>
          </a><br>
          <a href='delete.php?id=$row[id]'>
            <button class='btn btn-danger btn-sm m-1' type='button'>Delete</button>
          </a>
        </td>
      </tr>";
  };
} else {
  $tbody = "
    <tr>
      <td colspan='5'>
        <center>No Data Available</center>
      </td>
    </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Big Library Catalogue</title>
  <link rel="stylesheet" href="css/style.css">
  <?php require_once "components/bootstrap.php"?>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="m-auto mt-3">

      <div class="text-end">
        <a href="add.php">
          <button class="btn btn-primary" type="button">
            Add media</button>
        </a>
      </div>
      <h2 class="text-white mt-0 mb-4">All media</h2>

      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th>Cover</th>
            <th>Title</th>
            <th class="text-center">Actions</th>
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