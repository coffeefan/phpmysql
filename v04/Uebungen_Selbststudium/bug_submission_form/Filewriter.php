<?php
/**
 * Created by PhpStorm.
 * User: cbach_000
 * Date: 03.10.14
 * Time: 17:55
 */

function writeFileToServer($filename,$inhalt){
    $path='data/'.$filename;
    echo $path;
    if(file_put_contents($path, $inhalt)){
        return $path;
    }else{
        echo 'Das Bugfile konnte nicht geschrieben werden';
        return false;
    }
}

function writeBildToServer($filesvarname,$filename){
    echo "Upload: " . $_FILES[$filesvarname]["name"] . "<br>";
    echo "Type: " . $_FILES[$filesvarname]["type"] . "<br>";
    echo "Size: " . ($_FILES[$filesvarname]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES[$filesvarname]["tmp_name"] . "<br>";
    $endung=substr($_FILES[$filesvarname]["name"],strrpos ($_FILES[$filesvarname]["name"],"."));
    echo "Endung:".$endung;
    $filepath="data/" . $filename.$endung;
    echo "Newfilepath:".$filepath;
    if (file_exists($filepath)) {
        echo $_FILES["file"]["name"] . " already exists. ";
    } else {
        move_uploaded_file($_FILES[$filesvarname]["tmp_name"],
            $filepath);


   }
    return $filepath;
}

