<?php
include('sql_conf.php'); 
$db = mysql_connect($sql_url,$sql_login,$sql_pass)  or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());



$sql2="Select * from espace_eleve_final";
$req=mysql_query($sql2) or die($req.' Erreur SQL !'.$sql2.'<br />'.mysql_error());

while($row = mysql_fetch_array($req)) {
			echo $row['nom'];
			echo "<br>";
			echo "<img src='".$row['photo_ppt']."'>";
			echo "<br>";
			echo "<br>";			
      	}
mysql_close($db);