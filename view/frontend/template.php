<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <title>JCskipper - Yacht delivery platform</title>
     
    <!-- Leaflet -->
    <link rel='stylesheet prefetch' href='https://unpkg.com/leaflet@1.3.1/dist/leaflet.css'>
    <!-- SearchBox Control -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/esri-leaflet-geocoder@2.2.9/dist/esri-leaflet-geocoder.css" >
    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
</head>

<body>
    <?php 
    if (isset($_SESSION['ID']) AND isset($_SESSION['pseudo']))
    {
        include 'navbar-logged.php'; 
    }       
    else 
    {
        include 'navbar-unlogged.php'; 
        include 'signup.php'; 
        include 'login.php'; 
    }
    ?>

    <?= $content ?>

    <!-- JQUERY -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <!-- Leaflet -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js"></script>
    <!-- Bootstrap -->
    <script src="public/bootstrap/js/bootstrap.min.js"></script>
    <!-- SearchBox Control -->
    <script src="https://unpkg.com/esri-leaflet@2.1.3/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-geocoder@2.2.8/dist/esri-leaflet-geocoder-debug.js"></script>

    <?= $scripts ?>

</body>
</html>