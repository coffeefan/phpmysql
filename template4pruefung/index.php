<?php
session_start();
require_once realpath(dirname(__FILE__))."/create.php";
require_once realpath(dirname(__FILE__))."/edit.php";
require_once realpath(dirname(__FILE__))."/delete.php";
require_once realpath(dirname(__FILE__))."/login.php";
require_once realpath(dirname(__FILE__))."/home.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Christian's Blog</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="media/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="media/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="media/css/style.css" rel="stylesheet" media="screen">
</head>
<body>

<div class="container">
    <div class="masthead">
        <h3 class="muted">Christian Bachmann - Blogsystem</h3>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?page=login">Login</a></li>
                        <li><a href="index.php?page=create">Create a Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <?
            if(isset($_GET["page"])&&$_GET["page"]==="create"){
                createController();
            }else if(isset($_GET["page"])&&$_GET["page"]==="edit"){
                editController();
            }else if(isset($_GET["page"])&&$_GET["page"]==="delete"){
                deleteController();

            } else if(isset($_GET["page"])&&$_GET["page"]==="login"){
                loginController();
            } else{
                homeController();
            }
        ?>
    </div>

    <hr>

    <div class="footer">
        <p>&copy; Christian Bachmann 2014</p>
    </div>

</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="media/js/bootstrap.min.js"></script>
    <script src="media/js/fileinput.min.js"></script>
    <script> $("#bild").fileinput({'showUpload':false, 'previewFileType':'any'});</script>
</body>
</html>