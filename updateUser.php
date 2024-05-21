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
    $cd=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->poids)));
    $tp=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->taille)));
    $tf=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->img)));

    $sql="UPDATE  utilisateurs
    SET passwrd='$p',age=$rsc,tel=$a,poids=$cd,taille=$tp,img='$tf',nom='$n',prenom='$pr',email='$v' 
    WHERE cin='$c';";

    if(mysqli_query($connexion,$sql)){
        http_response_code(201);
    }else{
        http_response_code(404);

    }
}
?>