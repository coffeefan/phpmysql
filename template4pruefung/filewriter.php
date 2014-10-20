<?php

function writeFileToServer($filename,$inhalt){
    $path='posts/'.$filename;
    if(file_put_contents($path, $inhalt)){
        return $path;
    }else{
        echo 'Das Bugfile konnte nicht geschrieben werden';
        return false;
    }
}

function getContentOfFile($filename){
    $dir="posts";
    $content="";
    $handle = fopen($dir."/".$filename, "r");
    $content.= fread($handle, filesize($dir."/".$filename));
    fclose($handle);
    return $content;
}

function deleteFile($filename){
    $dir="posts";
    return unlink($dir."/".$filename);
}

function getAllFiles(){
    $dir="posts";
    $files=array();
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                array_push($files,getContentOfFile($file));
            }
        }
        closedir($handle);
    }

    //Neuste Files zuerst
     arsort (  $files);
    return $files;
}

