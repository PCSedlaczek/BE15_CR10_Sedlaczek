<?php
function upload($cover) {
  $result = new stdClass();
  $result->fileName = "cover.png";
  $result->error = true;

  $fileName = $cover["name"];
  $fileType = $cover["type"];
  $fileTmpName = $cover["tmp_name"];
  $fileError = $cover["error"];
  $fileSize = $cover["size"];
  $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));    
  $filesAllowed = ["png", "jpg", "jpeg"];

  if ($fileError == 4) {      
    $result->ErrorMessage = "No cover was chosen. It can always be updated later.";
    return $result;
  }
  else {
    if (in_array($fileExtension, $filesAllowed)) {
      if ($fileError === 0) {
        if ($fileSize < 500000) {

          // file name based on microseconds
          $fileNewName = uniqid('').".".$fileExtension;
          $destination = "../img/$fileNewName";

          if (move_uploaded_file($fileTmpName, $destination)) 
          {
            $result->error = 0;
            $result->fileName = $fileNewName;
            return $result;
          }
        } else {    
          $result->ErrorMessage = "There was an error uploading this file.";
          return $result;
        } // fileSize else end
      } else {                                      
        $result->ErrorMessage = "This file is bigger than the allowed 500Kb.<br>Please choose a smaller one and update the entry.";
        return $result;
      } // fileError 0 else end
    } else {                            
      $result->ErrorMessage = "There was an error uploading - $fileError code. Check the PHP documentation.";
      return $result;
    } // in_array else end
  } // file error 4 else end
} // function upload end