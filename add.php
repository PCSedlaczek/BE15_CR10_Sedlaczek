<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Media</title>
  <link rel="stylesheet" href="css/style.css">
  <?php require_once "components/bootstrap.php" ?>
</head>

<body class="bg-dark">
  <div class="container my-5">
    <fieldset class="mx-auto">
      <legend class="h2 text-white">Add Media</legend>
      <form action="actions/create.php" method="post" enctype="multipart/form-data">
        <table class="table table-dark text-white">

          <tr>
            <th>Type</th>
            <td>
              <select class="form-select bg-dark text-white" name="type" aria-label="Type"> 
                <option selected>Media type</option>
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
            <td><input class="form-control bg-dark" name="title" placeholder="Title"/>
            <input class="form-control bg-dark mt-2" name="subtitle" placeholder="Subtitle"/></td>
          </tr>

          <tr>
            <th>Series</th>
            <td><input class="form-control bg-dark" name="series" placeholder="Series"/>
            <input class="form-control bg-dark mt-2" type="number" name="part" placeholder="Part"/></td>
          </tr>

          <tr>
            <th>Author</th>
            <td>
              <input class="form-control bg-dark" name="author_first_name" placeholder="First name"/>
              <input class="form-control bg-dark mt-2" name="author_last_name" placeholder="Last name"/>
            </td>
          </tr>

          <tr>
            <th>Publisher</th>
            <td>
              <input class="form-control bg-dark" name="publisher_name" placeholder="Name"/>
              <input class="form-control bg-dark mt-2" name="publisher_city" placeholder="City"/>
            </td>
          </tr>

          <tr>
            <th>Edition</th>
            <td>
              <input class="form-control bg-dark text-uppercase" type="date" name="edition_date" placeholder="Date"/>
              <input class="form-control bg-dark my-2" type="year" name="edition_year" placeholder="Edition Year"/>
              <input class="form-control bg-dark" type="year" name="publish_year" placeholder="Originally published"/>
            </td>
          </tr>

          <tr>
            <th>Pages</th>
            <td><input class="form-control bg-dark" type="number" name="pages" placeholder="Number of Pages"/></td>
          </tr>

          <tr>
            <th>Audio</th>
            <td>
              <input class="form-control bg-dark" name="length" placeholder="Length"/>
              <select class="form-select bg-dark my-2 text-white" name="version" aria-label="Version"> 
                <option selected>Version</option>
                <option value="Unabridged">Unabridged</option>
                <option value="Abridged">Abridged</option>
                <option value="Adapted">Adapted</option>
              </select>
              <input class="form-control bg-dark" name="narrator" placeholder="Narrator"/>
            </td>
          </tr>

          <tr>
            <th>Language</th>
            <td>
              <select class="form-select bg-dark my-2 text-white" name="version" aria-label="Version"> 
                <option selected>Language</option>
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
            <td><input class="form-control bg-dark" name="isbn" placeholder="ISBN number"/></td>
          </tr>

          <tr>
            <th>Cover</th>
            <td><input class="form-control bg-dark text-muted" type="file" name="cover"/></td>
          </tr>

          <tr>
            <td><button class="btn btn-success" type="submit">Add</button></td>
            <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a>
            </td>
          </tr>

        </table>
      </form>
    </fieldset>
  </div>

</body>

</html>