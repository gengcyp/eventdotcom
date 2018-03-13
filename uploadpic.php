<?php
$status = "";
// if (isset($_POST['edit'])) {
  // $status = "insert";
//   $eventid = ($_GET['id']);
// }else if (isset($_POST['insert'])){
  // $status = "edit";
  // $eventid = ($lastid);
// }


if (isset($_POST['insert'])){
  $j = 0;     // Variable for indexing uploaded image.
  $base_path = "uploads/";
  echo $base_path;
  $target_path = $base_path;     // Declaring Path for uploaded images.
  for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
    $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
    $ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
    $file_extension = end($ext); // Store extensions in the variable.
    //***
    $target_path = $base_path ."Event_".'d'."_". md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
    $j = $j + 1;      // Increment the number of uploaded images according to the files in array.
    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
      // If file moved to uploads folder.
      echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
      //upload pic
      uploadAlbum($db,'40',$target_path);
  } else {     //  If File Was Not Moved.
    echo $j. ').<span id="error">please try again!.</span><br/><br/>';
  }
}
}

?>
