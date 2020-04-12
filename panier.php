<!DOCTYPE html>
<html lang="fr">
 
  <head>
	<link rel="stylesheet" href="panier.css" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panier vue.js</title>
	<script src="vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
  
  <?php 
		$idAdherent=$_GET['idAdherent'];
		$nom=$_GET['nom'];
		$prenom=$_GET['prenom'];
    ?>
	<div class="recup">
	<table> 
		<tr> 
			<td> ID </td> 
			<td><?php echo $idAdherent; ?></td> 
		</tr>
		<tr>
			<td> Nom </td>
			<td> <?php echo $nom; ?> </td> 
		</tr> 
		<tr> 
			<td> Prenom </td> 
			<td> <?php echo $prenom; ?> </td> 
		</tr> 
	</table>
	</div>
	
  
    </br>
	<label for="enf"> Nombre d'enfant inscrit de la même famille : </label> 
	<input type="text" id="enf" name="enf" > 
	</br>
	
	
	
	
	
    <div class="container">
      <br>
 
      <script type="text/x-template" id="panier-template">
        <div class="panel panel-primary">
          <div class="panel-heading">Panier</div>        
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
               <th class="col-sm-4">Cours de danse</th>
               <th class="col-sm-2">Categorie</th>
               <th class="col-sm-2">Prix</th>
               <th class="col-sm-2">Total</th>
               <th class="col-sm-1"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in panier">
                <td>{{ item.typeDanse | capitalize }}</td>
                <td>{{ item.categorie }}</td> 
                <td>{{ item.prix | devise '€' }}</td>
                <td><button class="btn btn-danger btn-block" v-on:click="supprimer($index)"><i class="fa fa-trash-o fa-lg"></i></button></td>
              </tr> 
              <tr>
                <td colspan="3"></td>
                <td><strong>{{ total | devise '€' }}</strong></td>
                <td colspan="2">Dont 16 € d'adhesion</td>
              </tr> 
              <tr>
                <td>
					
					<select name="typeDanse"  v-model='input.typeDanse'>
					<?php include('config.php');
						$reponse=$con->query("SELECT DISTINCT TypeDanse FROM tarifs_cours");
						if($reponse->num_rows > 0){ 
							while($row = $reponse->fetch_assoc()){
								echo'<option>'.$row['TypeDanse'].'</option>';
							}
						}
					?>
					</select>
					
				</td>
				
							
                <td>
				
				<select name="categorie" v-model='input.categorie'>
					<?php include('config.php');
						$reponse=$con->query("SELECT DISTINCT 	Categorie FROM tarifs_cours");
						if($reponse->num_rows > 0){ 
							while($row = $reponse->fetch_assoc()){
								echo'<option>'.$row['Categorie'].'</option>';
							}
						}
					?>
					</select>
				
				
				</td>
		
				
                <td><!--<input type="text" class="form-control" v-model.number="input.prix | flottant" placeholder="Prix">--></td>
                <td colspan="3"><button class="btn btn-primary btn-block" v-on:click="ajouter()">Ajouter</button></td>
              </tr>
            </tbody>       
          </table>
        </div> 
      </script>
 
      <div id="tuto">
        <panier :panier="panier"></panier>
      </div>
 
    </div>
	</br>
	</br>
	<div class="paiement"> 
		
		<h3> Choississez le ou les mode(s) de paiment </h3> 
		
		<p> <input type="checkbox" id="cheque"> <label for="cheque"> Chèque </label> </br></p>
		<p> <input type="checkbox" id="virement"> <label for="virement"> Virement</label> </br></p>
		<p><input type="checkbox" id="espece"> <label for="espece"> Espèce </label></br></p>
		<p><input type="checkbox" id="ancvsport"> <label for="ancvsport"> ANCV/SPORT</label> </br></p>
		<p><input type="checkbox" id="ancvvacances"> <label for="ancvvacances"> ANCV /VACANCES </label> </br></p>
		<p><input type="checkbox" id="top"> <label for="top"> TOP'DEPART CULTUREL </label> </br></p>
		<p><input type="checkbox" id="passsport"> <label for="passsport"> Pass'sport/culture </label> </br></p>
		
	</div>
	</br> 
	</br> 
	
<div class="cheque">
	<h3> Si vous avez selectionnez 'Chèque', En combien de fois voulez vous payer ? </h3>  <input type="text" name="cbcheque">
</div> 

<script type="text/javascript">
    var message ;

	function getParams () {
		var result = {};
		var tmp = [];

		location.search
			.substr (1)
			.split ("&")
			.forEach (function (item) 
			{
				tmp = item.split ("=");
				result [tmp[0]] = decodeURIComponent (tmp[1]);
			});

		return result;
	}

	
	function suivant2() {
				location.getParams = getParams;

				console.log (location.getParams());
				console.log (location.getParams()["idAdherent"]);

				event.preventDefault();
				var url="infosupp.php?idAdherent=";

				url=url.concat(location.getParams()["idAdherent"],"&nom=",location.getParams()["nom"],"&prenom=",location.getParams()["prenom"]);
				document.location.href=url;
			}
			
	function enregistrer2() {
				event.preventDefault();
				$.ajax( {
					url: "insere_panier.php",
					type: "POST",
                    dataType: 'JSON',
					data: {/* Completer avec les données à insérer */ },
					success: function(response) {
                        var message = response['message'];
						
                        alert(message);	
						suivant2();	
					},
					error: function(error) {
						alert(error);
					}
				});
			}
</script>

<div class="bouton1">
	<form name="suivant"  method="post">
		<input type="button" onclick="enregistrer2()" value="Enregistrer et Suivant">
	</form>
</div>



    <script src="http://cdn.jsdelivr.net/vue/1.0.10/vue.min.js"></script>
 
    <script>
 
      Vue.component('panier', {
        props: ['panier'],
        template: '#panier-template',
        data: function () {
          return {
            input: { typeDanse: '', categorie: '', prix:0 }
          }
        },
        computed: {
          total: function () {
            var total = 16;
            this.panier.forEach(function(el) {
				if (isNaN(el.prix)) {
				} else {
              total += parseFloat(el.prix);
				}
            });
            return total; 
          }
        },
        methods: {
          ajouter: function() {
			var montant;
			axios.get('ajaxfile.php', {
							    params: {
							      	typed: this.input.typeDanse,
									categorie:this.input.categorie
							    }
							})
						  	.then(function (response) {
						    	montant = response.data[0].Montant;
								console.log("montant=" + montant);
								
								
						  	})
						  	.catch(function (error) {
						    	console.log(error);
						  	})
							.finally(() => {
								this.input.prix = montant;
								console.log("prix=",this.input.prix);
								this.panier.push(this.input);
								this.input = { typeDanse: '', categorie: '', prix: 0 };
							});
			
          },
		  
		 
          supprimer: function(index) {
            this.panier.splice(index, 1);
          },
        },
        filters: {
          devise: function(valeur, symbole) {
            return valeur + ' ' + symbole;
          },
          entier: {
            read: function(valeur) {
              return valeur;
            },
            write: function(nouvelleValeur, ancienneValeur, max) {
              var valeur = parseInt(nouvelleValeur);
              if(valeur % 1 === 0) {
                return valeur > max ? ancienneValeur : valeur;
              }
              return 0;
            }
          },
          flottant: {
            read: function(valeur) {
              return valeur;
            },
            write: function(nouvelleValeur, ancienneValeur) {
              return isNaN(nouvelleValeur) ? ancienneValeur : nouvelleValeur;
            }
          }       
        }
      });
 
      new Vue({
        el: '#tuto',
        data: {
          panier: [
          ],
        }
      });
 
    </script>
 
  </body>
 
</html>