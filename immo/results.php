<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<style type="text/css">
.base {
	height: auto;
	width: 500px;
}
.base .bien {
	height: 360px;
	width: 480px;
	margin-right: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
}
.base .bien .photo {
	float: left;
	height: 225px;
	width: 300px;
}
.base .bien .infos {
	float: right;
	height: 225px;
	width: 170px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.base .bien .infos .titre {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.base .bien .infos .rel {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	margin-top: 10px;
}
.base .bien .desc {
	text-align: justify;
	height: 125px;
	width: 480px;
}
</style>
</head>

<body>
<div class="base">
  <?php
	include('sql_conf.php');
	$db = mysql_connect($sql_url,$sql_login,$sql_pass)  or die('Erreur de connexion '.mysql_error());
	mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());
  	$sql="select * from locations";
  	$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
	$total = mysql_num_rows($req);
	while($row = mysql_fetch_array($req)) {
		echo '<div class="bien"><br>';
		echo '<div class="photo"><img src="'.$row['lien_image_principale'].'" alt="" name="FichePhotoPrincipale" width="300" border="0" id="FichePhotoPrincipale" /><br></div>';
		echo '<div class="infos">
		<div class="titre">Appartement à vendre</div>
      	<div class="rel">
		<p>'.$row['ville'].'</p>
		<p>'.$row['surface'].'</p>
        <p>'.$row['pieces'].'</p>
		<p>'.$row['chambre'].'</p>
		<p>'.$row['douche'].'</p>
		<p>'.$row['bains'].'</p>
		<p>'.$row['prix'].'</p>
        </div>
		</div><p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
		<div class="desc">
		'.$row['description'].'
		</div>
		</div><br>';				
	}
  ?>
</div>
</body>
</html>
