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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="sidebar.js"></script>
    <script src="main.js"></script>
    <script type="text/javascript">
        var sessId = '<?php echo $id; ?>';
    </script>
    <title>Pealeht</title>
</head>
<body>
    <div class="title">
        <div id="menuButton"><span style="font-size:60px;cursor:pointer" onclick="toggleNav()">&#9776;</span></div>
        <a>Tere,  <?php echo $_SESSION["userName"]; ?></a>
    </div>
    <br><br><br><br><br>
    <div id="mySidenav" class="sidenav">
        <h1>Menüü</h1>
            <a href="?logout=1">Logi välja</a>
    </div>
    <div class="picAndInfo">
        <input type="text" id="task">
        <input type="date" id="date">
        <br>
        <button id="addButton">LISA</button>
        <ul id="list">
        <li class="list-element"></li>
        </ul>
        <image src="img/1.jpg" alt="Loki" class="active"></image>
        <image src="img/2.jpg" alt="Excalibur_Umbra"></image>
    </div>
</body>
</html>
