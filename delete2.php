<?php
 require "cnx.php";
 $id=$_GET['id'];
 $sql="DELETE FROM annonces WHERE ID_A=$id;";
 if(mysqli_query($connexion,$sql)){
     http_response_code(201);
 }else{
     http_response_code(404);
 }
