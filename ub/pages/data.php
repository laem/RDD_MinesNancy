<?php

include('db_infos.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$promo = $_POST['promo'];
$text = $_POST['text'];

$picture = "null";
$error = "none";

/*$point = strpos($mail,".");
$at = strpos($mail,"@");
$nom = substr($mail,$point+1,$at-$point-1);
$prenom = substr($mail,0,$point);
//$prenom = substr($mail,0,strlen($mail)-strlen($nom)-1);*/

/* To lower case */
$nom = ucfirst(strtolower($nom));
$prenom = ucfirst(strtolower($prenom));
$mail = strtolower($mail);
/* Picture */
if (isset($_FILES['picture']))
{
	if($_FILES['picture']['error'] == 0)
	{
		$infosfichier = pathinfo($_FILES['picture']['name']);
		$extension_upload = strtolower($infosfichier['extension']);
		$extensions = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
		if (in_array($extension_upload, $extensions))
		{
			if ($_FILES['picture']['size'] <= 20000000)
			{
				echo "ok";
				$picture = str_replace("'","",$nom."_".$prenom."_".$mail . "." . $extension_upload);
				echo(move_uploaded_file($_FILES['picture']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/ub/pics/' . $picture));
				echo "ok2";
			}
			else
			{
				$error = "sz";
			}
		}
		else
		{
			$error = "ext";			
		}	
	}
	else
	{
		if($_FILES['picture']['error'] != 4)
		{
			$error = "srv";
		}
	}
}	
else
{
	
}

if($error == "none" AND $prenom != "")
{
	$bdd = mysql_connect($server, $username, $password)  or die('Erreur de connexion '.mysql_error());
	mysql_select_db($username,$bdd);
	$sql = "INSERT INTO ub(prenom, nom, mail, promo, text, picture) VALUES('".mysql_escape_string($prenom)."','".mysql_escape_string($nom)."','".mysql_escape_string($mail)."','".mysql_escape_string($promo)."','".mysql_escape_string($text)."','".mysql_escape_string(str_replace("'","",$picture))."')";
	mysql_query($sql) or die('Erreur SQL !'. $sql.mysql_error());
		/*$req = $bdd->prepare('INSERT INTO ub(prenom, nom, mail, promo, text, picture) VALUES(:prenom, :nom, :mail, :promo, :text, :picture)');
		$req->execute(array(
			'prenom' => $prenom,
			'nom' => $nom,
			'mail' => $mail,
			'promo' => $promo,
			'text' => $text,
			'picture' => $picture
		));*/
	mysql_close($bdd);
}
else
{
	$error = "srv";
}
//echo($error);
//echo($_FILES['picture']['error']);		
header('Location: ../index.php?err=' . $error);

/* Debug */
echo($prenom . " " .$nom . " de la promo " . $promo . " a post&eacute; \"" . $text . "\".<br />");
/* End of debug */

?>