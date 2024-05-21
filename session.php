<?php
session_start();
if(isset($_SESSION['log'])){
    json_encode($_SESSION['log']);
    http_response_code(201);
}else{
    http_response_code(405);
}