<?php
require 'cnx.php';
$post=file_get_contents("php://input");
if(isset($post)&& !empty($post)){
    $req=json_decode($post);

    $c=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->cin)));
    $p=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->passwrd)));
    $n=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->nom)));
    $pr=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->prenom)));
    $rsc=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->age)));
    $a=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->tel)));
    $v=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->email)));
    $cd=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->categorie)));
    $tp=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->experience)));
    $tar=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->tarif)));
    $tf=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->img)));
    $fich=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->fichier)));
    

    $sql="UPDATE coaches
    SET passwrd='$p',age=$rsc,tel=$a,categorie='$cd',experience=$tp,tarif=$tar,img='$tf',fichier='$fich' 
    WHERE cin='$c';";

    if(mysqli_query($connexion,$sql)){
        http_response_code(201);
    }else{
        http_response_code(404);

    }
}
?>