<?php
require "cnx.php";
$x=$_GET['id'];
$sql="SELECT * FROM annonces WHERE proprio=$x AND detail='En Cours';";
if($res=mysqli_query($connexion,$sql))
    {
    $res=mysqli_fetch_all($res,MYSQLI_ASSOC);
    echo json_encode($res);
}else{
    http_response_code(404);
}
?>