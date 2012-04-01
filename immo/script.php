<?php 
include('sql_conf.php'); 
include('simple_html_dom.php');
$db = mysql_connect($sql_url,$sql_login,$sql_pass)  or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());

//Mise à zéro de la BDD
$sql="truncate table locations";
$result=mysql_query($sql) or die;

//Aquisition de la page
$i=1;


while(file_get_html('http://www.ladresse-grandnancy.com/liste.asp?pageno='.$i.'&TypeTransaction=1')){
echo $i;
$html = file_get_html('http://www.ladresse-grandnancy.com/liste.asp?pageno='.$i.'&TypeTransaction=1');
	
	//Recherche du div des annonces
	$liste = $html->find('div[id=Liste]'); 
	$annonces = $liste[0]->find('div[class=ListeElement]'); 
	
	if(count($annonces)==0){
		break;
	}
	
	//Récupération des liens vers les différentes fiches
	foreach($annonces as $annonce){	
		$liens_fiche[]=$annonce->find('a', 0)->href;
	}
	
	//Parcourt des différentes annonces
	foreach($liens_fiche as $adresse){	
		
		//Récupération du numéro de l'annonce
		$num_annonce=str_replace('=','',substr($adresse,-3,3));
		
		//Récupération des pages des annonces 
		$html = file_get_html('http://www.ladresse-grandnancy.com/'.$adresse);
		
		$annonce = $html->find('div[id=Fiche]');
		
		//Récupération du lien de l'image
		$lien_image_principale_bis=$annonce[0]->find('#FichePhotoPrincipale');
		
		$lien_image_principale=$lien_image_principale_bis[0]->src;
		
		//Récupération des différentes caractéristiques
		
		$bloc_descriptif=$annonce[0]->find('#FicheBlocDescriptif');
		
		$paragraphes=$bloc_descriptif[0]->find('p');
		
		$surface=NULL;
		$pieces=NULL;
		$chambre=NULL;
		$douche=NULL;
		$prix=NULL;
		$bains=NULL;
		$ville=NULL;
	
		//Ecriture des description
		for($k=0;$k<count($paragraphes);$k++){
			if(preg_match("/surface/i", $paragraphes[$k])){
				$surface=strip_tags($paragraphes[$k]);
			}elseif(preg_match("/nb de pièces/i", $paragraphes[$k])){
				$pieces=strip_tags($paragraphes[$k]);
			}elseif(preg_match("/nb de chambres/i", $paragraphes[$k])){
				$chambre=strip_tags($paragraphes[$k]);
			}elseif(preg_match("/salles de douches/i", $paragraphes[$k])){
				$douche=strip_tags($paragraphes[$k]);
			}elseif(preg_match("/Prix/", $paragraphes[$k])){
				$prix=strip_tags($paragraphes[$k]);
			}elseif(preg_match("/salles de bains/i", $paragraphes[$k])){
				$bains=strip_tags($paragraphes[$k]);
			}
			$ville=strip_tags($paragraphes[0]);
		}
		$description=strip_tags($paragraphes[count($paragraphes)-1]);
		
		//Récupération des images miniatures
		$lien_image_2_bis2=$annonce[0]->find('#FicheVignettes');
		$lien_image_2_bis=$lien_image_2_bis2[0]->find('img');
		
		$lien_image_2=$lien_image_2_bis[0]->src;
		$lien_image_3=$lien_image_2_bis[0]->src;
		
		//Insertion des valeurs dans la base de données
		
		$sql="insert into locations(id_location,lien_image_principale,ville,surface,pieces,chambre,douche,prix,bains,description,lien_image2,lien_image3) values($num_annonce,'$lien_image_principale','".mysql_escape_string($ville)."','".mysql_escape_string($surface)."','".mysql_escape_string($pieces)."','".mysql_escape_string($chambre)."','".mysql_escape_string($douche)."','".mysql_escape_string($prix)."','".mysql_escape_string($bains)."','".mysql_escape_string($description)."','$lien_image_2','$lien_image_3')";
		$result=mysql_query($sql) or die ($result.' Erreur SQL !'.$sql.'<br />'.mysql_error());
	}
	
	$i++;
}
?>