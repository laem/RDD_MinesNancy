<?php
include('sql_conf.php'); 
$db = mysql_connect($sql_url,$sql_login,$sql_pass) or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());

$utilisateur=null; 
if(isset($_POST["login"])){
	$utilisateur=$_POST["login"];
}



?>

 <script language="javascript">

		function supprimer() {
			if(document.getElementById("etat").value>0){
			document.getElementById("etat").value=document.getElementById("etat").value-1;
			}else{
				alert("Plus d'entrées disponibles");
			}
		}
		
		function supprimer2() {
			if(document.getElementById("nbr").innerHTML>0){
				document.forms["espace_perso"].submit();
			}else{
				alert("Plus d'entrées disponibles");
			}
		}
		
		function ajouter() {
			document.getElementById("etat").value=document.getElementById("etat").value-(-1);
		}
</script>
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html lang="fr"> 
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    

<head>
	<style type="text/css"> 
	@font-face { font-family : 'Yanone Kaffeesatz';
	src: url('font/YanoneKaffeesatz-Light.ttf') format('truetype'); }
	
	* { margin: 0px; padding: 0px; }
	
	body { 
		margin: 0 auto; 
		background: #f5f5f5; 	
		color: #555;	 
		width: 800px; 
				
		/* make reference to the Yanone Kaffeesatz font */
		font-family: 'Yanone Kaffeesatz', arial, sans-serif;
	}
	
	h1 { 
		color: #555; 
		margin: 0 0 10px 0; 
		text-align:center;
	}	
		
	label {	
		font-size: 20px;
		color: #666; 
	}
	
	form { 
		float: left;
		border: 1px solid #ddd; 
		padding: 30px 40px 20px 40px; 
		margin: 30px 0 0 0;
		width: 715px;
		background: #fff;
				
		/* -- CSS3 - define rounded corners for the form -- */	
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px; 		
		
		/* -- CSS3 - create a background graident -- */
		background: -webkit-gradient(linear, 0% 0%, 0% 40%, from(#EEE), to(#FFFFFF)); 
		background: -moz-linear-gradient(0% 40% 90deg,#FFF, #EEE); 
		
		/* -- CSS3 - add a drop shadow -- */
		-webkit-box-shadow:0px 0 50px #ccc;
		-moz-box-shadow:0px 0 50px #ccc; 
		box-shadow:0px 0 50px #ccc;		 		
	}	
	
	fieldset { 
		float: left;
		border: 1px solid #ddd; 
		padding: 30px 40px 20px 40px; 
		margin: 0 0 0 0;
		width: 635px;
		background: #fff;
				
		/* -- CSS3 - define rounded corners for the form -- */	
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px; 		
		
		/* -- CSS3 - create a background graident -- */
		background: -webkit-gradient(linear, 0% 0%, 0% 40%, from(#EEE), to(#FFFFFF)); 
		background: -moz-linear-gradient(0% 40% 90deg,#FFF, #EEE); 
		
		/* -- CSS3 - add a drop shadow -- */
		-webkit-box-shadow:0px 0 50px #ccc;
		-moz-box-shadow:0px 0 50px #ccc; 
		box-shadow:0px 0 50px #ccc;		
	}
	
	#user-details { 
		float: left;
		width: 230px; 
	}
	
	#user-message { 
		float: right;
		width: 405px;
	}
	
	input, textarea { 		
		padding: 8px; 
		margin: 4px 0 20px 0; 
		background: #fff; 
		width: 220px; 
		font-size: 14px; 
		color: #555; 
		border: 1px #ddd solid;
		
		/* -- CSS3 Shadow - create a shadow around each input element -- */ 
		-webkit-box-shadow: 0px 0px 4px #aaa;
		-moz-box-shadow: 0px 0px 4px #aaa; 
		box-shadow: 0px 0px 4px #aaa;
		
		/* -- CSS3 Transition - define what the transition will be applied to (i.e. the background) -- */		
		-webkit-transition: background 0.3s linear;							
	}
	
	textarea {		
		width: 390px; 
		height: 175px; 		 		
	}
	
	input:hover, textarea:hover { 
		background: #eee; 
	}
		
	input.submit { 	
		width: 170px; 
		color: #eee; 
		text-transform: uppercase; 
		margin-top: 10px;
		background-color: #18a5cc;
		border: none;
		
		/* -- CSS3 Transition - define which property to animate (i.e. the shadow)  -- */
		-webkit-transition: -webkit-box-shadow 0.3s linear;
		
		/* -- CSS3 - Rounded Corners -- */
		-moz-border-radius: 4px; 
		-webkit-border-radius: 4px;
		border-radius: 4px; 
						
		/* -- CSS3 Shadow - create a shadow around each input element -- */ 
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#18a5cc), to(#0a85a8)); 
		background: -moz-linear-gradient(25% 75% 90deg,#0a85a8, #18a5cc);		
	} 
	
	input.submit:hover { 		
		-webkit-box-shadow: 0px 0px 20px #555;
		-moz-box-shadow: 0px 0px 20px #aaa; 
		box-shadow: 0px 0px 20px #555;	
		cursor:  pointer; 
	} 		

	table,td{
		text-align:center;
		border               : 1px solid #CCC;
		border-collapse      : collapse;
	  font                 : small/1.5 "Tahoma", "Bitstream Vera Sans", Verdana, Helvetica, sans-serif;
	}
	table{
		border                :none;
		border                :1px solid #CCC;
	}
	thead th,
	tbody th{
		background            : #FFF url(th_bck.gif) repeat-x;
	  color                 : #666;  
		padding               : 5px 10px;
	  border-left           : 1px solid #CCC;
	}
	tbody th{
	  background            : #fafafb;
	  border-top            : 1px solid #CCC;
	  text-align            : left;
	  font-weight           : normal;
	}
	tbody tr td{
		padding               : 5px 10px;
	  color                 : #666;
	}
	
	tbody tr:hover td{
	  color                 : #454545;
	}
	tfoot td,
	tfoot th{
	  border-left           : none;
	  border-top            : 1px solid #CCC;
		padding               : 4px;
	  background            : #FFF url(foot_bck.gif) repeat;
	  color                 : #666;
	}
	caption{
		text-align            : left;
		font-size             : 120%;
		padding               : 10px 0;
		color                 : #666;
	}
	table a:link{
		color                 : #666;
	}
	table a:visited{
		color                 : #666;
	}
	table a:hover{
		color                 : #003366;
		text-decoration       : none;
	}
	table a:active{
		color                 : #003366;
	}
				
	</style> 
        
     
<title>RDDReam - Récapitulatif</title> 
</head>
<body>


<?php

//si non identifié
if((isset($_POST['connection']) && $_POST['mdp']=="rddream_best") || isset($_POST['retour'])){
	
	$sql="Select * from espace_eleve order by nom asc";
	$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
?>
	<br><br>
	
    <form name="espace_perso" method="post" action="interface_cocktail.php">
            
    <label for="eleve">Modifier l'élève suivant : </label><br />
    <select name="eleve" style="display: compact;">
    
    <?php
    while($row = mysql_fetch_array($req)) {	
      		echo "<option value='".$row['identifiant']."'>".$row['nom']."</option>";
      	} ?>
        </select>
        <input type="submit" value="Modifier" name="modifier" class="submit" />
        </form>
        
        <form name="espace_perso" method="post" action="interface_cocktail.php">
        <br /><label for="recherche">Recherche :</label>
        <input type="text" name="recherche" id="recherche" value=""  />
        <input type="submit" value="Rechercher" name="Rechercher" class="submit" />
        </form>
        <br /><br />
<center>
    <table>
    <tr>
    <td>Nom</td>
    <td>Code</td>
    <td>Nombre d'entrées restantes</td>
    </tr>
            <br>  
            <?php    
$total_entrees=NULL;
$sql="Select * from espace_eleve order by nom asc";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
while($row = mysql_fetch_array($req)){
		$num=NULL;
		$num=rand(100000000,999999999);
		
		if($row['code']==0){
			$sql2="Select * from espace_eleve where code=".$num;
			$req2=mysql_query($sql2) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
			
			if(mysql_num_rows($req2)!=0){
			
				$sql2="Update espace_eleve set code=".$num." where identifiant='".$row['identifiant']."'";
				$req2=mysql_query($sql2) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
				
			}else{
				$sql2="Update espace_eleve set code=".rand(100000000,999999999)." where identifiant='".$row['identifiant']."'";
				$req2=mysql_query($sql2) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
			}
			echo "Nouveaux codes générés, actualisez la page pour voir les codes des nouveaux invités !";
		}
		
		
	$nbr=$row['nombre_entree'];
	$total_entrees+=$nbr;
	echo '<tr>';
	echo '<td>';
	echo $row['nom'];
	echo '</td>';
	echo '<td>';
	echo $row['code'];
	echo '</td>';
	echo '<td>';
	echo $nbr;
	echo '</td>';
	echo '</tr>';
}

?>
</table>
<br /><br />
<table>
<tr>
<td>Entrées restantes</td>
<td><?php echo $total_entrees; ?></td>
</tr>
</table>

</form>          
  
<?php
}elseif(isset($_POST['eleve'])){
	$sql="Select * from espace_eleve where identifiant='".$_POST['eleve']."'";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
	?>
<form name="espace_perso" method="post" action="interface_cocktail.php">
    Elève choisi : <?php echo mysql_result($req,0,'nom'); ?>
    <br />
    Nombre d'entrées restantes : <?php 
	echo mysql_result($req,0,'nombre_entree');
	?>
    <br /><br />
    <input type="hidden" name="identifiant" value="<?php echo $_POST['eleve'];?>" />
    <label for="eleve">Modifier le nombre d'entrées : </label><input type="text" name="etat" id="etat" value="<?php echo mysql_result($req,0,'nombre_entree'); ?>" /><br />
    <input type="button" name="btn_supprimer" id="btn_supprimer" onClick="supprimer();" value="-1" width="10" class="submit">
    <input type="button" name="btn_ajouter" id="btn_ajouter" onClick="ajouter();" value="+1" width="10" class="submit"><br />
    <input type="submit" value="Modifier" name="etat2" class="submit" />
    <br /><a href="http://www.unitag.fr/qrcode" target="_blank">Générer QR Code</a>
        
        <?php
}elseif(isset($_POST['etat2'])){

	$sql="update espace_eleve set nombre_entree='".$_POST['etat']."' where identifiant='".$_POST['identifiant']."'";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
	?>
<form name="espace_perso" method="post" action="interface_cocktail.php">
Elève mis à jour !<br />
 <input type="submit" value="Retour" name="retour" class="submit"/>
        
        <?php
}elseif(isset($_POST['recherche'])){
	
	if(isset($_POST['ajouter'])){
		$sql="Update espace_eleve set nombre_entree=nombre_entree+1 where identifiant='".$_POST['ajouter']."'";
		$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
	}
	if(isset($_POST['supprimer'])){
		$sql="Update espace_eleve set nombre_entree=nombre_entree-1 where identifiant='".$_POST['supprimer']."'";
		$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
	}
	
	?>
    <form name="espace_perso2" method="post" action="interface_cocktail.php">
        <br /><label for="recherche">Recherche :</label>
        <input type="text" name="recherche" id="recherche" value="" />
        <input type="submit" value="Rechercher" name="Rechercher" class="submit" />
        </form>
        <br /><br />
    <form id="espace_perso" name="espace_perso" method="post" action="interface_cocktail.php">
    <input type="hidden" name="recherche" value="<?php echo $_POST['recherche']; ?>"/>
	<center>
    <table>
    <tr>
    <td>Nom</td>
    <td>Code</td>
    <td>Nombre d'entrées restantes</td>
    <td><img src="pdf/plus.png" /></td>
    <td><img src="pdf/moins.png" /></td>
    </tr>
            <br>  
            <?php    
$total_entrees=NULL;
$sql="Select * from espace_eleve where nom like '%".$_POST['recherche']."%'order by nom asc";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
while($row = mysql_fetch_array($req)){	
		
	echo '<tr>';
	echo '<td>';
	echo $row['nom'];
	echo '</td>';
	echo '<td>';
	echo $row['code'];
	echo '</td>';
	echo '<td id="nbr">';
	if($row['nombre_entree']==0){
		echo '<font color="#FF8000" size="+2"><b>';
		echo $row['nombre_entree'];
		echo '</b></font>';
	}
	elseif($row['nombre_entree']<0){
		echo '<font color="#FF0000" size="+2"><b>';
		echo $row['nombre_entree'];
		echo '</b></font>';
	}else{
		echo $row['nombre_entree'];
	}
	echo '</td>';
	echo '<td>';
	echo '<input type="submit" value="'.$row['identifiant'].'" name="ajouter" class="submit" />';
	/*echo '<img src="pdf/plus.png"/>';
	echo '<input type="image" value="'.$row['identifiant'].'" name="ajouter" class="submit" src="pdf/plus.png"  onclick="espace_perso.submit();"/>';*/
	echo '</td>';
	echo '<td>';
	echo '<input type="submit" value="'.$row['identifiant'].'" name="supprimer" class="submit"/>';
	/*echo '<img src="pdf/moins.png"/>';
	echo '<input type="image" value="'.$row['identifiant'].'" name="supprimer" class="submit" src="pdf/moins.png"  onclick="espace_perso.submit();"/>';*/
	echo '</td>';
	echo '</tr>';
}

?>

</table>
</center>
</form>
<?php
}
else{
?>
<form name="espace_perso" method="post" action="interface_cocktail.php">
            <label for="mdp">Mot de passe :</label>
			<input type="password" name="mdp" value="" />
           	<br>            
            <input type="submit" value="S'identifier" name="connection" class="submit" />	
            <center>            
            </form>
            
	<?php
}           
?>
</body>
</html>
