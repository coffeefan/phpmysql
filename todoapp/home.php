<?
require_once realpath(dirname(__FILE__))."/todomanager.php";
require_once realpath(dirname(__FILE__))."/validation.php";
function homeController(){
    //Todo erledigt
    if(isset($_REQUEST["delete"])){
        deleteTodo($_REQUEST["delete"]);
        echo "<span class'info'>Der Todo wurde erfoglreich gespeichert</span>";
    }
    //Todo erledigt
    if(isset($_REQUEST["completed"])){
        changStatus("completed",$_REQUEST["completed"]);
    }
    //Todo nicht mehr erledigt
    else if(isset($_REQUEST["uncompleted"])){
        changStatus("uncompleted",$_REQUEST["uncompleted"]);
    }
    //Save Todo
    else if(isset($_REQUEST["description"])){
        $errotxt="";
        $errotxt.=checkString($_REQUEST["description"],2, "Todo Beschreibung");
        if(trim($_REQUEST["deadline"])!==""){
            $errotxt.=checkDateField($_REQUEST["deadline"],"Fälligkeitsdatum");
        }else{
            $_REQUEST["deadline"]=null;
        }
        if($errotxt===""){
            $todo["deadline"]=$_REQUEST["deadline"];
            $todo["description"]=$_REQUEST["description"];
            //Update oder neu?
            if(isset($_REQUEST["todoid"])){
                $todo["todoid"]=$_REQUEST["todoid"];
                updateTodo($todo);
            }else{
                insertTodo($todo);
            }
            echo "<span class'info'>Der Todo wurde erfoglreich gespeichert</span>";
        }else{
            ShowErrorMessage($errotxt);
        }
    }

    showHome();
}




function showHome(){
?>
<div class="newtodo">
    <form class="form-inline" role="form" method="POST"  action="index.php">
    <div class="row">
        <div class="col-md-6"><input name="description" type="text" placeholder="New todo" /></div>
        <div class="col-md-4"><input id="deadline" name="deadline" type="date"  /></div>
        <div class="col-md-2"><button type="submit" class="btn btn-default"  >Speichern</button></div>
    </div>
    </form>
</div>

    <div class="table-responsive">
    <table class="table">
<?
    $todos=showTodos();
    foreach($todos as $todo){
        if(isset($_GET["edit"])&&$_GET["edit"]==$todo["todoid"]){
            ?>

        <tr>
            <td>
            <form class="form-inline" role="form" method="POST" action="index.php">
                <input type="hidden" name="todoid" value="<? echo  $todo["todoid"] ?>">
                <div class="row">
                    <div class="col-md-6"><input name="description" type="text" value="<? echo  $todo["description"] ?>" /></div>
                    <div class="col-md-4"><input id="deadline" name="deadline" type="date" value="<? echo  $todo["deadline"] ?>"   /></div>
                    <div class="col-md-2"><button type="submit" class="btn btn-default"  >Aktualisieren</button></div>
                </div>
            </form>
           </td>
        </tr>
        <? } else {?>
        <tr class="<? if( $todo["status"]==="completed") echo 'completed';?>">
            <td >
                <? if( $todo["status"]==="completed"){?>
                    <input name="status" type="checkbox"  onchange="window.location='index.php?uncompleted=<?echo $todo["todoid"]?>'" checked="checked" />
                <?} else {?>
                    <input name="status" type="checkbox"  onchange="window.location='index.php?completed=<?echo $todo["todoid"]?>'" />
                <?}?>
                </td><td><? echo showDate($todo["deadline"]);?><br/><?echo $todo["description"];?> </td>
                <td ><a class="btn btn-primary" href="index.php?delete=<?echo $todo["todoid"];?>">Löschen</a></td>
        </tr>

        <? } ?>

    <?}?>
    </table>
    </div>
<?}



function ShowErrorMessage($errotxt){
    ?>
    <p class="error">Es sind folgende Fehlermeldungen aufgetreten:<br/>
        <? echo $errotxt?>
    </p>
<?
}



function showDate($date){
    if($date!=""){
        $datearray=explode("-", $date);
        return "<span class='date'>".$datearray[2].".".$datearray[1].".".$datearray[0]."</span>";
    }else{
        return "";
    }
}
?>
