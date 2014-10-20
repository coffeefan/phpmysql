<?
require_once realpath(dirname(__FILE__))."/blogmanager.php";
function homeController(){
    showHome();
}

function showHome(){
?>
    <div class="jumbotron">
        <h1>Herzlich Willkommen</h1>
        <p>Auf dem Blog von Christian Bachmann</p>
    </div>
<?

    $blogposts=showblogs();
    foreach($blogposts as $blogpost){
    ?>
        <div class="blogpost">
        <h3><? echo $blogpost["title"]?></h3>
        <span class='time'><? echo $blogpost["time"]?></span>
        <p><? echo $blogpost["content"]?></p>

         <?
        //Nur anzeigen wenn eingeloggt
        if(checkAuthentification()){
        ?>
            <a href="index.php?page=edit&blogpostid=<? echo$blogpost["blogpostid"]?>">Bearbeiten</a>
            <a href="index.php?page=delete&blogpostid=<? echo$blogpost["blogpostid"]?>">Löschen</a>
        <?} ?>
        </div>
        <hr/>

    <?}
}
?>