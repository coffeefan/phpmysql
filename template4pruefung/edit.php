<?
require_once realpath(dirname(__FILE__))."/blogpostform.php";
require_once realpath(dirname(__FILE__))."/blogmanager.php";
function editController(){
    //Authentification überprüfen
    checkAuthentificationLink();
    //Standartmässig formular anzeigen
    $data=editstandartparams();
    $showformular=true;
    if($data==null){
        $showformular=false;
    }

    //Fals formular abgesendet wurde dieses überprüfen
    if(isset($_POST["submitform"])){
        $errotxt="";
        $errotxt.=checkString($_POST['title'],2,'Titel');
        $errotxt.=checkString($_POST['content'],10,'Inhalt');
        if($errotxt===""){
            updateBlog($_POST['blogpostid'],$_POST['title'],$_POST['content'],$_POST['time']);

            echo "Der Blog wurde erfoglreich upgadeted";
        }else{
            ShowErrorMessage($errotxt);
        }

    }

    if($showformular){
        ShowBlogPostForm($data);
    }
}

function editstandartparams(){
    if(isset($_REQUEST["blogpostid"])){
        return getBlogPost($_REQUEST["blogpostid"]);
    }else{
        echo "Keinen Parameter gesetzt";
        return null;
    }

}
?>