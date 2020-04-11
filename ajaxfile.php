<?php
include "config.php";

$condition = "1";
if(isset($_GET['typed']) && isset($_GET['categorie'])){
   $condition = " TypeDanse=\"".$_GET['typed']."\"";
   $condition = $condition . "AND Categorie=\"".$_GET['categorie']."\"";
}
/*rowData = mysqli_query($con,"select * from tarifs_cours WHERE \"".$condition."\"");*/

$rowData = mysqli_query($con,"select *  from tarifs_cours WHERE ".$condition);

$response = array();

while($row = mysqli_fetch_assoc($rowData)){

   $response[] = $row;
}

echo json_encode($response);

?>