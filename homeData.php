<?php
include_once "./includes/DB.php" ;
session_start() ;


$id = intval($_SESSION['user_id']) ;

$query = $conn->prepare("SELECT * FROM users WHERE user_id <> $id ") ;
$query->execute() ;

$rows = $query->fetchAll() ;

$data = "" ;




foreach($rows as $row) :

    $id = intval($_SESSION['user_id']) ;
    $query_last_message = $conn->prepare("SELECT * FROM message WHERE message_from = $id  AND message_to = $row[user_id]
    OR message_from = $row[user_id]  AND message_to = $id ORDER BY message_id DESC LIMIT 1 ") ;
    $query_last_message->execute() ;
    $result = $query_last_message->fetch() ;
    $last_message = isset($result['message_content']) ? $result['message_content'] : ""  ;

    $data .= "
    <div class=\"chat\">
        <img src=\"images/$row[user_image]\" alt=\"profile\">
        <a href=\"chat.php?to=$row[user_id]\" class=\"info\">
            <h4>$row[user_fname] $row[user_lname]</h4>
            <p>$last_message</p>
        </a>
    </div>
    " ;


endforeach ;
echo $data ;
?>
