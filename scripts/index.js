window.addEventListener('load', function() {

  if (typeof $('#toaster-contact-form') != 'undefined' && $('#toaster-contact-form').is(":visible")) { 
    alert('Votre message a bien été envoyé. Nous vous recontacterons ces prochains jours.');
  }

})

$(document).ready(function(){
/*   $("#form-rdv").click(function(){
    $("p").hide();
  }); */
  //alert("ready");
});

function scrollToContactForm() {
  $([document.documentElement, document.body]).animate({
    scrollTop: $("#div-form-rdv").offset().top
  }, 1500);
}

function renderErrorFormContact(HTMlNode, message) {
  //console.log(HTMlNode);

  makeVisible($('#confirmMailSent'));
  $('#confirmMailSent').style.color = "var(--main-color-red)";
  $('#confirmMailSent').innerHTML = message+"<br/>";


  if (!HTMlNode.innerHTML.includes("error-active")) {
/*         HTMlNode.innerHTML += `
      <div class="errorField error-active">
          <img src="images/project/warning.png" alt="">
          <span>${message}</span>
      </div>
      `;
*/        
      let errorDiv = document.createElement('div');
      errorDiv.classList.add("errorField");
      errorDiv.classList.add("error-active");
      errorDiv.innerHTML = `<img src="images/project/warning.png" alt="">
                              <span>${message}</span>`;
      HTMlNode.appendChild(errorDiv);

      setTimeout(function() {
          let toVanish = $$('.error-active');
          toVanish.forEach(element => {
              element.remove();
          });
          
          hide($('#confirmMailSent'));
          $('#confirmMailSent').style.color = "var(--success)";

      }, 3000);
  }
}

function checkContactFormField(field) {
    
  let error = false;
  
  if(field == 'telephone') {

    const regexPhone = /^(0)[1-9](\d{2}){4}$/;
    //error = ($('#telephone').val().length > 0 && !regexPhone.test($('#telephone').val()));    
    error = (($('#telephone').val().length > 0 && !regexPhone.test($('#telephone').val())) || $('#telephone').val().trim().length < 1);    

  } else if (field == 'email') {
    
    const regexEmail = /^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$/;
    error = (($('#email').val().length > 0 && !regexEmail.test($('#email').val())) || $('#email').val().trim().length < 1);

  } else if (field == 'cp') {
    
    error = $('#cp').val().trim().length < 5;

  } else {
    
    error = ($('#'+field).val().trim().length < 2);

  }
  
  //error = ($('#email').val() === '' && $('#telephone').val() === '');

  if(error) {
    $('#error-'+field).show();
  } else {
    $('#error-'+field).hide();
  }
  
  validFormRdv();


}

function validFormRdv() {
  
  const regexEmail = /^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$/;
  /* var regexPhone = /^(0|\+33)[1-9](\d{2}){4}$/; */
  const regexPhone = /^(0)[1-9](\d{2}){4}$/;
  
  let formOK = true;

  console.log($('#civilite').val());

  if($('#civilite').val().length < 2){
    formOK = false;
    //renderErrorFormContact($('#fm-nom').parentNode, "Le nom doit comporter au moins 2 caractères.");
  }

  if($('#nom').val().length < 2){
    formOK = false;
    //renderErrorFormContact($('#fm-nom').parentNode, "Le nom doit comporter au moins 2 caractères.");
  }

  if($('#prenom').val().length < 2){
    formOK = false;
    //renderErrorFormContact($('#fm-prenom').parentNode, "Le prénom doit comporter au moins 2 caractères.");
  }

  if($('#email').val().length > 0 && !regexEmail.test($('#email').val())){
    formOK = false;
    //renderErrorFormContact($('#fm-mail').parentNode, "Merci d'entrer une adresse mail valide.");
  } 
  
  if($('#telephone').val().length > 0 && !regexPhone.test($('#telephone').val())){
    formOK = false;
    //renderErrorFormContact($('#fm-tel').parentNode, "Le téléphone doit comporter 10 chiffres.");
  }
  
  if($('#email').val() === '' && $('#telephone').val() === ''){
    formOK = false;
    //renderErrorFormContact($('#fm-tel').parentNode, "Merci d'indiquer une adresse mail OU une numéro de téléphone.");
    //renderErrorFormContact($('#fm-mail').parentNode, "Merci d'indiquer une adresse mail OU une numéro de téléphone.");
  }

  if($('#cp').val().length > 0 && $('#cp').val().length < 5){
    formOK = false;
    //renderErrorFormContact($('#fm-cp').parentNode, "Le code postal ne doit comporter que des chiffres.");
  }

  if($('#ville').val().length < 2){
    formOK = false;
    //renderErrorFormContact($('#fm-ville').parentNode, "Ville inconnue...");
  }

  if($('#nature-projet').val().length < 2){
    formOK = false;
    //renderErrorFormContact($('#fm-ville').parentNode, "Ville inconnue...");
  }

  if($('#delai-projet').val().length < 2){
    formOK = false;
    //renderErrorFormContact($('#fm-ville').parentNode, "Ville inconnue...");
  }

  if($('#destination-projet').val().length < 2){
    formOK = false;
    //renderErrorFormContact($('#fm-ville').parentNode, "Ville inconnue...");
  }

  if($('#objectif').val().trim().length === 0){
    formOK = false;
    //renderErrorFormContact($('#fm-message').parentNode, "Avez-vous écrit un message ?");
  }

  if(!($('#conditions').checked)){
    //formOK = false;
    //renderErrorFormContact($('#fm-consentement').parentNode, "Avez-vous lu et accepté les conditions générales ?");
  }

/*   
  if(hex_md5($('#fm-captcha').value) != $('#fm-vcaptcha').value){
    formOK = false;
    renderErrorFormContact($('#fm-captcha').parentNode, "Avez-vous bien répondu à l'addition ?");

    let nb1 = Math.floor(Math.random() * 5) + 1;
    let nb2 = Math.floor(Math.random() * 5) + 1;
    let somme = nb1 + nb2;
    
    $('#fm-vcaptcha').value = hex_md5(somme.toString());
    
    $('#fm-captcha').value = '';
    $('#fm-captcha').placeholder = 'Combien font ' + nb1 + ' + ' + nb2 + ' ?';
  }

 */
  if(formOK){

    $('#btn-submit-contact').addClass('btn-active');
    $('#btn-submit-contact').removeClass('btn-inactive');
    $('#btn-submit-contact').prop('disabled', false);
/*     if (confirm("Confirmer l'envoi de votre message ?")) {  */
/*       let keroxObj = {};
      
      keroxObj.nom = $('#fm-nom').value;
      keroxObj.prenom = $('#fm-prenom').value;
      keroxObj.mail = $('#fm-mail').value;
      keroxObj.tel = $('#fm-tel').value;
      keroxObj.ville = $('#fm-ville').value;
      keroxObj.cp = $('#fm-cp').value;
      keroxObj.adresse = $('#fm-adresse').value;
      keroxObj.adresse2 = $('#fm-adresse2').value;
      keroxObj.message = $('#fm-message').value;
 */  
      //enableButtonLoadingState($('#btn-envoyer-mail'));
      //sendMail(keroxObj);
     /* }  */
  } else {
    /* $("#form-rdv").submit(function(e){
      e.preventDefault();
    }); */
    //alert("Formulaire incomplet");
    $('#btn-submit-contact').removeClass('btn-active');
    $('#btn-submit-contact').addClass('btn-inactive');
    $('#btn-submit-contact').prop('disabled', true);
  }
  
}

function closeContactFormToaster(){
  $('#toaster-contact-form').hide();
}


function displayPage(page) {
  if(page === 'mentions-legales') {
    let main = $('main')
    let pageToDisplay = $('#'+page)
    let topToScroll = main.offset().top-20
    
    main.html('')
    main.append(pageToDisplay)
    pageToDisplay.show()
    
    window.scrollTo({
      top: topToScroll,
      left: 0,
      behavior: "smooth",
    });
  }
}

function popMentionsLegales(){
  let popup = document.createElement('div')
  popup.classList.add('popup')
  let linkToHide = document.getElementById('back-home-from-ml')
  linkToHide.style.display = "none"
  popup.innerHTML = $('#mentions-legales').html()
  popup.style.visibility = "visible"
  document.body.appendChild(popup)
  document.body.style.overflow = "hidden"
  popup.onclick = function() {closePopMentionsLegales(popup)}
  popup.style.overflow = "scroll"
}

function closePopMentionsLegales(popup){
  let linkToShow = document.getElementById('back-home-from-ml')
  linkToShow.style.display = "inherit"
  
  document.body.removeChild(popup)
  document.body.style.overflow = "scroll"
}
