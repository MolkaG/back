<?php
    require 'cnx.php';
    $post=file_get_contents("php://input");
    if(isset($post)&& !empty($post)){
    $req=json_decode($post);
    $z=false;
    $sql="SELECT * FROM coaches";
    $res=mysqli_query($connexion,$sql);
    $res=mysqli_fetch_all($res,MYSQLI_ASSOC);
    $c=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->cin)));
    $m=htmlspecialchars(mysqli_real_escape_string($connexion,trim($req->mdp)));
    foreach($res as $a)
        {   
            if($a['cin']==$c && $a['passwrd']==$m){
                $z=true;
                break;
            }
        }
    if($z){ 
        http_response_code(201);
       
    }else{
        http_response_code(404);
    }
    }
  ?>