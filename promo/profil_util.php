<?php
include('sql_conf.php'); 
$db = mysql_connect($sql_url,$sql_login,$sql_pass)  or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());


?>
<html>
<head>
	<style type="text/css"> 
	
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
		margin: 75px 0 0 0;
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
    
    <script language="javascript">

		function moins_dvd() {
			if(document.getElementById("nbr_dvd").value>0){
			document.getElementById("nbr_dvd").value=document.getElementById("nbr_dvd").value-1;
			calcul_prix();
			}
		}
		
		function plus_dvd() {
			document.getElementById("nbr_dvd").value=document.getElementById("nbr_dvd").value-(-1);
			calcul_prix();
		}
		
		function moins_lampe() {
			if(document.getElementById("nbr_lampes").value>0){
				document.getElementById("nbr_lampes").value=document.getElementById("nbr_lampes").value-1;
				//Suppression de lignes de personnalisation supplémentaires
				var i = document.getElementById("nbr_lampes").value;
				document.getElementById('champ_'+i).innerHTML = '';
				calcul_prix();
			}
		}
		
		function plus_lampe() {
			if(document.getElementById("nbr_lampes").value<5){
				document.getElementById("nbr_lampes").value=document.getElementById("nbr_lampes").value-(-1);
				
				//Ajout de lignes de personnalisation supplémentaires
				var i = document.getElementById("nbr_lampes").value-1;
				var i2 = document.getElementById("nbr_lampes").value;
	
				document.getElementById('champ_'+i).innerHTML = '<fieldset><label for="ligne_1"><font size="+1">Ligne 1 gravée sur la lampe '+i2+' (Prénom par ex.) : </label><input type="text" name="lampe'+i2+'ligne1" value=""/><br><label for="ligne_2"><font size="+1">Ligne 2 gravée sur la lampe '+i2+' (Nom par ex.) : </label><input type="text" name="lampe'+i2+'ligne2" value="" /><br><label for="ligne_3"><font size="+1">Ligne 3 gravée sur la lampe '+i2+' (Promo 09 par ex.) : </label><input type="text" name="lampe'+i2+'ligne3" value="" /></fieldset></span>';
				document.getElementById('champ_'+i).innerHTML +='<br /><span id="champ_'+i2+'"></span>';
				calcul_prix();
			}			
		}
		
		function moins_yearbook() {
			if(document.getElementById("nbr_yearbook").value>0){
				document.getElementById("nbr_yearbook").value=document.getElementById("nbr_yearbook").value-1;
				calcul_prix();
			}
		}
		
		function plus_yearbook() {
			document.getElementById("nbr_yearbook").value=document.getElementById("nbr_yearbook").value-(-1);
			calcul_prix();
		}
		
		function moins_poster() {
			if(document.getElementById("nbr_poster").value>0){
			document.getElementById("nbr_poster").value=document.getElementById("nbr_poster").value-1;
			calcul_prix();
			}
		}
		
		function plus_poster() {
			document.getElementById("nbr_poster").value=document.getElementById("nbr_poster").value-(-1);
			calcul_prix();
		}
		
		function calcul_prix() {
			//Récupération des différentes quantités
			var dvd=document.getElementById("nbr_dvd").value;
			var lampe=document.getElementById("nbr_lampes").value;
			var yearbook=document.getElementById("nbr_yearbook").value;
			var poster=document.getElementById("nbr_poster").value;	
			
			//Calcul du nombre de packs
			var pack=0;
			while(dvd>0 && lampe>0 && yearbook>0){
				pack++;
				dvd--;
				lampe--;
				yearbook--;
			}
			document.getElementById('qte_pack').innerHTML = pack;	
			document.getElementById('prix_pack').innerHTML = pack*60 + " €";
			
			//Calcul des autres objets
			document.getElementById('qte_dvd').innerHTML = dvd;	
			document.getElementById('prix_dvd').innerHTML = dvd*5 + " €";
			document.getElementById('qte_lampe').innerHTML = lampe;	
			document.getElementById('prix_lampe').innerHTML = lampe*42 + " €";
			document.getElementById('qte_yearbook').innerHTML = yearbook;	
			document.getElementById('prix_yearbook').innerHTML = yearbook*15 + " €";
			document.getElementById('qte_poster').innerHTML = poster;	
			document.getElementById('prix_poster').innerHTML = poster*5 + " €";
			
			//Calcul du total
			document.getElementById('prix_total').innerHTML =pack*60+dvd*5+lampe*42+yearbook*15+poster*5 + " €";
		}
		
		function confirmation_goodies(){
			if (window.confirm("Êtes-tu sûr de valider cette commande ? \nElle reste modifiable jusquau 8 avril.")){
				return true;
			} else {
				return false;
				alert ("ok");
			}	
			
		}
		
	</script> 
    
<title>RDDReam - Ton espace personnel</title> 
</head>
<body>


<?php

//si non identifié
if(isset($_POST['deconnection']) || (!isset($_POST["login"]) || !isset($_POST["mdp"]))){
?>
	<br><br>
	<fieldset style="width:720px">
    <center><strong><font color="#FF0000">Réservé aux futurs élèves diplômés</font></strong></center>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chaque élève est invité à remplir son espace personnel disponible ci-dessous.
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Les identifiants sont les mêmes que ceux du site des élèves. Si tu as oublié ton mot de passe, il te suffit de te rendre sur <a href="http://eleves.mines.inpl-nancy.fr/user/password" target="_blank">cette page</a> pour en demander un nouveau. Les changements de mot de passe prendront effet le lendemain de la modification.
    <br><br>  
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L’espace personnel te permet d'envoyer les photos que tu souhaites voir sur le Power Point de la cérémonie ainsi que dans le Yearbook. <strong>Si tu ne donnes aucune photo, la photo du trombinoscope sera utilisée...</strong>
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Il te permet également de commander tes goodies (lampe, yearbook, dvd et poster) et de suivre ta commande.
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enfin il nous permet de récolter des informations sur ton passage aux Mines et les faits marquants de ta scolarité (clubs, assoces, anecdotes, citations, etc.).
    <br><br><br>   
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Si tu as des questions n’hésite pas à nous contacter par <a href="mailto:teamrdd@yahoo.com">mail</a> ou sur <a href="http://www.facebook.com/rddn09" target="_blank">Facebook</a> !  <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;En cas de problèmes techniques (mot de passe, erreurs,...), <a href="mailto:teamrdd@yahoo.com">contacte Alex</a> en donnant un maximum de détails.  
	<br><br><br>
    <p style="text-align:right">L'équipe RDD 09</p>
    <br>
    </fieldset>

			<form name="espace_perso" method="post" action="profil_util.php">
Pour t'identifier, rentre ton login et ton mot de passe ci-dessous (identiques à ceux du site des élèves) :
            
           	<center>
            <br>
			<label for="login">Login :</label>
			<input type="text" name="login" value="" />
			<br>
            <label for="mdp">Mot de passe :</label>
			<input type="password" name="mdp" value="" />
           	<br>            
            <input type="submit" value="S'identifier" name="submit" class="submit" />	
            <br>       

            
<?php
}else{
//Vérification des données de login
$sql="Select * from espace_eleve where identifiant='".($_POST['login'])."' and mot_de_passe='".md5($_POST['mdp'])."'";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
if(mysql_num_rows($req)==0){
$sql2="Select * from espace_eleve where identifiant='".($_POST['login'])."' and mot_de_passe='".($_POST['mdp'])."'";
$req=mysql_query($sql2) or die($req.' Erreur SQL !'.$sql2.'<br />'.mysql_error());
}
if(mysql_num_rows($req)==0){
	//Identification impossible
	?>
<form name="espace_perso" method="post" action="profil_util.php">
			<p>Pour t'identifier, rentre ton login et ton mot de passe ci-dessous (identiques à ceux du site des élèves) :</p>
            
           	<center>
            <br>
			<label for="login">Login :</label>
			<input type="text" name="login" value="" />
			<br>
            <label for="mdp">Mot de passe :</label>
			<input type="password" name="mdp" value="" />
           	<br>            
            <input type="submit" value="S'identifier" name="submit" class="submit" />	
            <br>
            <font color="#FF0000">Identification impossible ! </font>            
            <center>
            
	<?php
	
}else{
	//Identification ok. Validation de la commande
	if(isset($_POST['valider_commande'])&&isset($_POST['login'])){
		$sql1="";
			$sql2="";
			foreach($_POST as $key => $data) {
				if($key!='login' && $key!='mdp' && $key!='valider_commande'){
					if(	$key=='nbr_dvd' || $key=='nbr_lampes' || $key=='nbr_yearbook'){ 	
						$sql1.=$key."="."'".$data."'".",";
					}else{
						$sql1.=$key."="."'".mysql_escape_string($data)."'".",";
					}
				}
			}
			$sql1.="etat_commande='1'".",";
			
			$sql1=substr($sql1,0,-1);
			$sql2=substr($sql2,0,-1);
			$sql="UPDATE espace_eleve set $sql1 where identifiant='".$_POST['login']."'";
			mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
					
			$sql2="Select * from espace_eleve where identifiant='".($_POST['login'])."'";
			$req=mysql_query($sql2) or die($req2.' Erreur SQL !'.$sql2.'<br />'.mysql_error());
			
			//Calculs du récapitulatif
			//Récupération des différentes quantités
			$dvd=mysql_result($req,0,'nbr_dvd');
			$lampe=mysql_result($req,0,'nbr_lampes');
			$yearbook=mysql_result($req,0,'nbr_yearbook');
			$poster=mysql_result($req,0,'nbr_poster');	
			
			//Calcul du nombre de packs
			$pack=0;
			while($dvd>0 && $lampe>0 && $yearbook>0){
				$pack++;
				$dvd--;
				$lampe--;
				$yearbook--;
			}
			$message='
            <fieldset>
            <center><h2>Ta commande a été validée !</h2></center>
            <br><br>
            &nbsp;&nbsp;&nbsp;Cette commande reste modifiable jusqu\'au 8 avril, simplement en te connectant à ton espace personnel.
            <br><br>
            &nbsp;&nbsp;&nbsp;Si tu es certain de ta commande, tu peux envoyer dès maintenant ton réglement par chèque à l\'adresse suivante :
            <br><br><center>
            Laurent Dall\'Aglio<br>
            123, rue Pouet<br>
            75008 Paris
            </center><br><br>
            &nbsp;&nbsp;&nbsp;Ou par virement à l\'aide du RIB ci-dessous :
            <br><br>
            <center>12345 123456 78945631 12 32
            <br>
            <strong><font color="#FF0000">N\'oublie pas de mettre ton nom en référence du virement !</font></strong></center>
            <br><br>
            &nbsp;&nbsp;&nbsp;Tu vas recevoir un mail récapitulant ces informations à l\'adresse qui est indiquée dans ton espace personnel.
            <br><br>
            &nbsp;&nbsp;&nbsp;Ci-dessous un récapitulatif de ta commande :
            
            <br><br>
            <center>
            <table align="center">
            <tr>
            <td>
            <b>Objet
            </td>
            <td>
            <b>Prix unitaire
            </td>
            <td>
            <b>Quantité
            </td>
            <td>
            <b>Prix total
            </td>
            </tr>
            <tr>
            <td>
            DVD
            </td>
            <td>
            5 €
            </td>
            <td>
            '.$dvd.'
            </td>
            <td>
            '.($dvd*5)." €".'
            </td>
            </tr>
            <tr>
            <td>
            Lampe
            </td>
            <td>
            42 €
            </td>
            <td id="qte_lampe">
            '.$lampe.'
            </td>
            <td id="prix_lampe">
            '.($lampe*42)." €".'
            </td>
            </tr>
            <tr>
            <td>
            Yearbook
            </td>
            <td>
            15 €
            </td>
            <td id="qte_yearbook">
            '.$yearbook.'
            </td>
            <td id="prix_yearbook">
            '.($yearbook*15)." €".'
            </td>
            </tr>
            <tr>
            <td>
            Poster
            </td>
            <td>
            5 €
            </td>
            <td id="qte_poster">
            '.$poster.'
            </td>
            <td id="prix_poster">
            '.($poster*5)." €".'
            </td>
            </tr>
            <tr>
            <td>
            Pack (1 DVD + 1 Lampe + 1 Yearbook)
            </td>
            <td>
            60 €
            </td>
            <td id="qte_pack">
            '.$pack.'
            </td>
            <td id="prix_pack">
            '.($pack*60)." €".'
            </td>
            </tr>
            <tr>
            <td colspan="3">
            Total
            </td>
            <td id="prix_total">
            '.($pack*60+$dvd*5+$lampe*42+$yearbook*15+$poster*5)." €".'
            </td>
            </tr>
            </table>
            </center>
            </fieldset>';
            
            //Envoi tu message
			$to=mysql_result($req,0,'mail');
			$subject="Ta commande de goodies RDD !";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Alex Gapin <alex.gapin@mines.inpl-nancy.fr>' . "\r\n";
			mail($to, $subject, $message, $headers);
			
			echo $message;
			?>
			<center>
			<form name="espace_perso" method="post" action="profil_util.php" style="width:635px">
			<input type="submit" value="Se déconnecter" name="deconnection" class="submit">
            <?php
	}
	
	//Identification ok. Si modification prise en compte de ces dernières modifications du profil et affichage du formulaire de commande
	if(isset($_POST['commande'])&&isset($_POST['login'])) {
			$sql1="";
			$sql2="";
			foreach($_POST as $key => $data) {
				if($key!='login' && $key!='mdp' && $key!='commande' && $key!='photo_ppt' && $key!='participation_semaine'){
					if(	$key=='nbr_dvd' || $key=='nbr_lampes' || $key=='nbr_yearbook'){ 	
						$sql1.=$key."="."'".$data."'".",";
					}else{
						$sql1.=$key."="."'".mysql_escape_string($data)."'".",";
					}
				}
			}
			
			if(isset($_POST['participation_semaine'])){
				$sql1.="participation_semaine='1',";	
			}
			
			$sql1=substr($sql1,0,-1);
			$sql2=substr($sql2,0,-1);
			$sql="UPDATE espace_eleve set $sql1 where identifiant='".$_POST['login']."'";
			mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
					
			$sql2="Select * from espace_eleve where identifiant='".($_POST['login'])."'";
			$req=mysql_query($sql2) or die($req2.' Erreur SQL !'.$sql2.'<br />'.mysql_error());
			
			?>
            <h2><center>Commande de goodies</h2>
            <form name="commande_goodies" method="post" action="profil_util.php"  >
            <input type="hidden" name="login" value="<?php echo mysql_result($req,0,'identifiant'); ?>" />          
            <input type="hidden" name="mdp" value="<?php echo mysql_result($req,0,'mot_de_passe'); ?>"  />
            <fieldset>
            <center><font size="+1">Etat de ta commande : <strong>
            <?php
			if(mysql_result($req,0,'etat_commande')==0){
				echo " Nouvelle commande";
			}
			if(mysql_result($req,0,'etat_commande')==1){
				echo " Commande enregistrée : <u>en attente de paiement.</u><font size='-1'><br> La commande est encore modifiable jusqu'au 8 avril.</font>";
			}
			if(mysql_result($req,0,'etat_commande')==2){
				echo " Paiement reçu. <font size='-1'><br>
				La commande n'est plus modifiable.</font>";
			}
			?>
            </strong></font></center>
            </fieldset>
            <fieldset>
            <table style="border:hidden">
            <tr>
            <td>
            <img src="\pdf\dvd.jpg" alt="Pas d'image chargée" height="200px" style="margin-right:"100 px/>&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td style="text-align:justify" style="text-indent:"6px""  >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Et voici pour toi un super DVD : il contient l'ensemble des JTM de tes 2 années aux mines ainsi que celui qui sera diffusé pendant le semaine de la RDD. Et comme on n'est pas radins, on rajoute aussi l'ensemble des films diffusés pendant ta présence aux Mines (films de campagne Forum, JE, BDE, amphis de présentation,...) ainsi que toutes les musiques mythiques de ta scolarité ! Et pleins d'autres bonus !!
            <br>
            <p align="right"><font size="+2"><strong>5 €</strong></font></p>
            </td>
            </tr>
            </table>
            </fieldset>
            <fieldset>
             <center><label for="nbr_dvd">Nombre de DVD commandés :</label>
			<input type="text" id="nbr_dvd" name="nbr_dvd" value="<?php echo mysql_result($req,0,'nbr_dvd'); ?>" style="width:50px" readonly/>
            &nbsp;&nbsp;&nbsp;<img src="\pdf\moins.png" alt="Pas d'image chargée" onClick="moins_dvd();"/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="\pdf\plus.png" alt="Pas d'image chargée" onClick="plus_dvd();"/>
            </fieldset>
			<br>
            
            <fieldset>
            <table style="border:hidden">
            <tr>
            <td>
            <a href="/pdf/lampe.jpg" target="_blank"><img src="\pdf\lampe.jpg" alt="Pas d'image chargée" height="200px" style="margin-right:"100 px/></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <br>(cliquez pour agrandir)
            </td>
            <td style="text-align:justify" style="text-indent:"6px"" >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Elle est toute belle, en laiton (ça pèse son poids !), aspect vieilli, des dimensions qui en feront rêver plus d'une (22 cm x 7.5 cm), gravée à vos noms et au logo de l'école !
            <br>
            <p align="right"><font size="+2"><strong>42 €</strong></font></p>            
            </td>
            </tr>
            </table>
            </fieldset>
            <fieldset>
            <center><label for="nbr_lampes">Nombre de lampes commandées :</label>
			<input type="text" id="nbr_lampes" name="nbr_lampes" value="<?php echo mysql_result($req,0,'nbr_lampes'); ?>"  style="width:50px" readonly />
            &nbsp;&nbsp;&nbsp;<img src="\pdf\moins.png" alt="Pas d'image chargée" onClick="moins_lampe();"/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="\pdf\plus.png" alt="Pas d'image chargée" onClick="plus_lampe();"/>
			</fieldset>
            <br>
            <br>
            <?php
            if(mysql_result($req,0,'nbr_lampes')==0){
            echo '<span id="champ_0">';
            echo '</span>';
			}else{
				$i=1;
				while($i<=mysql_result($req,0,'nbr_lampes') && (mysql_result($req,0,'lampe'.$i.'ligne1')!='' || mysql_result($req,0,'lampe'.$i.'ligne1')!='' || mysql_result($req,0,'lampe'.$i.'ligne1')!='')){
				echo '<span id="champ_'.($i-1).'"><fieldset><label for="ligne_1"><font size="+1">Ligne 1 gravée sur la lampe '.$i.' (Prénom par ex.) : </font></label><input type="text" name="lampe'.$i.'ligne1" value="'.mysql_result($req,0,'lampe'.$i.'ligne1').'"/><br><label for="ligne_2"><font size="+1">Ligne 2 gravée sur la lampe '.$i.' (Nom par ex.) : </font></label><input type="text" name="lampe'.$i.'ligne2" value="'.mysql_result($req,0,'lampe'.$i.'ligne2').'" /><br><label for="ligne_3"><font size="+1">Ligne 3 gravée sur la lampe '.$i.' (Promo 09 par ex.) : </font></label><input type="text" name="lampe'.$i.'ligne3" value="'.mysql_result($req,0,'lampe'.$i.'ligne3').'" /></fieldset></span>';
				echo '<span id="champ_'.($i).'"></span>';
				$i++;
				}
			}
			?>
            <br>
            
            <fieldset>
            <table style="border:hidden">
            <tr>
            <td>
            <img src="\pdf\yearbook.jpg" alt="Pas d'image chargée" height="200px" style="margin-right:"100 px/>&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td style="text-align:justify" style="text-indent:"6px"" >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Le Yearbook : un recueil de 100 pages qui récapitule tes 2 (voire 3) années aux Mines. C'est un objet souvenir incontournable de toute remise des diplômes. 
            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tu y retrouveras tous les événements, les meilleurs moments, les meilleures photos et un trombinoscope de la promo09 FICM et FITI. Personne n'est épargné. 
			<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tu pourras y contribuer en nous proposant des photos à y insérer. 
            <br>
            <p align="right"><font size="+2"><strong>15 €</strong></font></p>
            </td>
            </tr>
            </table>
            </fieldset>
            <fieldset>
            <center><label for="nbr_yearbook">Nombre de Yearbook commandés :</label>
			<input type="text" id="nbr_yearbook" name="nbr_yearbook" value="<?php echo mysql_result($req,0,'nbr_yearbook'); ?>"  style="width:50px" readonly/>
            &nbsp;&nbsp;&nbsp;<img src="\pdf\moins.png" alt="Pas d'image chargée" onClick="moins_yearbook();"/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="\pdf\plus.png" alt="Pas d'image chargée" onClick="plus_yearbook();"/>
            </fieldset>
			<br>
            
            <fieldset>
            <table style="border:hidden">
            <tr>
            <td>
            <img src="\pdf\poster.jpg" alt="Pas d'image chargée" height="200px" style="margin-right:"100 px/>&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td style="text-align:justify" style="text-indent:"6px"" >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Un magnifique poster sur lequel il y a toute la promo et qui sera la trace de la promo 09 (FICM et FITI) aux Mines, puisque le même sera affiché au bar d'ARTEM.
            <br>
            <p align="right"><font size="+2"><strong>5 €</strong></font></p>            
            </td>
            </tr>
            </table>
            </fieldset>
            <fieldset>
            <center><label for="nbr_poster">Nombre de posters commandés :</label>
			<input type="text" id="nbr_poster" name="nbr_poster" value="<?php echo mysql_result($req,0,'nbr_poster'); ?>"  style="width:50px" readonly/>
            &nbsp;&nbsp;&nbsp;<img src="\pdf\moins.png" alt="Pas d'image chargée" onClick="moins_poster();"/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="\pdf\plus.png" alt="Pas d'image chargée" onClick="plus_poster();"/>
            </fieldset>
			
            <fieldset>
            <br>
            <h3>Récapitulatif de ta commande :</h3>
            <br>
            <center>
            <table align="center">
            <tr>
            <td>
            <b>Objet
            </td>
            <td>
            <b>Prix unitaire
            </td>
            <td>
            <b>Quantité
            </td>
            <td>
            <b>Prix total
            </td>
            </tr>
            <tr>
            <td>
            DVD
            </td>
            <td>
            5 €
            </td>
            <td id="qte_dvd">
            </td>
            <td id="prix_dvd">
            </td>
            </tr>
            <tr>
            <td>
            Lampe
            </td>
            <td>
            42 €
            </td>
            <td id="qte_lampe">
            </td>
            <td id="prix_lampe">
            </td>
            </tr>
            <tr>
            <td>
            Yearbook
            </td>
            <td>
            15 €
            </td>
            <td id="qte_yearbook">
            </td>
            <td id="prix_yearbook">
            </td>
            </tr>
            <tr>
            <td>
            Poster
            </td>
            <td>
            5 €
            </td>
            <td id="qte_poster">
            </td>
            <td id="prix_poster">
            </td>
            </tr>
            <tr>
            <td>
            Pack (1 DVD + 1 Lampe + 1 Yearbook)
            </td>
            <td>
            60 €
            </td>
            <td id="qte_pack">
            </td>
            <td id="prix_pack">
            </td>
            </tr>
            <tr>
            <td colspan="3">
            <strong>Total</strong>
            </td>
            <td id="prix_total">
            </td>
            </tr>
            </table>
            <script language="javascript">
			calcul_prix();
			</script>
            <br>
            <?php
            if(mysql_result($req,0,'etat_commande')<2){
				echo '<input type="submit" value="Valider la commande &#13;&#10;de Goodies" name="valider_commande" class="submit" onClick="return confirmation_goodies();"/>';
			}else{
				echo "<br>";
				echo "Il n'est plus possible de valider ta commande. (paiement reçu)";
			}
			?>
            
            <br>
            <input type="submit" value="Se déconnecter" name="deconnection" class="submit">	                    
            </center>
            </fieldset>
            <?php
	
	}
	
	
	//Identification OK. Récupération des valeurs
	if(!isset($_POST['commande'])&&!isset($_POST['valider_commande'])){
	?>

            <center><h2><?php echo mysql_result($req,0,'prenom')." ".mysql_result($req,0,'nom'); ?></h2></center>
            
            <table width="100%" style="border:hidden">
              <tr>
                <td style="border:hidden">
                <center>
                <form enctype="multipart/form-data" action="upload_ppt.php" method="post" style="width:240px">
                <label for="photo_ppt">Ta photo pour le PPT :</label>
                <img src=<?php echo "\\pdf\\".mysql_result($req,0,'photo_ppt'); ?> alt="Pas d'image chargée" height="200px" />
                <br>
                <input type="hidden" name="login" value="<?php echo mysql_result($req,0,'identifiant'); ?>" />          
                <input type="hidden" name="mdp" value="<?php echo mysql_result($req,0,'mot_de_passe'); ?>"  />
                <input type="file" name="photo_ppt" accept="application/jpg"  />
                <br>
                <input type="submit" value="Envoyer l'image (2 Mo max. !)" />
                </form> 
                </td>
                <td>
                <center>
                <form enctype="multipart/form-data" action="upload_yb.php" method="post" style="width:240px">
                <label for="photo_yearbook">Ta photo pour le Yearbook :</label>
                <img src=<?php echo "\\pdf\\".mysql_result($req,0,'photo_yearbook'); ?> alt="Pas d'image chargée" height="200px" />
                <br>
                <input type="hidden" name="login" value="<?php echo mysql_result($req,0,'identifiant'); ?>" />          
                <input type="hidden" name="mdp" value="<?php echo mysql_result($req,0,'mot_de_passe'); ?>"  />
                <input type="file" name="photo_yearbook" accept="application/jpg"  />
                <br>
                <input type="submit" value="Envoyer l'image (2 Mo max. !)" /><br>
                (si non renseigné, l'image sera celle du PPT !)
                </form> 
                </td>
              </tr>
            </table>
            
            <form name="espace_perso" method="post" action="profil_util.php">
            <input type="hidden" name="login" value="<?php echo mysql_result($req,0,'identifiant'); ?>" />          
			<input type="hidden" name="mdp" value="<?php echo mysql_result($req,0,'mot_de_passe'); ?>"  />
			<br>
            
           
            
            <label for="faits_marquants">Les faits marquants de ta scolarité (clubs, assoces, citations, ...) :</label><br><font size="-2">Sera utilisé pour compléter le Yearbook et pour aider ton responsable de département à rédiger ta partie du PPT diffusé le jour de la RDD.</font><br>
			<textarea name="faits_marquants" ><?php echo mysql_result($req,0,'faits_marquants'); ?></textarea>
			<br>
            
            <label for="adresse_parents">L'adresse de tes parents :</label><br><font size="-2">Cette adresse sera utilisée par la com' de l'école pour inviter tes parents à la RDD !</font><br>
			<textarea name="adresse_parents" ><?php echo mysql_result($req,0,'adresse_parents'); ?></textarea>
			<br>
            
            <label for="mail">Une adresse mail où l'on peut te contacter rapidement :</label><br><font size="-2">Cette adresse sera utile pour la commande des goodies et pour tout contact ultérieur. Verifie bien !</font><br><br>
			<center><input type="text" name="mail" value="<?php echo mysql_result($req,0,'mail'); ?>"/></center>
            <br>
            
            <label for="mail">Coche cette case si tu comptes participer aux activités de la semaine RDD : <br><font size="-2">Ca n'engage en rien ! C'est juste pour avoir une idée du nombre de personnees.</font><br><br><center><input type="checkbox" name="participation_semaine" <?php if(mysql_result($req,0,'participation_semaine')){echo "checked";} ?>/></center></label>
            <br>
            <br>
            
			<br>
            
            <center>
            <input type="submit" value="Valider et accéder &#13;&#10; à la commande &#13;&#10;de Goodies" name="commande" class="submit"/>
            <br>
            <input type="submit" value="Se déconnecter" name="deconnection" class="submit">	                    
            </center>

            
	<?php
	}
	
	
}
}
mysql_close($db);
?>
            
</form>
</body>
</html>
