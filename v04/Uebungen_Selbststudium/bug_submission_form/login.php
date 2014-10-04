<?php
require_once realpath(dirname(__FILE__))."/authentification.php";
function loginController(){
   //Info message aktivierbar von anderen Seiten
   if(isset($_REQUEST["pleaseloginMessage"])){
        pleaseloginMessage();
   }
   //Abmelden
   if(isset($_REQUEST["logout"])){
        logout();
   }
   //Einloggen
   if(isset($_REQUEST["passwort"])){
       if(checklogin($_REQUEST["passwort"])){
           echo 'Herzlich Willkommen';
       }else{
           echo ' <p class="error">Login Fehler</p>';
       }
   }
   //Je nach Status Login oder Logout-Form anzeigen
    if(checkAuthentification()){
        logoutShowForm();
    }else{
        loginShowForm();
    }

}

function pleaseloginMessage(){?>
    Bitte melden Sie sich zuerst an. Danke.;
<?
}

function loginShowForm(){
?>
    <h2>Login</h2>

    <form class="index.php?page=login" action="index.php?page=login" method="POST" >

        <div class="control-group">
            <label class="control-label"  for="name">Passwort</label>
            <div class="controls">
                <input type="password" name="passwort" />
            </div>
        </div>

        <div class="controls">
            <input type="submit" value="Login" />
        </div>
    </form>
<?php
}

function logoutShowForm(){
    ?>
    <h2>Login</h2>

    <form class="index.php?page=login" action="index.php?page=login" method="POST" >
        <input type="hidden" name="logout" value="logout" />
        <div class="controls">
            <input type="submit" value="Logout" />
        </div>
    </form>
<?php
}
?>