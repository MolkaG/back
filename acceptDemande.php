<?php
require "cnx.php";
$id=$_GET['id'];
$sql="SELECT * FROM demandes WHERE cin='$id';";
$res=mysqli_query($connexion,$sql);
$res=mysqli_fetch_all($res,MYSQLI_ASSOC);

$a=$res[0]['cin'];
$b=$res[0]['nom'];
$c=$res[0]['prenom'];
(int)$d=$res[0]['age'];
(int)$e=$res[0]['tel'];
$f=$res[0]['email'];
$g=$res[0]['categorie'];
(int)$h=$res[0]['experience'];
(int)$i=$res[0]['tarif'];
$j=$res[0]['passwrd'];
$k=$res[0]['img'];
$l=$res[0]['fichier'];

$sql="INSERT INTO coaches
VALUES('$a','$b','$c',$d,$e,'$f','$g',$h,$i,'$j','$k','$l');";

if(mysqli_query($connexion,$sql)){
    http_response_code(201);
    $sql1="DELETE FROM demandes WHERE cin='$id';";
    mysqli_query($connexion,$sql1);
}else{
    http_response_code(404);
}


exit;