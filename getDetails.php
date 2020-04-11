<?php
include("config.php");

$request=$_POST['request']; //request



//Get username list
if($request==1){
	$search = $_POST['search'];
	$query="SELECT * FROM adherent WHERE Nom LIKE '%".$search."%'";
	$result=mysqli_query($con,$query);
	
	while($row=mysqli_fetch_array($result)){
		$response[]=array("value"=>$row['idAdherent'],"label"=>$row['Nom'].' '.$row['Prenom']);
	}
	
	// Encoding array to json format 
	echo json_encode($response);
	exit;
}

//Get details 
if($request==2){
	$idAdherent=$_POST['idAdherent'];
	$sql="SELECT * FROM adherent WHERE idAdherent=".$idAdherent;
	
	$result=mysqli_query($con,$sql);
	$user_arr=array();
	
	while($row=mysqli_fetch_array($result)){
		$idAdherent=$row['idAdherent'];
		$Nom=$row['Nom'];
		$Prenom=$row['Prenom' ];
		$Adresse=$row['Adresse'];
		$Date=$row['DateNaissance'];
		$Ville=$row['Ville'];
		$CodeP=$row['CodeP'];
		$Tel=$row['Tel'];
		$Mail=$row['Mail'];
		
		
		$users_arr[]=array("idAdherent"=>$idAdherent, "Nom"=>$Nom, "Prenom"=>$Prenom, "Adresse"=>$Adresse,"DateNaissance"=>$Date,"Ville"=>$Ville,"CodeP"=>$CodeP,"Tel"=>$Tel,"Mail"=>$Mail);
	}
	
	//Encoding array to json format
	echo json_encode($users_arr);
	exit;
}
?>
