<?php

# Include the Dropbox SDK libraries
require_once "lib/Dropbox/autoload.php";
use \Dropbox as dbx;

function getdbxClient(){
    $accessToken="Sapwcz0XcHwAAAAAAAAACRsq6Ik_KZOOxDK19vqSkqXskKL2PoSaTXg-_lt2FVHc";
    $dbxClient = new dbx\Client($accessToken, "PHP-Example/1.0");
    return $dbxClient;
}

function uploadFilesToDropbox($filepath){
    try{
        $filename=substr($filepath,strrpos($filepath,"/")+1);
        $dbxClient=getdbxClient();
        $f = fopen($filepath, "rb");
        $result = $dbxClient->uploadFile("/cbachmann/".$filename, dbx\WriteMode::add(), $f);
    }catch(Exception $ex){
        echo "Der Dropbox upload ging schief".$ex;
    }

}
