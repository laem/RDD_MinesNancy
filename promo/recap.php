<?php
include('sql_conf.php'); 
$db = mysql_connect($sql_url,$sql_login,$sql_pass) or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());

$utilisateur=null; 
if(isset($_POST["login"])){
	$utilisateur=$_POST["login"];
}



?>
    
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
if((isset($_POST['connection']) && $_POST['mdp']=="rddream_power") || isset($_POST['retour'])){
	
	$sql="Select * from espace_eleve order by nom asc";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
?>
	<br><br>
	
    <form name="espace_perso" method="post" action="recap.php">
            
    <label for="eleve">Modifier l'état de commande de : </label><br />
    <select name="eleve" style="display: compact;">
    
    <?php
    while($row = mysql_fetch_array($req)) {
      		echo "<option value='".$row['identifiant']."'>".$row['nom']."</option>";
      	} ?>
        </select>
        <input type="submit" value="Modifier" name="modifier" class="submit" />
<center>
    <table>
    <tr>
    <td>Nom</td>
    <td>DVD</td>
    <td>Lampe</td>
    <td>Yearbook</td>
    <td>Poster</td>
    <td>Super pack</td>
    <td>Pack</td>
    <td>Total</td>
    <td>Etat</td>
    </tr>
            <br>  
            <?php    
$total_eleves=NULL;
$total_rdd=NULL;
$total_dvd=NULL;
$total_lampe=NULL;
$total_poster=NULL;
$total_yearbook=NULL;
$total_pack=NULL;
$total_super_pack=NULL;
$sql="Select * from espace_eleve order by etat_commande desc, nom asc";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
while($row = mysql_fetch_array($req)){
	$dvd=$row['nbr_dvd'];
	$lampe=$row['nbr_lampes'];
	$yearbook=$row['nbr_yearbook'];
	$poster=$row['nbr_poster'];
	$super_pack=NULL;
	$pack=NULL;
	
	while($poster>0 && $lampe>0 && $dvd>0 && $yearbook>0){
		$super_pack++;
		$poster--;
		$yearbook--;
		$lampe--;
		$dvd--;
	}
	while($lampe>0 && $dvd>0 && $yearbook>0){
		$pack++;
		$yearbook--;
		$lampe--;
		$dvd--;
	}
	$total_pack+=$pack;
	$total_super_pack+=$super_pack;
	$total_dvd+=$dvd;
	$total_lampe+=$lampe;
	$total_yearbook+=$yearbook;
	$total_poster+=$poster;
	$total=63*$super_pack+59*$pack+5*$dvd+15*$yearbook+5*$poster+42*$lampe;
	$total_eleves+=$total;
	$total_rdd+=63.5*$super_pack+58.5*$pack+3*$dvd+15.5*$yearbook+5*$poster+40*$lampe;
	echo '<tr>';
	echo '<td>';
	echo $row['nom'];
	echo '</td>';
	echo '<td>';
	echo $dvd;
	echo '</td>';
	echo '<td>';
	echo $lampe;
	echo '</td>';
	echo '<td>';
	echo $yearbook;
	echo '</td>';
	echo '<td>';
	echo $poster;
	echo '</td>';
	echo '<td>';
	echo $super_pack;
	echo '</td>';
	echo '<td>';
	echo $pack;
	echo '</td>';
	echo '<td>';
	echo $total." €";
	echo '</td>';
	echo '<td>';
	if($row['etat_commande']==1){
	echo "En attente de paiement";
	}
	elseif($row['etat_commande']==2){
	echo "Paiement reçu";	
	}
	else{
	echo "-";	
	}
	echo '</td>';
	echo '</tr>';
}

?>
<tr>
<td colspan="9">
</td>
</tr>
<tr>
    <td>Total objets</td>
    <td><?php echo $total_dvd; ?></td>
    <td><?php echo $total_lampe; ?></td>
    <td><?php echo $total_yearbook; ?></td>
    <td><?php echo $total_poster; ?></td>
    <td><?php echo $total_super_pack; ?></td>
    <td><?php echo $total_pack; ?></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td>Total packs "explosés"</td>
    <td><?php echo $total_dvd+$total_super_pack+$total_pack; ?></td>
    <td><?php echo $total_lampe+$total_super_pack+$total_pack; ?></td>
    <td><?php echo $total_yearbook+$total_super_pack+$total_pack; ?></td>
    <td><?php echo $total_poster+$total_super_pack; ?></td>
    <td>-</td>
    <td>-</td>
    <td></td>
    <td></td>
    </tr>
</table>
<br /><br />
<table>
<tr>
<td>Total élèves</td>
<td><?php echo $total_eleves." €"; ?></td>
</tr>
<tr>
<td>Total RDD<br />Total valable pour au moins 60 DVD, 70 lampes et 70 yearbook</td>
<td><?php echo $total_rdd." €"; ?></td>
</tr>
<tr>
<td>Résultat</td>
<td><?php echo ($total_eleves-$total_rdd)." €"; ?></td>
</tr>

</form>            
<?php
}elseif(isset($_POST['eleve'])){
	$sql="Select * from espace_eleve where identifiant='".$_POST['eleve']."'";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
	?>
<form name="espace_perso" method="post" action="recap.php">
    Elève choisi : <?php echo mysql_result($req,0,'nom'); ?>
    <br />
    Etat de commande actuel : <?php 
	if(mysql_result($req,0,'etat_commande')==0){
		echo "Pas de commande en cours";
	}elseif(mysql_result($req,0,'etat_commande')==1){
		echo "En attente de paiement";		
	}elseif(mysql_result($req,0,'etat_commande')==2){
		echo "Paiement reçu";		
	}
	?>
    <br /><br />
    <input type="hidden" name="identifiant" value="<?php echo $_POST['eleve'];?>" />
    <label for="eleve">Modifier l'état de commande : </label><br />
    <select name="etat" style="display: compact;">
    
    <option value='0'>Pas de commande en cours</option>
    <option value='1'>En attente de paiement</option>
    <option value='2'>Paiement reçu</option>        
        </select>
        <input type="submit" value="Modifier" name="etat2" class="submit" />
        
        <?php
}elseif(isset($_POST['etat2'])){

	$sql="update espace_eleve set etat_commande='".$_POST['etat']."' where identifiant='".$_POST['identifiant']."'";
$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
	?>
<form name="espace_perso" method="post" action="recap.php">
Commande mise à jour !<br />
 <input type="submit" value="Retour" name="retour" class="submit" />
        
        <?php
}
else{
?>
<form name="espace_perso" method="post" action="recap.php">
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
