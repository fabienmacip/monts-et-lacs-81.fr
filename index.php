<?php
	require_once("./head.php");
?>



<?php
	if(isset($_POST['contact-form-flag']) && 'flag' == $_POST['contact-form-flag']) {
		echo '<div id="toaster-contact-form" class="paragraphe-normal box relative"><div id="toaster-contact-form-cross" class="absolute" onclick="closeContactFormToaster()">X</div>Votre message a bien &eacute;t&eacute; envoy&eacute;.<br>Nous vous recontacterons ces prochains jours.</div>';
		
		//$DESTINATAIRE = "r.durin@lacentraledefinancement.fr";
		$DESTINATAIRE = "fabien.macip@gmail.com";
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
		$delai = $_POST['delai-projet'] ?? '';
		$destination = $_POST['destination-projet'] ?? '';
		$nature = $_POST['nature-projet'] ?? '';
		$objectif = $_POST['objectif'] ?? '';
		$provenance = $_POST['provenance'] ?? '';
		$conditions = $_POST['conditions'] ?? '';

		$provenance = $provenance == '' ? 'non renseigné' : $provenance;
		$conditions = $conditions == false ? "Pas opposé à la réutilisation des coordonnées" : "Opposé à la réutilisation des coordonnées";

		$message = "Délai : ".$delai."\n\n";
		$message .= "Destination : ".$destination."\n\n";
		$message .= "Nature : ".$nature."\n\n";
		$message .= "Objectif : ".$objectif."\n\n";
		$message .= "Provenance : ".$provenance."\n\n";
		$message .= "Conditions : ".$conditions."\n\n";
    //$adresse = $_POST['ville'] ?? '';
    /* $adresse2 = $_POST['adresse2'] ?? '';
    $message = $_POST['message'] ?? ''; */

/*     $nom = cleanText($nom);
    $prenom = cleanText($prenom);
    $ville = cleanText($ville);
    $cp = cleanText($cp);
    $adresse = cleanText($adresse);
    $adresse2 = cleanText($adresse2);
    $message = cleanText($message, false); */
    
    //ICI, AJOUTER fonction dans services/mailEngine.php pour createMail

    $dest = $DESTINATAIRE;
    $sujet = "Message depuis le site PCF-LCF.FR de la part de ".$prenom." ".strtoupper($nom);
    $corp = "Message reçu depuis le site PCF-LCF.FR\n\n";
    $corp .= "CIVILITE : ".$civilite."\nNOM : ".$nom."\nPRENOM : ".$prenom."\nMAIL : ".$mail."\nTEL : ".$tel."\n\n";
    /* $adr1 = strlen(trim($adresse)) > 0 ? trim($adresse)."\n" : "";
    $adr2 = strlen(trim($adresse2)) > 0 ? trim($adresse2)."\n" : ""; */
    $corp .= "ADRESSE : ".$cp." ".$ville."\n\n";
    $corp .= "MESSAGE\n\n".$message."\n";

	
		$headers  = array(

			'MIME-Version' => '1.0',
			'From' => $prenom. ' '.$nom.' <'.$mail.'>',
			'Reply-To' => ''.$mail,
			'Bcc' => $DESTINATAIRE_BCC.",".$mail,
			'Content-Type' => ' text/plain; charset="utf-8"; DelSp="Yes"; format=flowed ; ',
			'Content-Disposition' => ' inline',
			'Content-Transfer-Encoding' => ' 7bit',
			'X-Envelope-From' => ' <'.$mail.'>',
			'X-Mailer' => 'PHP/'.phpversion()
		);


    if (mail($dest, $sujet, $corp, $headers)) {
      //echo "Email envoyé avec succès à $dest ...";
    } else {
      //echo "Échec de l'envoi de l'email...";
    }

}





?>

<section id="equipe">
	<div>
		<img src="img/canoe.png" alt="canoe">
	</div>
	<div>
		<img src="img/paddle.jpeg" alt="paddle">
	</div>
	<div>
		<img src="img/barque-peche.png" alt="baque-peche">
	</div>
</section>

<main>


<div id="bienvenue" class="paragraphe-normal">
	<br>
	<div class="bienvenue">
		Bienvenue chez <b>MONTS & LACS 81</b> !<br/><br/>
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

<!-- <div class="button-to-take-rdv">
	<button id="to-take-rdv" href="#div-form-rdv" onclick="scrollToContactForm()">
		PRENEZ RENDEZ-VOUS
	</button>
</div>
 -->

<!--  <div class="conseiller-et-horaires paragraphe-normal">

	<div class="conseiller-accueil">
		<div class="conseiller-accueil-logo">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 41.8 60.5" style="enable-background:new 0 0 41.8 60.5; width: 40px; height: 57.89px;" xml:space="preserve" class="ic_character orange">
				<g transform="translate(-982.835 -2507.346)">
				<g transform="translate(433.531 2050.382)">
					<path d="M561.2,486.2L561.2,486.2L561.2,486.2z"></path>
					<path d="M579.3,486.2L579.3,486.2L579.3,486.2z"></path>
					<g>
						<path d="M591.1,510.2c-0.1-0.3-0.2-1.3-0.3-2.4c-0.7-7.1-1.2-11.2-2.2-12.6c-1.2-1.7-6.5-3.2-10.6-4.1     c1.9-1.3,3.4-2.7,3.8-3.3c0.1-0.2,0.4-0.6,0.6-2.4c0,0,0,0,0,0c2.2-3.6,2.7-6.2,1.7-8c-0.4-0.8-1-1.2-1.6-1.5     c1.2-2,3.7-7.4,0.6-11c0-1.5-0.5-3.5-2.1-5.1c-2.6-2.6-7-3.5-13.1-2.5c-0.4,0.1-10.9,1.8-11.7,9.6c-0.2,1-1.2,6.6,0.1,10.2     c-0.1,0.1-0.2,0.3-0.3,0.4c-0.9,1.8-0.3,4.3,2,7.5c0.2,2,0.5,2.4,0.6,2.6c0.5,0.6,2.1,2.1,4.1,3.5c-2.8,1-8.7,3.3-10.5,4.4     c-2.6,1.6-3,9.5-3,14.1c0,0.5,0.2,0.9,0.6,1.2c6.3,4.9,13.4,6.5,19.8,6.5c9.3,0,17.2-3.2,19.7-4.7     C590,512.3,591.3,511.5,591.1,510.2z M571.7,494.5c0.6-0.2,1.3-0.4,2-0.8l-2,7.4L571.7,494.5     C571.7,494.6,571.7,494.5,571.7,494.5z M559.2,467.5c0-0.1,0-0.1,0-0.2c0.5-5.6,9.1-7,9.1-7c1.6-0.2,2.9-0.3,4.1-0.3     c3.6,0,5.5,1,6.5,2c1.2,1.2,1.3,2.7,1.2,3.3c-0.1,0.5,0.1,1,0.5,1.4c1.8,1.6,0.9,4.5,0.1,6.4c-3.1-2.6-9.4-2.3-12.8-2l0.1-0.3     c0.1-0.5-0.1-1-0.4-1.4c-0.4-0.4-0.9-0.5-1.4-0.4c-2.2,0.5-5.3,3.1-7.4,5.1C558.5,471.8,559,468.8,559.2,467.5z M561.2,486.2     c-0.2-0.9-0.3-4.5-0.1-8.6c0-0.1,0.1-0.3,0.1-0.5c0-0.1,0-0.2,0-0.4c0-0.2,0-0.4,0-0.7c1.1-1.1,2.3-2.1,3.4-2.9     c0.1,0.3,0.2,0.5,0.4,0.7c0.3,0.4,0.8,0.5,1.3,0.4c3.9-0.7,12.2-1.1,13.1,2c0,0.1,0.1,0.1,0.1,0.2c0.2,4.5,0.2,8.6-0.1,9.6     c-1.1,1.2-6.4,5.3-8.7,5.5c-0.1,0-0.2,0-0.3,0s-0.2,0-0.3,0C567.6,491.4,562.2,487.4,561.2,486.2z M568.7,494.5     C568.7,494.5,568.7,494.5,568.7,494.5l0,6.6l-2-7.4C567.4,494,568.1,494.3,568.7,494.5z M552.3,509.1c0.1-5.1,0.8-10.1,1.5-10.8     c1.5-0.9,6.7-2.9,9.9-4.1l5,18.5c0.2,0.7,0.8,1.1,1.4,1.1s1.3-0.5,1.4-1.1l5.1-18.7c4.2,0.9,8.7,2.2,9.4,3     c0.7,1.2,1.5,8.7,1.7,11.2c0.1,0.8,0.1,1.5,0.2,1.9C584.9,512.2,566.2,519.3,552.3,509.1z"></path>
						<path d="M573,488.3c0.7-0.5,0.8-1.4,0.3-2.1c-0.5-0.7-1.4-0.8-2.1-0.3c-1,0.7-2.3-0.1-2.4-0.1     c-0.7-0.4-1.6-0.2-2,0.5c-0.4,0.7-0.2,1.6,0.5,2.1c0.7,0.4,1.7,0.8,2.9,0.8C571.2,489.2,572.2,488.9,573,488.3z"></path>
						<path d="M567.5,479.8v-2.6c0-0.8-0.7-1.5-1.5-1.5s-1.5,0.7-1.5,1.5v2.6c0,0.8,0.7,1.5,1.5,1.5     S567.5,480.6,567.5,479.8z"></path>
						<path d="M574.4,481.4c0.8,0,1.5-0.7,1.5-1.5v-2.6c0-0.8-0.7-1.5-1.5-1.5s-1.5,0.7-1.5,1.5v2.6     C572.9,480.8,573.5,481.4,574.4,481.4z"></path>
					</g>
				</g>
			</g>
			</svg>
		</div>
		<div class="conseiller-accueil-liste">
			<b>Votre conseiller vous accueillera pour :</b><br>
			<svg xmlns="http://www.w3.org/2000/svg" width="9.79" height="8.448" viewBox="0 0 9.79 8.448"><defs><style>.a,.b{fill:none;stroke:#e55d48;stroke-linecap:round;stroke-width:2px;}.a{stroke-linejoin:round;}</style></defs><g transform="translate(-728.5 -432.284)"><path class="a" d="M-2136.934,9771.511l3.224,3.225-3.224,3.224" transform="translate(2871 -9338.226)"/><line class="b" x1="7" transform="translate(729.5 436.5)"/></g></svg> Assurance emprunteur<br>
			
			<svg xmlns="http://www.w3.org/2000/svg" width="9.79" height="8.448" viewBox="0 0 9.79 8.448"><defs><style>.a,.b{fill:none;stroke:#e55d48;stroke-linecap:round;stroke-width:2px;}.a{stroke-linejoin:round;}</style></defs><g transform="translate(-728.5 -432.284)"><path class="a" d="M-2136.934,9771.511l3.224,3.225-3.224,3.224" transform="translate(2871 -9338.226)"/><line class="b" x1="7" transform="translate(729.5 436.5)"/></g></svg> Prêt et crédit immobilier<br>
			
			<svg xmlns="http://www.w3.org/2000/svg" width="9.79" height="8.448" viewBox="0 0 9.79 8.448"><defs><style>.a,.b{fill:none;stroke:#e55d48;stroke-linecap:round;stroke-width:2px;}.a{stroke-linejoin:round;}</style></defs><g transform="translate(-728.5 -432.284)"><path class="a" d="M-2136.934,9771.511l3.224,3.225-3.224,3.224" transform="translate(2871 -9338.226)"/><line class="b" x1="7" transform="translate(729.5 436.5)"/></g></svg> Rachat de crédits
		</div>
	</div>
 -->	
<!-- 	<div class="horaires">
		<div class="horaires-logo">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="ic_time-left" x="0px" y="0px" viewBox="0 0 35 34.7" style="enable-background:new 0 0 35 34.7; width: 40px; height: 39.66px;" xml:space="preserve" class="ic_time_left orange">
				<style type="text/css">
					svg.ic_time_left .st0{fill:var(--main-color-orange);}
				</style>
				<g id="Layer_2_16_" transform="translate(0 0)">
					<g id="Groupe_813">
						<path id="Tracé_1239" class="st0" d="M21,31.7c-0.3,0.1-0.6,0.1-0.9,0.2c-0.8,0.1-1.3,0.9-1.1,1.6c0.1,0.8,0.9,1.3,1.6,1.1l0,0    c0.3-0.1,0.7-0.1,1-0.2c0.7-0.2,1.2-1,1-1.7C22.5,32,21.8,31.6,21,31.7L21,31.7z"></path>
						<path id="Tracé_1240" class="st0" d="M31.4,12.9c0.3,0.7,1.1,1.1,1.8,0.9c0.7-0.3,1.1-1,0.9-1.7c-0.1-0.3-0.2-0.7-0.4-1    c-0.3-0.7-1.1-1.1-1.8-0.8s-1.1,1.1-0.8,1.8c0,0,0,0,0,0C31.2,12.3,31.3,12.6,31.4,12.9z"></path>
						<path id="Tracé_1241" class="st0" d="M25.6,29.7c-0.2,0.2-0.5,0.3-0.8,0.5c-0.7,0.4-1,1.2-0.6,1.9s1.2,1,1.9,0.6    c0,0,0.1,0,0.1-0.1c0.3-0.2,0.6-0.4,0.9-0.6c0.6-0.4,0.8-1.3,0.4-2C27.1,29.5,26.2,29.3,25.6,29.7L25.6,29.7z"></path>
						<path id="Tracé_1242" class="st0" d="M35,16.8c0-0.8-0.7-1.4-1.5-1.3c-0.8,0-1.4,0.7-1.4,1.5c0,0.3,0,0.6,0,0.9    c0,0.8,0.6,1.4,1.4,1.5c0.8,0,1.4-0.6,1.5-1.4c0,0,0,0,0,0C35,17.5,35,17.2,35,16.8z"></path>
						<path id="Tracé_1243" class="st0" d="M31.2,26c-0.6-0.5-1.5-0.3-2,0.3c0,0,0,0,0,0c-0.2,0.2-0.4,0.5-0.6,0.7    c-0.5,0.6-0.4,1.5,0.2,2c0,0,0.1,0.1,0.1,0.1c0.6,0.4,1.4,0.3,1.9-0.2c0.2-0.3,0.5-0.6,0.7-0.8C31.9,27.4,31.8,26.5,31.2,26    L31.2,26z"></path>
						<path id="Tracé_1244" class="st0" d="M33.3,20.9c-0.7-0.2-1.5,0.2-1.8,0.9c-0.1,0.3-0.2,0.6-0.3,0.8c-0.3,0.7,0.1,1.5,0.9,1.8    c0.7,0.2,1.5-0.1,1.8-0.8c0.1-0.3,0.2-0.7,0.3-1C34.4,22,34,21.2,33.3,20.9z"></path>
						<path id="Tracé_1245" class="st0" d="M14.9,31.9c-1.2-0.2-2.5-0.6-3.6-1.1c0,0,0,0,0,0c-0.3-0.1-0.5-0.3-0.8-0.4l0,0    C10,30.1,9.5,29.8,9,29.5C2.4,24.8,0.8,15.7,5.5,9c1-1.4,2.2-2.6,3.6-3.6l0.1,0C14.1,2,20.6,2,25.6,5.3l-1.1,1.6    c-0.3,0.4-0.1,0.8,0.4,0.7l4.8-0.4c0.4,0,0.8-0.4,0.7-0.8c0-0.1,0-0.1,0-0.2l-1.3-4.6C29,1,28.6,0.9,28.3,1.4L27.2,3    c-3.7-2.5-8.3-3.5-12.7-2.7c-0.4,0.1-0.9,0.2-1.3,0.3h0l-0.1,0C9.3,1.5,5.9,3.8,3.5,7c0,0,0,0-0.1,0.1C3.4,7.2,3.3,7.3,3.2,7.4    C3.1,7.6,3,7.8,2.8,8c0,0,0,0,0,0.1c-2,3-2.9,6.6-2.8,10.2c0,0,0,0,0,0c0,0.4,0,0.7,0.1,1.1c0,0,0,0,0,0.1c0,0.4,0.1,0.7,0.2,1.1    c0.6,3.6,2.3,6.9,4.9,9.4l0,0l0,0c0.7,0.7,1.4,1.3,2.2,1.9c2.1,1.5,4.5,2.5,7,2.9c0.8,0.1,1.5-0.4,1.6-1.2    C16.1,32.8,15.6,32.1,14.9,31.9L14.9,31.9z"></path>
						<path id="Tracé_1246" class="st0" d="M16.6,6.1c-0.6,0-1.1,0.5-1.1,1.1v11.3L25.8,24c0.6,0.3,1.2,0.1,1.5-0.5s0.1-1.2-0.5-1.5    l-9.1-4.7V7.3C17.8,6.6,17.2,6.1,16.6,6.1z"></path>
					</g>
				</g>
				</svg>
		</div>
		<div class="horaires-liste">
			<b>Horaires d'ouverture :</b><br><br>
			Du lundi au vendredi de 09h00 à 13h00, puis de 14h00 à 18h00.
		</div>
	</div>
</div>
 -->
<div id="google-map" class="google-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1441.7984000845497!2d2.75733188399143!3d43.71892761891885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b1f4dffd1ccd0b%3A0x2606f69d2df637d1!2sRieuviel%2C%2081320%20Moulin-Mage!5e0!3m2!1sfr!2sfr!4v1691427355340!5m2!1sfr!2sfr" 
	style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<!-- -  -  -  -  -  -  -  - C O N T A C T    F O R M   -  -  -  -  -  -  -  -  -  -  -  - -->

<div id="div-form-rdv" class="form-rdv">
	<span class="blue-and-middle-size">
		Demande d'informations ou de r&eacute;servation
	</span>
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
			<!-- <div class="delai-projet">
				<label for="delai-projet"><span class="asterisque">*</span> D&eacute;lais</label><br>
				<select id="delai-projet" name="delai-projet" 
								oninput="checkContactFormField('delai-projet')"
								onblur="checkContactFormField('delai-projet')">
					<option value=""></option>
					<option value="immediat">Imm&eacute;diat</option>
					<option value="6mois">Moins de 6 mois</option>
					<option value="12mois">Moins de 12 mois</option>
					<option value="renseignements">Simple demande de renseignements</option>
				</select>
				<div id="error-delai-projet" class="contact-form-error">Veuillez choisir une option</div>
			</div> -->
		</div>

<!-- 		<div>
			<div class="destination-projet">
				<label for="destination-projet"><span class="asterisque">*</span> Destination du projet</label><br>
				<select id="destination-projet" name="destination-projet" 
								oninput="checkContactFormField('destination-projet')"
								onblur="checkContactFormField('destination-projet')">
					<option value=""></option>
					<option value="rp">R&eacute;sidence principale</option>
					<option value="secondaire">R&eacute;sidence secondaire</option>
					<option value="locatif">R&eacute;sidence locative</option>
					<option value="autre">Autre</option>
				</select>
				<div id="error-destination-projet" class="contact-form-error">Veuillez choisir une option</div>
			</div>
		</div>
 -->
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
						<input type="checkbox" name="conditions" id="conditions">
						<div>
							En cliquant sur « déposer une demande » vous acceptez que vos données soient utilis&eacute;es 
							par MONTS & LACS 81 pour vous contacter par téléphone ou par e-mail à 
							propos de votre demande. Consultez nos
							<a class="doc-link" href="mentions-legales.php">
								Mentions L&eacute;gales</a> 
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
					D&Eacute;POSER UNE DEMANDE
					<!-- onclick="validFormRdv()" -->
				</button>
			</div>
		</div>

	</form>
</div>

<!--  *  *  *  *  *  *  *  *  *  E N D   C O N T A C T    F O R M   *  *  *  *  *  *  *  *  * -->
	<div id="infos-details">
		<div id="location-navigable" class="paragraphe-normal">
			<h2>
				Location matériel nagivable
			</h2>
			<p>
				Vous pouvez louer &grave; l'heure, &agrave; la demi-journ&eacute;e, &grave; la journ&eacute;e...<br>
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
?>