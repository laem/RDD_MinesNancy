
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html lang="fr"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    

<head>
	<style type="text/css"> 
	#message
{
	text-indent: 25px;
	text-align: justify;
	background-image: url("pics/braun.jpg");   
    background-repeat: no-repeat; 
    background-position: 94% 3.5%;
}

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
    
    <script type="text/javascript">
			function test_form() {
				if(document.getElementById("nom").value=='' || document.getElementById("prenom").value=='' ||document.getElementById("promo").value=='' ){
					alert ("Merci de remplir tous les champs non optionnels !");
					return false;
				}else{
					return true;
				}
			}
				
				</script>
                
    <title>Espace d&eacute;dicace</title>
</head>
<body>

<fieldset id="message">
<h1>D&eacute;dicace &agrave; Ulrike Braun</h1>				
				<p style="text-indent:10px" align="justify">Cette ann&eacute;e nous souhaitons offrir un <font color="#FFA500">livre d'or</font> &agrave; <font color="#FFA500">Ulrike Braun</font>. Il marquera le d&eacute;m&eacute;nagement sur ARTEM et la remerciera de son <font color="#FFA500">d&eacute;vouement exceptionnel</font> envers les Mineurs depuis plus de 10 ans maintenant. Celui-ci sera sign&eacute; par tous les &eacute;l&egrave;ves qui le souhaitent, et ce depuis 2001, ann&eacute;e &agrave; partir de laquelle elle a commenc&eacute; &agrave; travailler &agrave; la DAEC.</p>
				<p style="text-indent:10px" align="justify">Gr&acirc;ce &agrave; cette page, tu peux lui laisser ton <font color="#FFA500">message</font> (2000 mots max) qui sera directement ins&eacute;r&eacute; &agrave; ce livre d'or. Tu peux aussi t&eacute;l&eacute;charger une photo de toi, de ta vie, ou autre qui sera imprim&eacute;e &agrave; c&ocirc;t&eacute; de ton commentaire. Nous insistons sur le caract&egrave;re <font color="#FFA500">confidentiel</font> de cette initiative et vous remercions de ne pas lui en parler, ni d'en parler aupr&egrave;s de l'administration de l'Ecole afin de limiter les fuites, en tout cas pas avant le dimanche 23 septembre 2012 (lendemain de la RDD)</p>
				<p style="text-indent:10px" align="justify">La date limite est pour le moment fix&eacute;e au <font color="#FFA500">15 avril 2012</font>. D'avance merci pour ton implication :)</p>
				<p style="text-indent:10px" align="justify"><font color="#FFA500">L'&eacute;quipe RDD N09</font></p>
				<p style="text-indent:10px" align="justify">PS : id&eacute;es de message : remerciement, parcours depuis les Mines, vie familiale, rappel d'&eacute;v&eacute;nements avec elle aux Mines, de ce qu'elle a fait pour toi, etc.</p>

</fieldset>
	
				<form method="post" action="index3.php" enctype="multipart/form-data" onsubmit="return test_form();">
			
					<h1>Votre message personnel</h1>
				
					<fieldset>

						Nom :<br />
						<input type="text" id="nom" name="nom"  /><br />
						
						Pr&eacute;nom :<br />
						<input type="text" id="prenom" name="prenom"  /><br />
			
						E-mail (optionnel):<br />
						<input type="text" id="mail" name="mail" />	<br />
											
						Promotion :<br />
						<input type="text" name="promo" id="promo"  /><br />
						
						Photo (optionnel) :<br />
						<input type="file" name="picture" id="picture"><br />
						(Extensions : jpg, jpeg, gif, bmp, png)
						
					</fieldset>
		
					<fieldset id="user-message">
		
						Votre message (3000 caract&egrave;res max.):<br />
						<textarea id="text" name="text" rows="0" cols="0" maxlength="3000"></textarea> 
		
						<center><input type="submit" value="Envoyer" name="submit" /></center>
		
					</fieldset>
					
				</form> 
                

</body>    

</body>
</html>
