<?php
	include('sql_conf.php');
	$db = mysql_connect($sql_url,$sql_login,$sql_pass) or die('Erreur de connexion '.mysql_error());
	mysql_select_db($base,$db) or die('Erreur de selection de la db '.mysql_error());
	   
    if(isset($_POST['number'])) {
    	//{$_POST['number']="10";
		//Début de génération du ficher xml
        echo '<?xml version="1.0"?>'."\n";
        
    	
		//Protection contre l'injection
        if(get_magic_quotes_gpc()) {
            $code = stripslashes($_POST['number']);
        } else {
            $code = $_POST['number'];
        }
    
        unset($_POST);
        
		//recherche en base
        $entree = login($code);
        if($entree==-1){
			error(3);
		}else if($entree[0]>0){
			echo '	<result value="Bonjour M/Mme '.$entree[1].' ;). '.($entree[0]-1).' invitation(s) restante(s)"'."/> \n ";
			echo "</result>";
			$sql="Update espace_eleve set nombre_entree=nombre_entree-1 where code='".$code."'";
			$req=mysql_query($sql) or die($req.' Erreur SQL !'.$sql.'<br />'.mysql_error());
		}else if($entree[0]==0){
			echo '	<result2 value="'.$entree[1].'"'."/> \n ";
			echo "</result2>";
		}
    }

	//fonction d'inscription de l'erreur
    function error($ec) {
        printf('    <error value="%d"/>'."\n".'</error>',$ec);
        die();
    }
	
	//fonction de recherche en base
    function login($numero) {
        $select = "
		    SELECT nombre_entree, nom
		    FROM espace_eleve
		    WHERE code = '".$numero."'";
		$fixedcode = mysql_real_escape_string($numero);
		$query = sprintf($select, $fixedcode);
        $result = mysql_query($query);
		if(mysql_num_rows($result) != 1) { return -1; }
        $row = mysql_fetch_row($result);
		$personne[0]=$row[0];
		$personne[1]=$row[1];
        return $personne;
    }
?>