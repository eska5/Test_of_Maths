<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
  <header><h1>Strona internetowa o stronach internetowych</h1></header>
  <left></left>
  <right></right>
  <div class="content">
  
    <?php
    echo'<center>';
    require('config.inc.php');
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    } 
    

    
    
    $id = isset($_GET['id'])?$_GET['id']:"";
        switch($id)
        {
            case "home": require('home.inc.php'); break;
            case "pokaz": require('upload.inc.php'); break;
            case "dodaj": require('zaloguj.inc.php'); break;
            case "usun": require('wyloguj.inc.php'); break;
            default: require('home.inc.php');
        }
mysqli_close($conn);
echo'</center>';
    ?>


</body>
</html>



	