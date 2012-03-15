			<div id="formulaire">	
				
				<form method="post" action="pages/data.php" enctype="multipart/form-data">
			
					<h1>Votre message personnel</h1>
				
					<fieldset id="user-details">

						<label for="nom">Nom :</label>
						<input type="text" id="nom" name="nom" required />
						
						<label for="prenom">Pr&eacute;nom :</label>
						<input type="text" id="prenom" name="prenom" required />
			
						<label for="mail">E-mail (optionnel):</label>
						<input type="text" id="mail" name="mail" />	
											
						<label for="promo">Promotion :</label>
						<input type="text" name="promo" id="promo" required />
						
						<label for="picture">Photo (optionnel) :</label>
						<input type="file" name="picture" id="picture">
						<em>(Extensions : jpg, jpeg, gif, bmp, png)</em>
						
					</fieldset>
		
					<fieldset id="user-message">
		
						<label for="text">Votre message :</label> 
						<textarea id="text" name="text" rows="0" cols="0"></textarea> 
		
						<input type="submit" value="Envoyer" name="submit" class="submit" />		
		
					</fieldset>
					
				</form> 
				
            </div>      