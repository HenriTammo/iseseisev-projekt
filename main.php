<?php
require("functions.php");
echo "<body style='background-color:#202020'>";
//kui pole sisse loginud
//kontrollib kas on sisselogitud
if(!isset($_SESSION["userId"])){
    header("Location: index.php");
    exit();
}
if(isset($_GET["logout"])){
    session_destroy();
    header("Location: index.php");
    exit();
}
$id =  $_SESSION["userId"];
$dirToRead = "img/";
//$allFiles = scandir($dirToRead);
$allFiles = array_slice(scandir($dirToRead), 2);
//var_dump($allFiles);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="main.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="sidebar.js"></script>
    <script src="main.js"></script>
    <script type="text/javascript">
        var sessId = '<?php echo $id; ?>';
    </script>
    <title>Pealeht</title>
</head>
<body>
  <div id="main">
    <div class="title">
        <div id="menuButton"><span style="font-size:60px;cursor:pointer" onclick="toggleNav()">&#9776;</span></div>
        <a>Tere,  <?php echo $_SESSION["userName"]; ?></a>

    </div>

    <br><br><br><br><br>
    <div id="mySidenav" class="sidenav">
        <h1>Menüü</h1>
            <form action ="upload.php" method ="POST" enctype="multipart/form-data">
            <input type ="file" name="file" id="uploadButton">
            <label for="file">Choose a file</label>
            <button type ="submit" name = "submit">Upload</button>

            </form>

            <a href="?logout=1">Logi välja</a>
    </div>
    <div id="img" class="images">
      <ul id="list">
        <li id = "activeIMG" class="list-element" onclick="deactivate()"></li>
      </ul>
      <?php
      for ($i = 0; $i < count($allFiles); $i ++){
        echo '<img src="' .$dirToRead .$allFiles[$i] .'" style="float: left; margin: 34px 15px 15px 34px;  border: 3px solid white; display: flex; height: 200px; justify-content: | center;   ">';
      }
    ?>
  </div>
</div>
</body>
</html>
