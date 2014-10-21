<?php

function checkString($field,$minanzahl,$feldname){
    $errortxt="";
    if(strlen($field)<$minanzahl){
        $errortxt="Das Feld ".$feldname." muss ".$minanzahl." Zeichen lang sein<br/>";
    }else{
        //ok
    }
    return $errortxt;
}


function checkDateField($field,$feldname){
    $errortxt="";
    $date=explode("-", $field);
    if(checkdate($date[1], $date[2], $date[0])){
        //ok
    }else{
        $errortxt="Das ".$feldname." muss ein korrektes Datum sein<br/>";
    }
    return $errortxt;
}

?>

