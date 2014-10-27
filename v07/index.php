<?php
session_start();
require_once realpath(dirname(__FILE__))."/database.php";
require_once realpath(dirname(__FILE__))."/home.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Postmanager</title>
    <link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="media/css/style.css" rel="stylesheet">
</head>

<body data-target=".navbar-custom">

<nav class="navbar navbar-custom" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">Postmanager</a>
        </div>


        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


        <div class="container">
        <?php

        $hc= new HomeController();
        $hc->show();

        ?>

    <hr>

    <div class="footer">
        <div class="footer-section">
         <p>&copy; Christian Bachmann 2014</p>
        </div>
    </div>

        </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="media/js/bootstrap.min.js"></script>
    <script src="media/js/fileinput.min.js"></script>
    <script> $("#bild").fileinput({'showUpload':false, 'previewFileType':'any'});</script>
</body>
</html>