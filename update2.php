<?php
require "cnx.php";
$id1=$_GET['id1'];
$id2=$_GET['id2'];
$ida=$_GET['ida'];
$cd=$_GET['code'];
$sql="INSERT INTO facture (cinA,cinV,ID_A,Cd_B) VALUES ($id1,$id2,$ida,'$cd');";
mysqli_query($connexion,$sql);
$sql="UPDATE  annonces
SET detail='Expire'
WHERE ID_A=$ida;";
if(mysqli_query($connexion,$sql)){
    http_response_code(201);
}else{
    http_response_code(404);
}
exit;