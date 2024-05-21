<?php
 require "cnx.php";
 $id=$_GET['id'];
 $sql="DELETE FROM client WHERE cin='$id';";
 if(mysqli_query($connexion,$sql)){
     http_response_code(201);
 }else{
     http_response_code(404);
 }
