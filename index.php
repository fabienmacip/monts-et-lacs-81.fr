<?php
	require_once("./head.php");
?>



<?php
	if(isset($_POST['contact-form-flag']) && 'flag' == $_POST['contact-form-flag']) {

/* 		echo "<pre>",var_dump($_POST),"</pre>"; */


//$DESTINATAIRE = "fabien.macip@gmail.com";
$DESTINATAIRE = "robert.bouchou@orange.fr ";
$DESTINATAIRE_BCC = "fabien.macip@gmail.com";


// Cette fonction sert à nettoyer et enregistrer un texte
function cleanText($text,$br = true)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	$text = stripslashes($text);
	if($br){
		$text = nl2br($text);
	}
        return $text;
			}
			
			$civilite = $_POST['civilite'] ?? 'pas de civilite';
			$nom = $_POST['nom'] ?? 'pas de nom';
			$prenom = $_POST['prenom'] ?? '';
			$mail = $_POST['email'] ?? '';
			$tel = $_POST['telephone'] ?? '';
			$cp = $_POST['cp'] ?? '';
			$ville = $_POST['ville'] ?? '';
			$nature = $_POST['nature-projet'] ?? '';
			$messageFromVisitor = $_POST['objectif'] ?? '';
			$provenance = $_POST['provenance'] ?? 'non-renseigné';
			$conditions = $_POST['conditions'] ?? '';
			
			$provenance = $provenance == '' ? 'non renseigné' : $provenance;
			$conditions = $conditions == false ? "non acceptées" : "acceptées";
			
			$message = "Nature : ".$nature."\n\n";
		$message .= "Message : ".$messageFromVisitor."\n\n";
		$message .= "Provenance : ".$provenance."\n\n";
		$message .= "Mentions légales : ".$conditions."\n\n";
    
    //ICI, AJOUTER fonction dans services/mailEngine.php pour createMail
		
    $dest = $DESTINATAIRE;
    $sujet = "Message depuis le site MONTS-ET-LACS-81.FR de la part de ".$prenom." ".strtoupper($nom);
    $corp = "Message reçu depuis le site MONTS-ET-LACS-81.FR\n\n";
    $corp .= "CIVILITE : ".$civilite."\nNOM : ".$nom."\nPRENOM : ".$prenom."\nMAIL : ".$mail."\nTEL : ".$tel."\n\n";
    /* $adr1 = strlen(trim($adresse)) > 0 ? trim($adresse)."\n" : "";
    $adr2 = strlen(trim($adresse2)) > 0 ? trim($adresse2)."\n" : ""; */
    $corp .= "ADRESSE : ".$cp." ".$ville."\n\n";
    $corp .= "* * * MESSAGE * * *\n\n".$message."\n";
		
		
		/* 'From' => $prenom. ' '.$nom.' <'.$mail.'>', */
		$headers  = array(
			
			'MIME-Version' => '1.0',
			'From' => 'mail_php@fatabien.com',
			'Reply-To' => ''.$mail,
			'Bcc' => $DESTINATAIRE_BCC.",".$mail,
			'Content-Type' => ' text/plain; charset="utf-8"; DelSp="Yes"; format=flowed ; ',
			'Content-Disposition' => ' inline',
			'Content-Transfer-Encoding' => ' 7bit',
			'X-Envelope-From' => ' <'.$mail.'>',
			'X-Priority' => '3',
			'X-MSMail-Priority' => 'Normal',
			'X-Unsent' => '1',
			'X-Originating-IP' => '[0.0.0.0]',
			'X-Mailer' => 'PHP/'.phpversion()
		);
		
		
    if (mail($dest, $sujet, $corp, $headers)) {
			echo "Email envoyé avec succès à $dest ...";
			echo '<div id="toaster-contact-form" class="paragraphe-normal box relative"><div id="toaster-contact-form-cross" class="absolute" onclick="closeContactFormToaster()">X</div>Votre message a bien &eacute;t&eacute; envoy&eacute;.<br>Nous vous recontacterons ces prochains jours.</div>';
    } else {
			echo "Échec de l'envoi de l'email...";
			echo '<div id="toaster-contact-form" class="paragraphe-normal box relative"><div id="toaster-contact-form-cross" class="absolute" onclick="closeContactFormToaster()">X</div>Erreur lors de l\'envoie de votre message.</div>';
    }

	}
	




?>


<main>
	
	<section id="equipe">
		<div>
			<img src="img/canoe.png" alt="canoe">
		</div>
		<div>
			<img src="img/paddle.jpeg" alt="paddle">
		</div>
		<div>
			<img src="img/barque-peche.png" alt="barque-peche">
		</div>
		<div>
			<img src="img/pedalo-enfant.jpeg" alt="pedalo-enfant">
		</div>
	</section>

<div id="bienvenue" class="paragraphe-normal">
	<br>
	<div class="bienvenue">
		Bienvenue chez <span class="span-br"><br></span><b>MONTS & LACS 81</b> !<br/><br/>
	</div>

	N'hésitez pas à nous contacter pour vos demandes d'informations ou de devis...<br><br>
</div>

<div id="contact-infos">
<h3>Contact</h3>
<br>
<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-mini orange" style="width: 16px; height: 16px;">
	<g transform="translate(0 0)">
			<path  d="M23.462,19.376l-3.706-3.715a1.929,1.929,0,0,0-2.725.051l-1.867,1.871-.368-.205A18.583,18.583,0,0,1,10.3,14.122a18.728,18.728,0,0,1-3.255-4.51c-.069-.125-.135-.246-.2-.361L8.1,8l.616-.618a1.938,1.938,0,0,0,.05-2.731L5.06.933A1.927,1.927,0,0,0,2.335.984L1.291,2.037l.029.028A6.058,6.058,0,0,0,.458,3.587,6.321,6.321,0,0,0,.075,5.131C-.414,9.2,1.44,12.914,6.472,17.957c6.955,6.971,12.56,6.444,12.8,6.418a6.251,6.251,0,0,0,1.544-.389,6.016,6.016,0,0,0,1.513-.859l.023.02,1.058-1.039A1.942,1.942,0,0,0,23.462,19.376Z" transform="translate(0 -0.394)"></path>
	</g>
</svg> 
Tél. : <a href="tel:0411300300">04 11 300 300</a><br> -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="ic_phone  orange icon-mini" style="width: 16px; height: 16px;">
	<g transform="translate(0 0)">
			<path d="M23.462,19.376l-3.706-3.715a1.929,1.929,0,0,0-2.725.051l-1.867,1.871-.368-.205A18.583,18.583,0,0,1,10.3,14.122a18.728,18.728,0,0,1-3.255-4.51c-.069-.125-.135-.246-.2-.361L8.1,8l.616-.618a1.938,1.938,0,0,0,.05-2.731L5.06.933A1.927,1.927,0,0,0,2.335.984L1.291,2.037l.029.028A6.058,6.058,0,0,0,.458,3.587,6.321,6.321,0,0,0,.075,5.131C-.414,9.2,1.44,12.914,6.472,17.957c6.955,6.971,12.56,6.444,12.8,6.418a6.251,6.251,0,0,0,1.544-.389,6.016,6.016,0,0,0,1.513-.859l.023.02,1.058-1.039A1.942,1.942,0,0,0,23.462,19.376Z" transform="translate(0 -0.394)"></path>
	</g>
</svg> 
Port. : <a href="tel:0666746194">06 66 74 61 94</a><br>
<br>
<svg xmlns="http://www.w3.org/2000/svg" width="18.385" height="14.201" viewBox="0 0 18.385 14.201" class="icon-mini orange" style="width: 16px; height: 12.36px;"><defs><style>svg.ic_mail .a{fill:var(--main-color-orange);}</style></defs><path  d="M15.385,14.2H3a3,3,0,0,1-3-3V3A3,3,0,0,1,3,0H15.385a3,3,0,0,1,3,3v8.2A3,3,0,0,1,15.385,14.2ZM1.863,2.213a.283.283,0,0,0-.245.195.476.476,0,0,0,.1.53l5.2,4.118L1.656,11.514a.453.453,0,0,0-.039.491.307.307,0,0,0,.24.21.145.145,0,0,0,.1-.036L7.478,7.5l1.6,1.267a.227.227,0,0,0,.14.051h.008a.225.225,0,0,0,.141-.051l1.6-1.264,5.528,4.676a.144.144,0,0,0,.1.036.306.306,0,0,0,.24-.209.451.451,0,0,0-.04-.491L11.519,7.059l5.2-4.121a.476.476,0,0,0,.1-.53.283.283,0,0,0-.245-.195.226.226,0,0,0-.141.053L9.221,7.982,2,2.265A.228.228,0,0,0,1.863,2.213Z" transform="translate(0 0)"></path></svg>
 <a href="mailto:robert.bouchou@orange.fr">robert.bouchou@orange.fr</a><br>
<br>
<svg xmlns="http://www.w3.org/2000/svg" width="16.06" height="18.807" viewBox="0 0 16.06 18.807" class="icon-mini orange" style="width: 16px; height: 18.74px;"><defs><style>svg.ic_location .a{fill:var(--main-color-orange);}</style></defs><path  d="M7.994,18.807h0L5.876,15.768a8.085,8.085,0,0,1-4.209-2.839A8.03,8.03,0,0,1,8.03,0a8.031,8.031,0,0,1,2.064,15.791l-2.1,3.015ZM8.03,3.65a4.38,4.38,0,1,0,4.38,4.38A4.384,4.384,0,0,0,8.03,3.65Z" transform="translate(0 0)"></path></svg> 
Hameau de Rieuviel<br>
81 320 MOULIN-MAGE<br>
<br>

</div>

<div id="google-map" class="google-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1441.7984000845497!2d2.75733188399143!3d43.71892761891885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b1f4dffd1ccd0b%3A0x2606f69d2df637d1!2sRieuviel%2C%2081320%20Moulin-Mage!5e0!3m2!1sfr!2sfr!4v1691427355340!5m2!1sfr!2sfr" 
	style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<!-- -  -  -  -  -  -  -  - C O N T A C T    F O R M   -  -  -  -  -  -  -  -  -  -  -  - -->

<div id="div-form-rdv" class="form-rdv">
	<span class="blue-and-middle-size">
		Demande d'informations ou de r&eacute;servation
	</span>
<?php require_once('./contact-form.php'); ?>
</div>

<!--  *  *  *  *  *  *  *  *  *  E N D   C O N T A C T    F O R M   *  *  *  *  *  *  *  *  * -->
	<div id="infos-details">
		<div id="location-navigable" class="paragraphe-normal">
			<h2>
				Location matériel nagivable
			</h2>
			<p>
				Vous pouvez louer &agrave; l'heure, &agrave; la demi-journ&eacute;e, &agrave; la journ&eacute;e...<br>
				La livraison est gratuite sur le lac du Laouzas.<br>
				Voir notre grille tarifaire ci-dessous.
			</p>
		</div>
	
		<div id="gardiennage" class="paragraphe-normal">
			<h2>
				Gardiennage
			</h2>
			<p>
				Gardiennage caravane et/ou bateau, au mois ou &agrave; l'ann&eacute;e.<br>
				Voir notre grille tarifaire ci-dessous.
			</p>
		</div>
	
		<div id="location-gite" class="paragraphe-normal">
			<h2>
				Location de gîtes class&eacute;s, de 1 &agrave; 10 personnes
			</h2>
			<p>
				2 logements à Moulin-Mage<br>
				2 logements à Murat-sur-V&egrave;bre<br>
				Voir directement sur notre site <a href="http://www.giteduruisseau.com/" target="_blank">G&icirc;te du ruisseau</a>.
			</p>
		</div>
	</div>


</main>

<?php
	require_once('./footer.php');
	require_once('./mentions-legales.php');
?>