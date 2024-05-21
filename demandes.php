<?php
require "cnx.php";
$sql='SELECT COUNT(*) AS `count` FROM demandes ;';
$res=mysqli_query($connexion,$sql);
$res=mysqli_fetch_all($res,MYSQLI_ASSOC);
echo $json=json_encode($res[0]['count']);
exit;