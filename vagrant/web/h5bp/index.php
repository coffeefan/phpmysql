﻿<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>h5bp</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/normalize.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="header-container">
        <header class="wrapper clearfix">
            <h1 class="title">h1.title</h1>
            <?php include 'navi.inc.php' ?>
        </header>
    </div>
    <div class="main-container">
        <div class="main wrapper clearfix">
			<?php include 'article.inc.php' ?>
			<?php include 'aside.inc.php' ?>
        </div> <!-- #main -->
    </div> <!-- #main-container -->
    <div class="footer-container">
			<?php include 'footer.inc.php' ?>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="js/main.js"></script>
</body>
</html>
