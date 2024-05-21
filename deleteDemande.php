<?php
 require "cnx.php";
 $id=$_GET['id'];
 $sql="SELECT * FROM demandes WHERE cin='$id';";
 $res=mysqli_query($connexion,$sql);
 $res=mysqli_fetch_all($res,MYSQLI_ASSOC);

 foreach($res as $a)
 {   
    $c=$a['cin'];
    $p=$a['nom'];
    $n=$a['prenom'];
    $pr=$a['age'];
    $rsc=$a['tel'];
    $x=$a['email'];
    $v=$a['categorie'];
    $cd=$a['experience'];
    $tarif=$a['tarif'];
    $file=$a['fichier'];
    $tp=$a['passwrd'];
    $tf=$a['img'];
    
 }

 
    $sql="INSERT INTO archive_coaches
    VALUES('$c','$p','$n',$pr,$rsc,'$x','$v',$cd,$tarif,'$tp','$tf','$file');";
    mysqli_query($connexion,$sql);
    
    $sql1="DELETE FROM demandes WHERE cin='$id';";
    if(mysqli_query($connexion,$sql1)){
        http_response_code(201);
    }else{
        http_response_code(404);
    }