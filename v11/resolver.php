<?php
require_once realpath(dirname(__FILE__))."/KantonModel.php";
$methode="list";
$filterkey=[["key"=>null,"value"=>null]];
$filterkey=
$sort=null;
$filterkeyzaehler=0;
foreach($_REQUEST as $key=>$value){
    //Service
    if($key=="service"){
        if($value!="kantone"){
            throw new Exception("Just  kanton service available");
        }
    }else if($key=="methode"){
        $methode=$value;
    }else if($key=="sort"){
        $sort=$value;
    }else{
        $filterkey[$filterkeyzaehler]["key"]=$key;
        $filterkey[$filterkeyzaehler]["value"]=$value;
        $filterkeyzaehler++;
    }
}
validate($filterkey,$methode);
$km = new KantoneModel();
$back=$km->getKanton($filterkey[0]["key"],$filterkey[0]["value"],$sort);
if($methode==="single"){
    echo json_encode($back[0]);
}else{
    echo json_encode($back);
}

function validate($filterkey,$methode){
    if(count($filterkey)>1){
        throw new Exception("Just One Filter allow");
    }
    if($methode!="list"&&$methode!="single"){
        throw new Exception("Just list and single methode allow");
    }
}


?>