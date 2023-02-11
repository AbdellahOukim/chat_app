<?php
$dsn = "mysql:host=localhost;dbname=chat_app" ;
$user = "root" ;
$pass = "" ;

try {
    $conn = new PDO($dsn , $user , $pass) ;
    // echo "connected !!";
}
catch(PDOException $e) {
    echo "failed !!" . $e->getMesaage() ;
}