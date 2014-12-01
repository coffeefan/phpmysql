<?php
require_once realpath(dirname(__FILE__))."/KantonModel.php";
function homeController()
{
    echo "Test the resolver:<br/>
<a href='resolver.php?service=kantone&methode=list&sort=name' target='_blank'>resolver.php?service=kantone&methode=list&sort=name</a><br/>
<a href='resolver.php?service=kantone&methode=single' target='_blank'>resolver.php?service=kantone&methode=single</a><br/>
    ";
    $km = new KantoneModel();

    echo "<h2>Alle Kantone</h2>";
    var_dump($km->getKanton());

    echo "<h2>Auto Kennzeichen ZH</h2>";
    var_dump($km->getKanton("Kürzel","ZH"));

    echo "<h2>Auto Kennzeichen BE</h2>";
    var_dump($km->getKanton("Kürzel","BE"));
}
?>