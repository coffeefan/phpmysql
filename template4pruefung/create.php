<?
require_once realpath(dirname(__FILE__))."/blogpostform.php";
function createController(){
    //Authentification überprüfen
    checkAuthentificationLink();
    //Standartmässig formular anzeigen
    $data=createstandartparams();
    $showformular=true;

    //Fals formular abgesendet wurde dieses überprüfen
    if(isset($_POST["submitform"])){
        $errotxt="";
        $errotxt.=checkString($_POST['title'],2,'Titel');
        $errotxt.=checkString($_POST['content'],10,'Inhalt');
        if($errotxt===""){
            $showformular=false;
            createBlog($_POST['title'],$_POST['content']);
            echo "Der Blog wurde erfoglreich erstellt";
        }else{
            ShowErrorMessage($errotxt);
        }

    }

    if($showformular){
        ShowBlogPostForm($data);
    }
}

function createstandartparams(){
    $data["title"]="";
    $data["content"]="";
    $data["blogpostid"]="-1";
    $data["time"]="";
    return $data;
}
?>