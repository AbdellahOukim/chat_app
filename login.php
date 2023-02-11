<?php
include_once "./includes/DB.php" ;
session_start() ;
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;
    if (!empty($email) && !empty($password)) :
        $query = $conn->prepare("SELECT * FROM users WHERE user_email = '{$email}'
                                AND user_password = '{$password}'") ;
        $query->execute() ;
        $count = $query->rowCount() ;
        if ($count > 0) {
            $result = $query->fetch() ;
            $_SESSION['user_id'] = $result['user_id'] ;
            echo "success" ;
        } else {
            echo "Email or password wrong !" ;
        }
    endif ;

?>