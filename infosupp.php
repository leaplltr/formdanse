<!DOCTYPE html> 
<html> 
<head> 
	<link rel="stylesheet" href="styleprojet.css" />
	<meta charset="utf-8">
</head> 
<header>
	<div class="overlay">
		<div class="img">
			<img src="logo.PNG" alt="Logo" id="logo" height="130px" width="130px">
		</div> 
	<h1>Formulaire d'inscription </h1>
	</div>
	
	<script>	
		location.getParams = getParams;

		console.log (location.getParams());
		console.log (location.getParams()["idAdherent"]);
		console.log (location.getParams()["nom"]);
		console.log (location.getParams()["prenom"]);
		
		function suivant3() {
				
				event.preventDefault();
				var url="index.php";
				document.location.href=url;
			}

		function enregistrer3() {
			var message = "Inscription enregistree. Retour à l'accueil";
						
            alert(message);	
			suivant3();
		}
			
	</script>
</header>
<body> 

	<?php 
		$idAdherent=$_GET['idAdherent'];
		$nom=$_GET['nom'];
		$prenom=$_GET['prenom'];
    ?>
	<table> 
		<tr> 
			<td> IdAdherent </td> 
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
	
	
</br>
</br>

<div class="info">
<h2> Documents à fournir : </h2> 
	</br>
	<p>
    <input type="checkbox" id="reg" name="reg" value="reg">
    <label for="reg">Réglements intérieur</label>
	</p>
	</br>
	<p>
    <input type="checkbox" id="certif" name="certif" value="certif">
    <label for="certif">Certificat médical </label>
	</p>
    </br> 
	
<h2> Bénévolat : </h2> 
	</br>
	<p>
    <input type="checkbox" id="integre" name="integre" value="integre">
    <label for="integre">Intégrer le conseil d'administration</label>
	</p>
	</br>
	<p>
    <input type="checkbox" id="actif" name="actif" value="actif">
    <label for="actif">Devenir membre actif de l'association  </label>
    </p>
	</br>
	<p>
    <input type="checkbox" id="occa" name="occa" value="occa">
    <label for="occa">Devenir membre occasionnel </label>
	</p>
	</br>
	<p>
    <input type="checkbox" id="participe" name="participe" value="participe">
    <label for="participe">Je ne souhaite pas participer à l'association </label>
	</p>
    </br>
	</br>
	</br> 
	<label for="com"> Commentaire(s) : </label> 
	<input type="textarea" id="com" name="com" > 
	
	</div>


<div class="bouton">
<input type="button" id="sub" onclick="enregistrer3()" value="Enregistrer et Suivant">
<span id="result"></span>
</div> 
 
</body> 


</html>
