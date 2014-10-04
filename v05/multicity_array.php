<?php
$multiCity = array(
    array('City', 'Country', 'Continent'),
    array('Tokyo', 'Japan', 'Asia'),
    array('Mexico City','Mexico', 'North America'),
    array('New York City', 'USA', 'North America'),
    array('Mumbai', 'India', 'Asia'),
    array('Seoul', 'Korea', 'Asia'),
    array('Shanghai', 'China', 'Asia'),
    array('Lagos', 'Nigeria', 'Africa'),
    array('Buenos Aires', 'Argentina', 'South America'),
    array('Cairo', 'Egypt', 'Africa'),
    array('London', 'UK','Europe')
);

function alphasort ($a, $b){
    return strcmp($a[1], $b[1]);
}
?>
<html>
<head>
<title>Multi-dimensional Array</title>
<style type="text/css">
td, th {width: 8em; border: 1px solid black; padding-left: 4px;}
th {text-align:center;}
table {border-collapse: collapse; border: 1px solid black;}
</style>
</head>
 <body>
<h2>Auflistung Array<br /></h2>
 <table>
<thead>

<tr>
<?php
    foreach($multiCity[0] as $value){
        echo "<td>".$value."</td>";
    }
?>

</tr>
</thead>
 <?php
     foreach($multiCity as $item){
         if($item[0]!="City"){
            echo'<tr>';
            foreach($item as $value){
                echo "<td>".$value."</td>";
            }
            echo'</tr>';
         }
     }// durchiterieren und key/values ausgeben
?>
 </table>

<h2>Auflistung der St&auml;dte in Asien<br /></h2>
<table>
<?php
foreach($multiCity as $item){
    if($item[2]==="Asia"){
       echo'<tr><td>'.$item[0]."</td></tr>";
    }
}

?>
</table>
<h2>Auflistung der Kontinente, sowie die Zahl der L&auml;nder darin (im Array)<br /></h2>
<table>
<?
$laenderanzahl=array();
foreach($multiCity as $item){
    if($item[0]!="City"){
        if(!isset($laenderanzahl[$item[2]])){
            $laenderanzahl[$item[2]]=1;
        }else{
            $laenderanzahl[$item[2]]++;
        }
    }
}
foreach($laenderanzahl as $key=>$value){
    echo'<tr><td>'.$key."</td><td>".$value."</td></tr>";
}
?>
</table>

<h2>Auflistung nach L&auml;nder A-Z <br /></h2>
<table>
    <thead>

    <tr>
    <?php
        usort($multiCity,"alphasort");
        foreach($multiCity as $item){
            if($item[0]=="City"){
                echo'<tr>';
                foreach($item as $value){
                    echo "<td>".$value."</td>";
                }
                echo'</tr>';
            }
        }// durchiterieren und key/values ausgeben
    ?>

    </tr>
    </thead>
    <?php
    foreach($multiCity as $item){
        if($item[0]!="City"){
            echo'<tr>';
            foreach($item as $value){
                echo "<td>".$value."</td>";
            }
            echo'</tr>';
        }
    }// durchiterieren und key/values ausgeben
    ?>
    </table>
</body>
</html>

