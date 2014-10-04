<?php
/**
 * Created by PhpStorm.
 * User: cbach_000
 * Date: 02.10.14
 * Time: 17:20
 */

require_once realpath(dirname(__FILE__))."/lib/securimage/securimage.php";
function checkCaptcha($captcha){
    $errortxt="";
    $securimage = new Securimage();
    if ($securimage->check($captcha) == false) {
        $errortxt="Das Captcha stimmt nicht<br/>";
    }
    return $errortxt;
}


function checkEMail($mail_address) {
    $errortxt="";
    $pattern = "/^[\w-]+(\.[\w-]+)*@";
    $pattern .= "([0-9a-z][0-9a-z-]*[0-9a-z]\.)+([a-z]{2,4})$/i";
    if (preg_match($pattern, $mail_address)) {
        //ok
    } else {
        $errortxt="Die E-Mail Adresse ist nicht korrekt<br/>";
        // return false;
    }
    return $errortxt;
}

function checkUrl($url) {
    $errortxt="";
    $pattern = '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\.\/\?\:@\-_=#])*/';
    if (preg_match($pattern, $url)) {
        //ok
    } else {
        $errortxt="Die Url ist nicht korrekt<br/>";
        // return false;
    }
    return $errortxt;
}


function checkString($field,$minanzahl,$feldname){
    $errortxt="";
    if(strlen($field)<$minanzahl){
        $errortxt="Das Feld ".$feldname." muss ".$minanzahl." Zeichen lang sein<br/>";
    }else{
        //ok
    }
    return $errortxt;
}

function checkNummerZahl($field,$minanzahl,$maxanzahl,$feldname){
    $errortxt="";
    if(is_numeric($field)){
        if((strlen($field)>=$minanzahl)&&(strlen($field)<=$maxanzahl)){
            //ok
        }else{
            $errortxt="Das Feld ".$feldname." muss zwischen ".$minanzahl." und ".$maxanzahl."  lang sein<br/>";
        }
    }else{
        $errortxt="Das Feld ".$feldname." darf nur Zahlen enthalten!<br/>";
    }
    return $errortxt;
}

function validatepicture($filesvarname){
    echo"WWWW".$_FILES[$filesvarname]["size"];
    $errotxt="";
    if(isset($_FILES[$filesvarname])){
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES[$filesvarname]["name"]);
        $extension = end($temp);

        if ((($_FILES[$filesvarname]["type"] == "image/jpeg")
                || ($_FILES[$filesvarname]["type"] == "image/jpg")
                || ($_FILES[$filesvarname]["type"] == "image/pjpeg")
                || ($_FILES[$filesvarname]["type"] == "image/x-png")
                || ($_FILES[$filesvarname]["type"] == "image/png"))
            && ($_FILES[$filesvarname]["size"] < 800000)
            && in_array($extension, $allowedExts)) {
            if ($_FILES[$filesvarname]["error"] > 0) {
                $errotxt="Beim Uploaden der Datei sind folgende Fehler aufgetreten:". $_FILES[$filesvarname]["error"] . "<br>";
            }
        }else{
            $errotxt="Die Datei ist nicht im richtigen Format. Reichen Sie nur Bilder jpeg oder PNG Format ein";
        }
    }else{
        $errotxt="Es wurde kein Screenshot ausgewählt";
    }

    return $errotxt;
}