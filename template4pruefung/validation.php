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


