<?php
require "cnx.php";
$sql="SELECT * FROM annonces WHERE detail='En Cours'";
if($res=mysqli_query($connexion,$sql))
    {
    $res=mysqli_fetch_all($res,MYSQLI_ASSOC);
    echo json_encode($res);
}else{
    http_response_code(404);
}
?>