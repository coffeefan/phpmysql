<?php
	// error reporting, falls nicht in php.ini schon gesetzt
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

// dieses beispiel ist bad practice für das referenzieren und läuft nur unter php 5.3 oder kleiner, siehe:
// http://stackoverflow.com/a/8971301

?>
<html>
<head>
<title>uebung</title>
</head>
<body>
<?php
	
	function quadrat($zahl){
		echo "<br/>Die Quadratzahl von $zahl ist: ";
		$zahl = $zahl * $zahl;
		echo $zahl;
	}

	$zahl = 2;
	echo '<p>Ausgangswert von $zahl: ' . $zahl . '</p>';
	echo '<i>call-by-value:</i>';
	
	for($i = 1; $i <= 5; $i++){
		quadrat($zahl);			// call by value
	}

	echo '<br/><br/><i>call-by-reference:</i>';

	for($i = 1; $i <= 5; $i++){
		quadrat(&$zahl);				// call by ref - what's wrong? :)
	}

?>
</body>
</html>