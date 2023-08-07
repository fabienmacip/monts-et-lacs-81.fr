<form id="form-rdv" name="form-rdv" action="index.php" method="post"
				onsubmit="validFormRdv()">
		<div>
			<div class="civilite">
				<label for="civilite"><span class="asterisque">*</span> Civilit&eacute;</label><br/>
				<select id="civilite" name="civilite" 
								oninput="checkContactFormField('civilite')"
								onblur="checkContactFormField('civilite')">
					<option value=""></option>
					<option value="madame">Madame</option>
					<option value="monsieur">Monsieur</option>
					<option value="societe">Soci&eacute;t&eacute;</option>
					<option value="autre">Autre</option>
				</select>
				<div id="error-civilite" class="contact-form-error">
					Civilit&eacute; : veuillez choisir une option
				</div>
			</div>
		</div>
		<div>
			<div class="nom">
				<label for="nom"><span class="asterisque">*</span> Nom <i>(ou raison sociale)</i></label><br>
				<input type="text" name="nom" id="nom" maxlength=50 
							 placeholder="votre nom" 
							 oninput="checkContactFormField('nom')" 
							 onblur="checkContactFormField('nom')"/>
				<div id="error-nom" class="contact-form-error">Nom : minimum 2 caract&egrave;res</div>
			</div>
			<div class="prenom">
				<label for="prenom"><span class="asterisque">*</span> Pr&eacute;nom <i>(ou nom du responsable si personne morale)</i></label><br>
				<input type="text" name="prenom" id="prenom" maxlength=50 
							 placeholder="votre prénom" 
							 oninput="checkContactFormField('prenom')" 
							 onblur="checkContactFormField('prenom')"/>
				<div id="error-prenom" class="contact-form-error">Pr&eacute;nom : minimum 2 caract&egrave;res</div>
			</div>
		</div>
		

		<div>
			<div class="email">
				<label for="email"><span class="asterisque">*</span> Email</label><br>
				<input type="email" name="email" id="email" maxlength=70 
					     placeholder="votre email (exemple : moi@gmail.com)" 
							 oninput="checkContactFormField('email')" 
							 onblur="checkContactFormField('email')"/>
				<div id="error-email" class="contact-form-error">Email invalide ou vide</div>
			</div>
			<div class="telephone">
				<label for="telephone"><span class="asterisque">*</span> T&eacute;l&eacute;phone</label><br>
				<input type="text" name="telephone" id="telephone" maxlength=10 
							 placeholder="n° de téléphone (exemple : 0122334455)" 
							 oninput="checkContactFormField('telephone')"
							 onblur="checkContactFormField('telephone')"/>
				<div id="error-telephone" class="contact-form-error">T&eacute;l&eacute;phone invalide ou vide</div>
			</div>
		</div>

		<div>
			<div class="cp">
				<label for="cp"><span class="asterisque">*</span> Code Postal</label><br>
				<input type="text" name="cp" id="cp" maxlength=5 
							 placeholder="votre code postal (exemple : 66200)" 
							 oninput="checkContactFormField('cp')"
							 onblur="checkContactFormField('cp')"/>
				<div id="error-cp" class="contact-form-error">Code postal : 5 chiffres</div>
			</div>
			<div class="ville">
				<label for="ville"><span class="asterisque">*</span> Ville</label><br>
				<input type="text" name="ville" id="ville" maxlength=50 
							 placeholder="votre ville" 
							 oninput="checkContactFormField('ville')"
							 onblur="checkContactFormField('ville')"/>
				<div id="error-ville" class="contact-form-error">Ville : minimum 2 caract&egrave;res</div>
			</div>
		</div>

		<div>
			<div class="nature-projet">
				<label for="nature-projet"><span class="asterisque">*</span> Demande principale</label><br>
				<select id="nature-projet" name="nature-projet" 
								oninput="checkContactFormField('nature-projet')"
								onblur="checkContactFormField('nature-projet')">
					<option value=""></option>
					<option value="location-paddle">Location paddle</option>
					<option value="location-barque">Location barque</option>
					<option value="location-barque-peche">Location barque pêche</option>
					<option value="location-canoe">Location canoë</option>
					<option value="location-canoe-peche">Location canoë pêche</option>
					<option value="location-pedalo">Location p&eacute;dalo</option>
					<option value="location-pedalo-enfant">Location p&eacute;dalo enfant</option>
					<option value="gardiennage-caravane">Gardiennage caravane</option>
					<option value="gardiennage-bateau">Gardiennage bateau</option>
					<option value="location-gite">Location gîte</option>
					<option value="autre">Autre...</option>
				</select>
				<div id="error-nature-projet" class="contact-form-error">Veuillez choisir une option</div>
			</div>
		</div>

		<div>
			<div class="objectif-rdv">
				<label for="objectif">
				<span class="asterisque">*</span> Votre message ici</label><br>
				<textarea name="objectif" id="objectif" maxlength=800 
									cols="50" rows="3" 
									oninput="checkContactFormField('objectif')"
									onblur="checkContactFormField('objectif')"></textarea>
				<div id="error-objectif" class="contact-form-error">Objectif : minimum 2 caract&egrave;res</div>
			</div>
		</div>

		<div>
			<div class="provenance">
				<label for="provenance">Comment nous avez-vous connu ?</label><br>
				<select id="provenance" name="provenance">
					<option value=""></option>
					<option value="google">Google (ou tout autre moteur de recherche)</option>
					<option value="facebook">Facebook</option>
					<option value="pro">Un professionnel</option>
					<option value="particulier">Un particulier (bouche &agrave; oreille)</option>
					<option value="pub">Une publicité</option>
					<option value="autre">Autre</option>
				</select>
			</div>
		</div>

		<div>
			<div class="conditions">
					<span class="asterisque">*</span> Champ obligatoire<br><br>
					<div id="div-conditions-case">
						<input type="checkbox" name="conditions" id="conditions"
                onclick="checkContactFormField('conditions')"
							  onblur="checkContactFormField('conditions')">
						<div>
							En cliquant sur « déposer une demande » vous acceptez que vos données soient utilis&eacute;es 
							par MONTS & LACS 81 pour vous contacter par téléphone ou par e-mail à 
							propos de votre demande. Consultez nos
							<span class="doc-link pointer" onclick="popMentionsLegales()">
								Mentions L&eacute;gales</span> 
								pour en savoir plus sur l'utilisation de vos données ou pour exercer vos droits
									et notamment votre droit d'opposition.<br><br>
						</div>	
					</div>
			</div>
		</div>
</div>

		<div>
			<div class="tr">
				<input type="hidden" name="contact-form-flag" id="contact-form-flag" value="flag" />
				<button type="submit" id="btn-submit-contact" name="btn-submit-contact" 
							 class="btn-inactive" disabled >
					ENVOYER MON MESSAGE
					<!-- onclick="validFormRdv()" -->
				</button>
			</div>
		</div>

	</form>