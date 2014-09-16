<?php
/**
 * Created by PhpStorm.
 * User: cbach_000
 * Date: 16.09.14
 * Time: 21:19
 */

$landhauptstaedte=array("Schweiz"=>"Bern",
    "Frankreich"=>"Paris",
    "Deutschland"=>"Berlin",
    "Italien"=>"Rom",
    "Spanien"=>"Madrid");

echo "<table border='1'><tr><th>Land</th><th>Hauptstadt</th></tr>";
foreach($landhauptstaedte as $land=>$stadt){
    echo "<tr><td>".$land."</td><td>".$stadt."</td></tr>";
}

echo "</table>";
?>