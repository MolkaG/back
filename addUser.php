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
    
   $sql="INSERT INTO utilisateurs
    VALUES('$c','$n','$pr',$rsc,$a,'$v',$cd,$tp,'$p','$tf');";

    if(mysqli_query($connexion,$sql)){
        http_response_code(201);
    }else{
        json_encode("$c,$n,$pr,$rsc,$a,$v,$cd,$tp,$p");
        http_response_code(404);

    }
}
?>