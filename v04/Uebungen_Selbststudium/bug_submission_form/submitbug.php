<?php
require_once realpath(dirname(__FILE__))."/authentification.php";
require_once realpath(dirname(__FILE__))."/validation.php";
require_once realpath(dirname(__FILE__))."/bugfile.php";
require_once realpath(dirname(__FILE__))."/mailit.php";
require_once realpath(dirname(__FILE__))."/dropbox.php";
//Better sultion with a template engine

function submitBugController(){
    //Authentification überprüfen
    checkAuthentificationLink();
    //Standartmässig formular anzeigen
    $showformular=true;
    $data=standaloneparams();

    //Fals formular abgesendet wurde dieses überprüfen
    if(isset($_POST["submitbugform"])){
        $errotxt="";
        $errotxt.=checkCaptcha($_POST['captcha_code']);
        $errotxt.=checkString($_POST['name'],2,'Name');
        $errotxt.=checkEMail($_POST['email']);
        $errotxt.=checkUrl($_POST['web']);
        $errotxt.=checkString($_POST['fehlerreport'],20,'Text');
        $errotxt.=validatepicture('bild');
        $data=preparedata();
        if($errotxt===""){
            $showformular=false;
            $screenshot=writeBildToServer('bild',strtotime("now"));
            $bugfile=makeBugFile($data,strtotime("now").".txt");
            uploadFilesToDropbox($bugfile);
            uploadFilesToDropbox($screenshot);
            mailbugreport($bugfile,$screenshot);
        }else{
            submitBugShowErrorMessage($errotxt);
        }
    }
    if($showformular){
        submitBugShowForm($data);
    }
}

function preparedata(){
    $data["name"]=$_POST["name"];
    $data["email"]=$_POST["email"];
    $data["web"]=$_POST["web"];
    $data["fehlerreport"]=$_POST["fehlerreport"];
    $data["prio"]=$_POST["prio"];
    $data["datum"]=$_POST["datum"];
    $data["bugtype"]=$_POST["bugtype"];
    $data["rueckruftxt"]="Nein";
    if (isset($_POST['rueckruf'])) {
        $data["rueckruftxt"]="Ja";
    }
    return $data;
}

function standaloneparams(){
    $data["name"]="";
    $data["email"]="";
    $data["web"]="";
    $data["fehlerreport"]="";
    $data["datum"]=date("d-m-Y");
    return $data;
}

function submitBugShowErrorMessage($errotxt){
    ?>
    <p class="error">Es sind folgende Fehlermeldungen aufgetreten:<br/>
        <? echo $errotxt?>
    </p>
    <?
}

function submitBugShowForm($data){
?>
    <h2>Bitte melde deinen Bug mit diesem Formular</h2>

    <form class="form-horizontal" action="index.php?page=submitbug" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="submitbugform" value="sended"/>
        <div class="control-group">
            <label class="control-label"  for="name">Name</label>
            <div class="controls">
                <input type="text" name="name" id="name" placeholder="John Doe" value="<? echo $data["name"]?>" required/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"  for="email">E-Mail</label>
            <div class="controls">
                <input type="email" name="email" id="email" placeholder="mail@example.com" value="<? echo $data["email"]?>" required   />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"  for="web">Web</label>
            <div class="controls">
                <input type="url" name="web" id="web" placeholder="www.example.com" value="<? echo $data["web"]?>" required />
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input type="radio" name="reproduzierbar" id="reproduzierbar" value="Reproduzierbar" required />reproduzierbar

                <input type="radio" name="reproduzierbar" id="reproduzierbar" value="NICHT reproduzierbar" />NICHT reproduzierbar
            </div>
        </div>


        <div class="control-group">
            <label class="control-label"  for="fehlerreport">Fehlerreport</label>
            <div class="controls">
                <textarea name="fehlerreport" placeholder="fehlerreport" required ><? echo $data["fehlerreport"]?></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="bild">Screenshot(Bild)</label>
            <div class="controls">
            <input id="bild" type="file" class="bild" name="bild"  required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"  for="prio">Prio</label>
            <div class="controls">
                <input type="range" name="prio" id="prio" min="1" max="10" step="1" required/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"  for="bugtype">Bugtype</label>
            <div class="controls">
                <select name="bugtype" required>
                    <option value="1">Fatal Error</option>
                    <option value="2">Warning</option>
                    <option value="3">Notice</option>
                </select>
            </div>
        </div>


        <div class="control-group">
            <div class="controls">
                <label class="rueckruf">
                    <input type="checkbox" name="rueckruf" g> Rückruf erforderlich
                </label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"  for="datum">Datum</label>
            <div class="controls">
                <input id="datum" name="datum" type="date" value="<?echo $data["datum"]?>" required/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"  for="captcha">Captcha</label>
            <div class="controls">

            <img id="captcha" src="lib/securimage/securimage_show.php" alt="CAPTCHA Image" /><br/>
                <input type="text" name="captcha_code" size="10" maxlength="6" required /><br/>
            <a href="#" onclick="document.getElementById('captcha').src = 'lib/securimage/securimage_show.php?' + Math.random(); return false">Neues Bildli</a>
            </div>
        </div>

        <div class="controls">
            <input type="submit" value="Senden" />
        </div>
    </form>
<?php
}
?>