<?php 
include('config.php');

$message='';
$ad=0;
$fam=0;
/*Adherent*/
  if(!empty($_POST))
  {
   
    if(empty($_POST['nom']))
    {
      $message = 'Veuillez indiquer votre nom svp !';
    }
     
      elseif(empty($_POST['prenom']))
    {
      $message = 'Veuillez indiquer votre prenom svp !';
    }
     
      elseif(empty($_POST['date']))
    {
      $message = 'Veuillez indiquer votre date de naissance svp !';
    }
     
      elseif(empty($_POST['adresse']))
    {
      $message = 'Veuillez indiquer votre adresse svp !';
    }
	 elseif(empty($_POST['ville']))
    {
      $message = 'Veuillez indiquer votre ville svp !';
    }
	 elseif(empty($_POST['codep']))
    {
      $message = 'Veuillez indiquer votre Code Postal svp !';
    }	
	 elseif(empty($_POST['tel']))
    {
      $message = 'Veuillez indiquer votre telephone svp !';
    }
	 elseif(empty($_POST['mail']))
    {
      $message = 'Veuillez indiquer votre mail svp !';
    }
  } else { 
  $message = 'Erreur formulaire vide';
  }
if ($message != '') {
$response = array();
$response['message'] = $message;
exit(json_encode($response));
}

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$Datenaiss=$_POST['date'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$codep=$_POST['codep'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];

/*Pere*/
if (isset($_POST['nomP'])) {
	$nomP=$_POST['nomP'];
} else {
	$nomP='';
}

if (isset($_POST['prenomP'])) {
	$prenomP=$_POST['prenomP'];
} else {
	$prenomP='';
}

if (isset($_POST['adresseP'])) {
	$adresseP=$_POST['adresseP'];
} else {
	$adresseP='';
}

if (isset($_POST['villeP'])) {
	$villeP=$_POST['villeP'];
} else {
	$villeP='';
}

if (isset($_POST['codepP'])) {
	$codepP=$_POST['codepP'];
} else {
	$codepP='';
}

if (isset($_POST['telP'])) {
	$telP=$_POST['telP'];
} else {
	$telP='';
}

if (isset($_POST['mailP'])) {
	$mailP=$_POST['mailP'];
} else {
	$mailP='';
}

/*Mere*/


if (isset($_POST['nomM'])) {
	$nomM=$_POST['nomM'];
} else {
	$nomM='';
}

if (isset($_POST['prenomM'])) {
	$prenomM=$_POST['prenomM'];
} else {
	$prenomM='';
}

if (isset($_POST['adresseM'])) {
	$adresseM=$_POST['adresseM'];
} else {
	$adresseM='';
}

if (isset($_POST['villeM'])) {
	$villeM=$_POST['villeM'];
} else {
	$villeM='';
}

if (isset($_POST['codepM'])) {
	$codepM=$_POST['codepM'];
} else {
	$codepM='';
}

if (isset($_POST['telM'])) {
	$telM=$_POST['telM'];
} else {
	$telM='';
}

if (isset($_POST['mailM'])) {
	$mailM=$_POST['mailM'];
} else {
	$mailM='';
}
$message='';

/*personne a prevenir en cas d'urgence */

if (isset($_POST['nomU'])) {
	$nomU=$_POST['nomU'];
} else {
	$message = 'Veuillez indiquer le nom de la personne a contacter en cas urgence svp !';
	$nomU='';
}

if (isset($_POST['prenomU'])) {
	$prenomU=$_POST['prenomU'];
} else {
	$message = 'Veuillez indiquer le prenom de la personne a contacter en cas urgence svp !';
	$prenomU='';
}

if (isset($_POST['telU'])) {
	$telU=$_POST['telU'];
} else {
	$message = 'Veuillez indiquer le numero de telephone de la personne a contacter en cas urgence svp !';
	$telU='';
}
if ($message != '') {
$response = array();
$response['message'] = $message;
exit(json_encode($response));
}


$ad = $con->query("INSERT INTO adherent(Nom,Prenom,Adresse,DateNaissance,CodeP,Ville,Tel,Tel2,Tel3,Mail,Mail2) VALUES ('$nom','$prenom','$adresse','$Datenaiss','$codep','$ville','$tel','$telP','$telM','$mail','$mailP')");
//$fam=$con->query("INSERT INTO famille(Nom,Nom_pere,Nom_mere) VALUES ('$nom','$nomP','$nomM')");

$response = array();
if (!$ad && !$fam) {
	$message = "Echec lors de la création de la table : (" . $con->error . ") " . $con->error;
} else {
	$idAdherent=$con->insert_id;
	$message="Adherent cree avec id :".$idAdherent;
}

$response['message'] = $message;
$response['idAdherent'] = $idAdherent;

exit(json_encode($response));

?>
