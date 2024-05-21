<?php
require "cnx.php";
$id=$_GET['id'];
$sql='SELECT * FROM client WHERE cin='.$id.';';
$res=mysqli_query($connexion,$sql);
$res=mysqli_fetch_all($res,MYSQLI_ASSOC);

echo $json=json_encode($res);
exit;