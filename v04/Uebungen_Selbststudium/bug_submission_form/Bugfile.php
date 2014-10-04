<?php
require_once realpath(dirname(__FILE__))."/filewriter.php";

function prepareBugFileInhalt($data){
    $txt='--------------------------------------------------------------------
| BUG-REPORT                                                       |
--------------------------------------------------------------------
Name:'.$data["name"].'
E-Mail:'.$data["email"].'
Web:'.$data["web"].'
Fehlerreport:'.$data["fehlerreport"].'
Prio:'.$data["prio"].'
Bugtype:'.$data["bugtype"].'
Rückruf:'.$data["rueckruftxt"].'
Datum:'.$data["datum"];

    return $txt;
}

function makeBugFile($data,$filename){
    $txt=prepareBugFileInhalt($data);
    $filenpath=writeFileToServer($filename,$txt);
    return $filenpath;
}