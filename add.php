<?php
require 'cnx.php';
$post=file_get_contents("php://input");
if(isset($post)&& !empty($post)){
    $req=json_decode($post);


    $c=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->cin)));
    $p=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->mdp)));
    $n=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->nom)));
    //$civ=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->civilite)));
    $pr=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->prenom)));
    $rsc=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->R_SC)));
    $a=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->adresse)));
    $v=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->ville)));
    $cd=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->code)));
    $tp=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->tel_p)));
    $tf=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->tel_f)));
    $m=htmlspecialchars(mysqli_real_escape_string($connexion,($req->mail)));
    

    $sql="INSERT INTO client
    VALUES($c,'$p','Mme','$n','$pr','$rsc','$a','$v','$cd',$tp,$tf,'$m');";

    if(mysqli_query($connexion,$sql)){
        http_response_code(201);
    }else{
        http_response_code(404);

    }
}
?>