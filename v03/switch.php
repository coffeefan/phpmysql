<?
$note="4";
var_dump($note);
switch($note){
    case 1: case 2: case 3:
        echo "nicht bestanden";
        break;
    case 4:

    case 5:

    case 6:
        echo "nicht bestanden";
        break;
    case "undefinded":
        echo "nicht abgegeben";
    default:
        echo "keine ganze Note eingegeben";
        break;
}

?>