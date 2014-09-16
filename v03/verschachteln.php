<?
$weight=23;
$category="";
if($weight>=0 &&$weight<=20){
    $category="S (bis 20kg)";
} else if($weight>20 &&$weight<40){
    $category="M (bis 40kg)";
}
else if($weight>40 &&$weight<=60){
    $category="L (bis 60kg)";
}
else if($weight>60){
    $category="XL (mehr als 60kg)";
}

echo "Das Gep&auml;ckstuck wiegt ".$weight." kg. Es geh&ouml;rt zur Kategorie ".$category."<br/>";

echo "Kategoarien: 0-20,20-40,40-60, mehr als 60kg";
?>