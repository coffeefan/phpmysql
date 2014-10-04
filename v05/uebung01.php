<?php
/**
 * Created by PhpStorm.
 * User: cbach_000
 * Date: 30.09.14
 * Time: 18:17
 */
function kosten($anzahl,$preis=45,$waehrung='CHF'){
    echo 'Kosten: '.($anzahl*$preis)." ".$waehrung;
}

kosten(7,39.99,"Doller");
kosten(10);
kosten(15,29);