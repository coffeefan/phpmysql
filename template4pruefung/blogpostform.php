<?php
require_once realpath(dirname(__FILE__))."/authentification.php";
require_once realpath(dirname(__FILE__))."/validation.php";
//Better sultion with a template engine

function preparedata(){
    $data["title"]=$_POST["title"];
    $data["content"]=$_POST["content"];
    $data["blogpostid"]=$_POST["blogpostid"];
    $data["time"]=$_POST["time"];
    return $data;
}

function ShowErrorMessage($errotxt){
    ?>
    <p class="error">Es sind folgende Fehlermeldungen aufgetreten:<br/>
        <? echo $errotxt?>
    </p>
    <?
}

function ShowBlogPostForm($data){
?>
    <h2>Blog Post</h2>

    <form class="form-horizontal" action="index.php?page=<? echo $_GET["page"] ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="submitform" value="sended"/>
        <? //Die Blogpostid wird nur für das update gebraucht?>
        <input type="hidden" name="blogpostid" value="<? echo $data["blogpostid"]?>"/>
        <? //Das erstellungsdatum (time) wird nur für das update gebraucht?>
        <input type="hidden" name="time" value="<? echo $data["time"]?>"/>

        <div class="control-group">
            <label class="control-label"  for="title">Titel</label>
            <div class="controls">
                <input type="text" name="title" id="title" placeholder="" value="<? echo $data["title"]?>" required/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"  for="content">Inhalt</label>
            <div class="controls">
                <textarea name="content" placeholder="" required ><? echo $data["content"]?></textarea>
            </div>
        </div>

        <div class="controls">
            <input type="submit" value="Senden" class="btn" />
        </div>
    </form>
<?php
}
?>