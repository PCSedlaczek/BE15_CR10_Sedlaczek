
foreach ($genreList as $option) {
    if (in_array($option, $genre)) {
      foreach ($genre as $select) {
        if ($option == $select) {
          $genres .= "<option value='$select' selected>$select</option>";
        }
      }
    } else {
      $genres .= "<option value='$option'>$option</option>";
    }
  }
_____________________________________________

1)  $option = Fiction           = in_array()
2)  $option = Children
3)  $option = Middle Grade      = in_array()
4)  $option = Young Adult
5)  $option = Fantasy           = in_array()
6)  $option = Adventure         = in_array()
7)  $option = Magic             = in_array()
8)  $option = Coming of Age     = in_array()
9)  $option = Asian
10) $option = Folklore
11) $option = Nonfiction
12) $option = Psychology
13) $option = Memoir
14) $option = Animals
15) $option = Self Help
16) $option = Programming
_____________________________________________

a) $select = Fiction
b) $select = Middle Grade
c) $select = Fantasy
d) $select = Adventure
e) $select = Magic
f) $select = Coming of Age
_____________________________________________

1)  $option = Fiction
    if (in_array($option, $genre))
      foreach($genre as $select)
1a) $select = Fiction
    if ($option == $select)
      $genres .= <option value='$select' selected>$select</option> 
    
    $genres .= 
      <option value='Fiction' selected>Fiction</option>
1a) $select = Fiction
1b) $select = Middle Grade
1c) $select = Fantasy
1d) $select = Adventure
1e) $select = Magic
1f) $select = Coming of Age

2)  $option = Children
    if (in_array($option, $genre))
2a) $select = Fiction
2b) $select = Middle Grade
2c) $select = Fantasy
2d) $select = Adventure
2e) $select = Magic
2f) $select = Coming of Age
    else
      $genres .= <option value='Children'>Children</option>

3)  $option = Middle Grade
    if (in_array($option, $genre))
3a) $select = Fiction
3b) $select = Middle Grade
      $genres .= <option value='Middle Grade' selected>Middle Grade</option>
2c) $select = Fantasy
2d) $select = Adventure
2e) $select = Magic
2f) $select = Coming of Age

4)  $option = Young Adult
    if (in_array($option, $genre))
4a) $select = Fiction
4b) $select = Middle Grade
4c) $select = Fantasy
4d) $select = Adventure
4e) $select = Magic
4f) $select = Coming of Age
    else 
      $genres .= <option value='Young Adult'>Young Adult</option>

5)  $option = Fantasy
    if (in_array($option, $genre))
5a) $select = Fiction
5b) $select = Middle Grade
5c) $select = Fantasy
      $genres .= <option value='Fantasy' selected>Fantasy</option>
5d) $select = Adventure
5e) $select = Magic
5f) $select = Coming of Age

6)  $option = Adventure
    if (in_array($option, $genre))
6a) $select = Fiction
6b) $select = Middle Grade
6c) $select = Fantasy
6d) $select = Adventure
      $genres .= <option value='Adventure' selected>Adventure</option>
6e) $select = Magic
6f) $select = Coming of Age

7)  $option = Magic
    if (in_array($option, $genre))
7a) $select = Fiction
7b) $select = Middle Grade
7c) $select = Fantasy
7d) $select = Adventure
7e) $select = Magic
      $genres .= <option value='Magic' selected>Magic</option>
7f) $select = Coming of Age

8)  $option = Coming of Age
    if (in_array($option, $genre))
8a) $select = Fiction
8b) $select = Middle Grade
8c) $select = Fantasy
8d) $select = Adventure
8e) $select = Magic
8f) $select = Coming of Age
      $genres .= <option value='Coming of Age' selected>Coming of Age</option>

9)  $option = Asian
    if (in_array($option, $genre))
    else
      $genres .= <option value='Asian'>Asian</option>

10) $option = Folklore
    if (in_array($option, $genre))
    else
      $genres .= <option value='Folklore'>Folklore</option>

11) $option = Nonfiction
    else
      $genres .= <option value='Nonfiction'>Nonfiction</option>

12) $option = Psychology
    else
      $genres .= <option value='Psychology'>Psychology</option>

13) $option = Memoir
    else
      $genres .= <option value='Memoir'>Memoir</option>

14) $option = Animals
    else
      $genres .= <option value='Animals'>Animals</option>

15) $option = Self Help
    else
      $genres .= <option value='Self Help'>Self Help</option>

16) $option = Programming
    else
      $genres .= <option value='Programming'>Programming</option>