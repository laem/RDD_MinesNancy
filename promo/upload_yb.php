<html>
<body>
<?php
//ouverture de la connection � la base
include('sql_conf.php'); 
$db = mysql_connect($sql_url,$sql_login,$sql_pass)  or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());

//R�cup�ration de l'image
$repertoireDestination = dirname(__FILE__). DIRECTORY_SEPARATOR ."pdf";
$nomDestination        = "jpg_".date("YmdHis").".jpg";

if (is_uploaded_file($_FILES["photo_yearbook"]["tmp_name"])) {
	if (copy($_FILES["photo_yearbook"]["tmp_name"],$repertoireDestination. DIRECTORY_SEPARATOR .$nomDestination)) {
		
		//recherche d'une �ventuelle ancienne image et suppression
		$sql2="Select photo_yearbook from espace_eleve where identifiant='".($_POST['login'])."'";
		$req=mysql_query($sql2) or die($req2.' Erreur SQL !'.$sql2.'<br />'.mysql_error());
		
		if(mysql_num_rows($req)!=0 && mysql_result($req,0,'photo_yearbook')!=""){
			unlink(dirname(__FILE__)."/pdf/".mysql_result($req,0,'photo_yearbook'));
		}
		
		//Mise � jour des donn�es sur la photo
		$sql2="Update espace_eleve set photo_yearbook='".$nomDestination."'  where identifiant='".$_POST['login']."'";
		$req2=mysql_query($sql2) or die($req2.' Erreur SQL !'.$sql2.'<br />'.mysql_error());
		?>
        <form name="espace_perso" id="espace_perso" method="post" action="profil_util.php">
        <input type="hidden" name="login" value="<?php echo $_POST['login']; ?>" />          
		<input type="hidden" name="mdp" value="<?php echo $_POST['mdp']; ?>"  />
        </form>
        
		<SCRIPT language="Javascript">
		document.getElementById('espace_perso').submit();
		</script>
		<?php
	}
	else {
		echo "Le d�placement du fichier temporaire a �chou�"." v�rifiez l'existence du r�pertoire ".$repertoireDestination;
		echo '<br>';
		echo $repertoireDestination. DIRECTORY_SEPARATOR .$nomDestination;
		echo '<br>';
		echo $_FILES["photo_yearbook"]["tmp_name"];
	}          
} 
else {
	echo "Le fichier est trop gros (2 Mo max.). Veuillez r��sayer s'il vous plait.";
}

?>



</body>
</html>
    
