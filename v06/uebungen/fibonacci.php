<?
$anzahl=50;
$x = 0;
echo $x."<br />";
$y = 1;
echo $y."<br />";

for($i=0;$i<=$anzahl;$i++)
{
    $z = $x + $y;
    echo $z."<br />";
    $x=$y;
    $y=$z;
}
?>