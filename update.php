<?php
require 'cnx.php';
$post=file_get_contents("php://input");
if(isset($post)&& !empty($post)){
    $req=json_decode($post);


    $c=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->cin)));
    $g=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->gsm)));
    $p=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->passwrd)));

    $sql="UPDATE  client
    SET passwrd='$p',gsm=$g 
    WHERE cin='$c';";

    if(mysqli_query($connexion,$sql)){
        http_response_code(201);
    }else{
        http_response_code(404);

    }
}
?>