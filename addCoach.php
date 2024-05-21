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
    
    $sql1="INSERT INTO demandes
    VALUES('$c','$n','$pr',$rsc,$a,'$v','$cd',$tp,$tar,'$p','$tf','$fich');";

     $sql="SELECT * FROM coaches";
     $res=mysqli_query($connexion,$sql);
     $res=mysqli_fetch_all($res,MYSQLI_ASSOC);
     foreach($res as $a)
         {   
             if($a['cin']!=$c){
                 $z=true;
                 break;
             }
         }
     if($z){ 
         if(mysqli_query($connexion,$sql1)){
            http_response_code(201);
        }else{
            http_response_code(404);
    
        }  
     }else{
         http_response_code(404);
     }
}
?>