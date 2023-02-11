<?php
include_once "./includes/DB.php" ;
session_start() ;

if (isset($_SESSION['user_id'])) {


        $message_from = intval($_SESSION['user_id']) ;
        $message = $_POST['message'] ;
        $message_to = $_POST['message_to'] ;
        if (!empty($message)){
        $query = $conn->prepare("INSERT INTO `message`(`message_id`, `message_content`, `message_from`, `message_to`) VALUES (NULL,'$message','$message_from','$message_to') ") ;
        $query->execute() ;
        $count = $query->rowCount() ;
        }
}
?>


