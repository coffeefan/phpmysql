<?php

function checkAuthentification(){
    if(isset($_SESSION["mypw"])&&$_SESSION["mypw"]===md5("thepassword")){
        return true;
    }else{
        return false;
    }
}

function checkAuthentificationLink(){
    if(checkAuthentification()){
        return true;
    }else{
        header("Location:index.php?page=login&pleaseloginMessage=1");
        return false;
    }
}

function checklogin($password){
    //okey etwas witzlos die md5 Geschichte hier
    if(md5($password)==md5("thepassword")){
        $_SESSION["mypw"]=md5($password) ;
        return true;
    }else{
        return false;
    }
}

function logout(){
    session_unset();
}