<?
require_once realpath(dirname(__FILE__))."/blogmanager.php";

function deleteController(){
    //Authentification überprüfen
    checkAuthentificationLink();
    //Standartmässig formular anzeigen
    showDeleteConfirmationForm();


    //Fals formular abgesendet wurde dieses überprüfen
    if(isset($_POST["submitform"])){
        deleteBlog($_POST['blogpostid']);
        echo "Der Blog wurde erfoglreich gelöscht";
    }
}


function showDeleteConfirmationForm(){
?>
    <form class="form-horizontal" action="index.php?page=<? echo $_GET["page"] ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="submitform" value="sended"/>
        <input type="hidden" name="blogpostid" value="<? echo $_REQUEST["blogpostid"]?>"/>
        <div id="confirm" >
          <div class="modal-body">
            Wollen Sie wirklich Blgpost ID <? echo $_REQUEST["blogpostid"] ?> löschen?
          </div>
            <div class="controls">
                <a href="index.php" class="btn">Abbrechen</a>
                <input type="submit" value=" Ja löschen" />
            </div>

        </div>

    </form>
<?
}
?>