
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html lang="fr"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    

<head>
	<style type="text/css"> 
	
	body { 
		margin: 0 auto; 
		background: #f5f5f5; 	
		color: #555;	 
		width: 800px; 		
	}
	
	h1 { 
		color: #555; 
		margin: 0 0 10px 0; 
		text-align:center;
	}	
		
	
	form { 
		float: left;
		border: 1px solid #ddd; 
		padding: 30px 40px 20px 40px; 
		margin: 30px 0 0 0;
		width: 850px;
		background: #fff;
						
	}	
	
	fieldset { 
		float: left;
		border: 1px solid #ddd; 
		padding: 30px 40px 20px 40px; 
		margin: 0 0 0 0;
		background: #fff;
	}
	
	input, textarea { 		
		padding: 8px; 
		margin: 4px 0 20px 0; 
		background: #fff; 
		width: 220px; 
		font-size: 14px; 
		color: #555; 
		border: 1px #ddd solid;		
	}
	
	textarea {		
		width: 390px; 
		height: 175px; 		 		
	}
	
	input:hover, textarea:hover { 
		background: #eee; 
	}
		
		
	</style> 
    <meta name="robots" content="noindex, nofollow">
    <script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-30461311-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

	</script>
    

                
    <title>Espace d&eacute;dicace</title>
</head>
<body>
<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$promo = $_POST['promo'];
$text = $_POST['text'];

//ecriture dans le log
$monfichier = fopen(dirname(__FILE__)."/pics/txt_".date("YmdHis").".txt", 'w'); 
{ 
	fputs($monfichier,"$nom"."/"."$prenom"."/"."$mail"."/"."$promo"."/"."$text");
} 
fclose($monfichier);

//ouverture de la connection à la base
include('sql_conf.php'); 
$db = mysql_connect($sql_url,$sql_login,$sql_pass)  or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());

//Récupération de l'image
$nomimage=NULL;
if (isset($_FILES['picture']) && $_FILES["picture"]["tmp_name"]!=""){
$repertoireDestination = dirname(__FILE__)."/pics/";
$nomDestination        = "jpg_".date("YmdHis").".jpg";
if (is_uploaded_file($_FILES["picture"]["tmp_name"])) {
	if (rename($_FILES["picture"]["tmp_name"],$repertoireDestination.$nomDestination)) {
		//up ok
		$nomimage=$nomDestination;
	}
	else {
		echo "Le déplacement du fichier temporaire a échoué"." vérifiez l'existence du répertoire ".$repertoireDestination;
	}          
} 
else {
	echo "Le fichier est trop gros (20 Mo max.). Veuillez réésayer s'il vous plait.";
}
}
//enregistrement en base

	$sql2="INSERT INTO ub(prenom, nom, mail, promo, text, picture) VALUES('".mysql_escape_string($prenom)."','".mysql_escape_string($nom)."','".mysql_escape_string($mail)."','".mysql_escape_string($promo)."','".mysql_escape_string($text)."','".$nomimage."')";
$req=mysql_query($sql2) or die($req.' Erreur SQL !'.$sql2.'<br />'.mysql_error());

echo "Ta contribution a correctement été ajoutée au livre d'or d'Ulrike. Merci beaucoup !";
?>

</body>    
<?php
mysql_close($db);
?>
            

</body>
</html>
