<!doctype html>
<html>
<head>
    <title>Information sur l'adherent</title>
	<link rel="stylesheet" href="danse.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!--    <link href='jquery-ui.min.css' type='text/css' rel='stylesheet' >
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="jquery-ui.min.js" type="text/javascript"></script>
-->
    <script type="text/javascript">
        var message ;
		var idAdherent;
		
		function suivant() {
				event.preventDefault();
				var url="panier.php?idAdherent=";
				url=url.concat(idAdherent,"&nom=",$("#nom").val(),"&prenom=",$("#prenom").val());
				document.location.href=url;
			}
			
		function enregistrer() {
				event.preventDefault();
				$.ajax( {
					url: "insere.php",
					type: "POST",
                    dataType: 'JSON',
					data: {nom: $("#nom").val(),
					       prenom: $("#prenom").val(),
					       adresse: $("#adresse").val(),
					       ville: $("#ville").val(),
					       codep: $("#codep").val(),
					       date: $("#date").val(),
					       mail: $("#mail").val(),
					       tel: $("#tel").val(),
						   nomP: $("#nomP").val(),
					       prenomP: $("#prenomP").val(),
					       adresseP: $("#adresseP").val(),
					       villeP: $("#villeP").val(),
					       codepP: $("#codepP").val(),
					       mailP: $("#mailP").val(),
					       telP: $("#telP").val(),
						   nomM: $("#nomM").val(),
					       prenomM: $("#prenomM").val(),
					       adresseM: $("#adresseM").val(),
					       villeM: $("#villeM").val(),
					       codepM: $("#codepM").val(),
					       mailM: $("#mailM").val(),
					       telM: $("#telM").val(),
						   nomU: $("#nomU").val(),
					       prenomU: $("#prenomU").val(),
						   telU: $("#telU").val(),
						   },
					success: function(response) {
                        var message = response['message'];
						
                            idAdherent = response['idAdherent'];
						alert(message);	
					suivant();	

					},
					error: function(error) {
						alert(error);
					}
				});
			}


			
        $(document).ready(function(){

           

            $(document).on('keydown', '.recherche', function() {
                
                var id = this.id;
                var id = this.id;

		
                $( '#recherche').autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "getDetails.php",
                            type: 'POST',
                            dataType: 'JSON',
                            data: {search:request.term,request:1},
                            success: function( data ) {
                                response( data );
                            },
							error: function( resultat, statut, erreur ) {
								alert("erreur="+erreur);
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(this).val(ui.item.label); // display the selected text
                        var idAdherent = ui.item.value; // selected id to input

                        // AJAX
                        $.ajax({
                            url: 'getDetails.php',
                            type: 'POST',
                            data: {idAdherent:idAdherent,request:2},
                            dataType: 'json',
                            success:function(response){
                                
                                var len = response.length;
                                if(len > 0){
                                    var id = response[0]['idAdherent'];
                                    var nom = response[0]['Nom'];
                                    var prenom = response[0]['Prenom'];
                                    var date = response[0]['DateNaissance'];
                                    var adresse = response[0]['Adresse'];
									var ville = response[0]['Ville'];
									var tel = response[0]['Adresse'];
									var codep = response[0]['CodeP'];
									var mail = response[0]['Mail'];

                                    document.getElementById('nom').value = nom;
                                    document.getElementById('prenom').value = prenom;
                                    document.getElementById('date').value = date;
                                    document.getElementById('adresse').value = adresse;
									document.getElementById('ville').value = ville;
									document.getElementById('codep').value = codep;
									document.getElementById('tel').value = tel;
									document.getElementById('mail').value = mail;
                                    
                                }
                                
                            },
							error: function( resultat, statut, erreur ) {
								alert("erreur="+erreur);
                            }
                        });

                        return false;
                    }
                });
            });
			
        });

    </script>
</head>


<header>
		<div class="img">
			<img src="logo.PNG" alt="Logo" id="logo" height="130px" width="130px">
			
		</div> 
		<div class="titre">
			<h1>Formulaire d'inscription </h1>
		</div>
	
</header>

<body>

<div class="container">

<div class="annee">
 <label for="annee"> Année d'inscription </label>  
 <input type='text' class='annee' id='annee' >
</div> 

<div class="adherent"> 

<h2> Adhérent </h2> 
</br> 	
<table>
  
  <tbody>
   
   <tr class='tr_input'>
		<td> Recherche </td> 
		<td><input type='text' class='recherche' id='recherche' placeholder='rechercher...'></td>
	</tr> 
	<tr> 
		<td> Nom </td> 
		<td><input type='text' class='nom' id='nom' placeholder="En majuscule" ></td>
	</tr> 

	<tr> 
		<td> Prénom </td> 
		<td><input type='text' class='prenom' id='prenom' placeholder="En majuscule" ></td>
	</tr>

	<tr> 
		<td> Date de naissance </td> 
		<td><input type='text' class='date' id='date' ></td>
    </tr> 
	
	<tr> 
		<td> Adresse </td> 
		<td><input type='text' class='adresse' id='adresse' ></td>
   </tr>
  
   <tr> 
		<td> Ville </td> 
		<td><input type='text' class='ville' id='ville' ></td>
    </tr> 
	<tr> 
		<td> Code Postal </td> 
		<td><input type='text' class='codep' id='codep' ></td>
	</tr> 
	
	<tr> 
		<td> Téléphone </td> 
		<td><input type='text' class='tel' id='tel' ></td>
	
	<tr> 
		<td> Mail </td> 
		<td><input type='text' class='mail' id='mail' ></td>
	</tr> 
  </tbody>
 </table>
 </div> 
 
 <div class="respon">
 
 <h2> Responsables légaux si l'élève est mineur </h2> 
 
 
 </br> 
 </br> 
 <div class="pere">
  <h3> Père ou responsable légal: </h3> 
  
 <table>
  
  <tbody>
	<tr> 
		<td> Nom  </td> 
		<td><input type='text' class='nomP' id='nomP' placeholder="En majuscule" ></td>
	</tr> 
	</tr> 
	
	<tr> 
		<td>  Prénom   </td> 
		<td><input type='text' class='prenomP' id='prenomP' placeholder="En majuscule" ></td>
	</tr>  
	</tr>

	<tr> 
		<td> Adresse </td> 
		<td><input type='text' class='adresseP' id='adresseP' ></td>
    </tr> 
	
	<tr> 
		<td> Ville </td> 
		<td><input type='text' class='villeP' id='villeP' ></td>
   </tr>
   
   <tr> 
		<td> Code Postal </td> 
		<td><input type='text' class='codepP' id='codepP' ></td>
   </tr>
   
   <tr> 
		<td> Téléphone  </td> 
		<td><input type='text' class='telP' id='telP' ></td>
    </tr> 
	
	<tr> 
		<td> Mail </td> 
		<td><input type='text' class='mailP' id='mailP' ></td>
	</tr> 
  </tbody>
 </table>
</div> 

 </br> 
 </br> 
 
<div class="mere"> 
 <h3> Mère ou responsable légal :</h3>
 <table>
  
  <tbody>
	<tr> 
		<td> Nom  </td> 
		<td><input type='text' class='nomM' id='nomM' placeholder="En majuscule" ></td>
	</tr> 
	</tr> 
	
	<tr> 
		<td>  Prénom   </td> 
		<td><input type='text' class='prenomM' id='prenomM' placeholder="En majuscule" ></td>
	</tr>  
	</tr>
	
	<tr> 
		<td> Adresse </td> 
		<td><input type='text' class='adresseM' id='adresseM' ></td>
    </tr> 
	
	<tr> 
		<td> Ville </td> 
		<td><input type='text' class='villeM' id='villeM' ></td>
   </tr>
   
   <tr> 
		<td> Code Postal </td> 
		<td><input type='text' class='codepM' id='codepM' ></td>
   </tr>
   
   <tr> 
		<td> Téléphone  </td> 
		<td><input type='text' class='telM' id='telM' ></td>
    </tr> 
	
	<tr> 
		<td> Mail </td> 
		<td><input type='text' class='mailM' id='mailM' ></td>
	</tr> 
  </tbody>
 </table>
 </div> 
 </div> 

 
 
 <div class="supp"> 
 <h2> Personne à prévenir en cas d'urgence </h2> 
 </br> 
 <table>
  
  <tbody>
	<tr> 
		<td> Nom  </td> 
		<td><input type='text' class='nomU' id='nomU' placeholder="En majuscule" ></td>
	</tr>  
	</tr> 
	
	<tr> 
		<td>  Prénom   </td> 
		<td><input type='text' class='prenomU' id='prenomU' placeholder="En majuscule" ></td>
	</tr>  
	</tr>
	
	<tr> 
		<td> Télephone </td> 
		<td><input type='text' class='telU' id='telU' ></td>
    </tr> 
  </tbody>
 </table>
 </div> 
 

<div class="bouton">
<input type="button" id="sub" onclick="enregistrer()" value="Enregistrer et Suivant">
<span id="result"></span>
</div> 
 
<!--<input type="button" onclick="suivant()" value="Suivant">-->

 
</div>
 
</body>
</html>

