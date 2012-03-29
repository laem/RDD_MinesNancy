			<div id="formulaire">	
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
				<form method="post" action="pages/data.php" enctype="multipart/form-data" onsubmit="return test_form();">
			
					<h1>Votre message personnel</h1>
				
					<fieldset id="user-details">

						<label for="nom">Nom :</label>
						<input type="text" id="nom" name="nom"  />
						
						<label for="prenom">Pr&eacute;nom :</label>
						<input type="text" id="prenom" name="prenom"  />
			
						<label for="mail">E-mail (optionnel):</label>
						<input type="text" id="mail" name="mail" />	
											
						<label for="promo">Promotion :</label>
						<input type="text" name="promo" id="promo"  />
						
						<label for="picture">Photo (optionnel) :</label>
						<input type="file" name="picture" id="picture">
						<em>(Extensions : jpg, jpeg, gif, bmp, png)</em>
						
					</fieldset>
		
					<fieldset id="user-message">
		
						<label for="text">Votre message (3000 caract&egrave;res max.):</label> 
						<textarea id="text" name="text" rows="0" cols="0" maxlength="3000"></textarea> 
		
						<input type="submit" value="Envoyer" name="submit" class="submit" />		
		
					</fieldset>
					
				</form> 
				
            </div>      