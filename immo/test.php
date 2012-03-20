<?php
include('sql_conf.php'); 
$db = mysql_connect($sql_url,$sql_login,$sql_pass)  or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());

$sql="select * from locations";
$result=mysql_query($sql) or die($result.' Erreur SQL !'.$sql.'<br />'.mysql_error());

echo mysql_result($result,0,'ville');
		
?>