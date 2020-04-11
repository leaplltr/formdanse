<?php 
include('config.php');

$message='votre panier a été enregistré';

$response['message'] = $message;

exit(json_encode($response));

?>
