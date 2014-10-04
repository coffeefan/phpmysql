<?php
	// error reporting, falls nicht in php.ini schon gesetzt
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
?>
<html>
<head>
<title>uebung</title>
</head>
<body>
<ul>
<li>funktion mit 3 paramentern: anzahl, preis, waehrung</li>
<li>vordefiniert: preis mit 45, waehrung mit CHF</li>
<li>erfolgen soll die ausgabe der kosten</li>
<li>kosten(7, 39.99, "Dollar"); </li>
<li>kosten(10);	</li>
<li>kosten(15,29);</li>
</ul>
<hr/>
<?php
	
	function kosten($anzahl, $preis = 45, $waehrung = "CHF"){
		echo "Kosten: " . ($anzahl * $preis) . " $waehrung.<br/>";
	}
	
	kosten(7, 39.99, "Dollar"); // normaler Aufruf
	kosten(10);					// std-Werte verwenden
	kosten(15,29);				// letzter std-Wert verwenden

?>
</body>
</html>