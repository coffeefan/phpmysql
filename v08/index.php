<?php
session_start();
require_once realpath(dirname(__FILE__))."/home.php";
require_once realpath(dirname(__FILE__))."/aufgabe1_2.php";
require_once realpath(dirname(__FILE__))."/aufgabe3.php";
require_once realpath(dirname(__FILE__))."/aufgabe4.php";
require_once realpath(dirname(__FILE__))."/aufgabe6.php";
require_once realpath(dirname(__FILE__))."/aufgabe7.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Selbststudium 8</title>
    <link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="media/css/style.css" rel="stylesheet">
</head>

<body data-target=".navbar-custom">
<header>
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../" class="navbar-brand">V08</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php?page=home">Home</a>
                </li>
                <li>
                    <a href="index.php?page=aufgabe1_2">Aufgabe1+2</a>
                </li>
                <li>
                    <a href="index.php?page=aufgabe3">Aufgabe3</a>
                </li>
                <li>
                    <a href="index.php?page=aufgabe4">Aufgabe4</a>
                </li>
                <li>
                    <a href="index.php?page=aufgabe6">Aufgabe6</a>
                </li>
                <li>
                    <a href="index.php?page=aufgabe7">Aufgabe7</a>
                </li>
                </ul>
        </nav>
    </div>
</header>



        <div class="container">
        <?php
        if(isset($_GET["page"])&&$_GET["page"]==="aufgabe1_2"){
            $aufgabe1_2=new Aufgabe1_2();
            $aufgabe1_2->show();
        }else if(isset($_GET["page"])&&$_GET["page"]==="aufgabe3"){
            $aufgabe3=new Aufgabe3();
            $aufgabe3->show();
        }else if(isset($_GET["page"])&&$_GET["page"]==="aufgabe4"){
            $aufgabe4=new Aufgabe4();
            $aufgabe4->show();
        }else if(isset($_GET["page"])&&$_GET["page"]==="aufgabe6"){
            $aufgabe6=new Aufgabe6();
            $aufgabe6->show();
        }else if(isset($_GET["page"])&&$_GET["page"]==="aufgabe7"){
            $aufgabe7=new Aufgabe7();
            $aufgabe7->show();
        }

        else if(isset($_GET["page"])&&$_GET["page"]==="login"){
            loginController();
        } else{
            $hc= new HomeController();
            $hc->show();
        }



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