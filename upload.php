<?php
if(isset($_POST['submit'])){
  $file = $_FILES['file'];

  $filename = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $filename);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg','png','pdf');

  if(in_array($fileActualExt, $allowed)){
    if($fileError ===0){
      if($fileSize < 5000000){
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'img/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        header("Location: main.php");
      } else {
        echo "fail on liiga suur";
      }
    } else {
      echo "oli viga üleslaadimisel";
    }
  }else{
    echo "Ei saa sellist tüüpi faili laadida";
  }
}
 ?>
