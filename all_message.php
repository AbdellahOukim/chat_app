<?php
    include_once "./includes/DB.php" ;
    session_start() ;
    $message_to = $_POST['message_to'] ;
    $message_from = intval($_SESSION['user_id']) ;
    $results = "" ;
    $query_1 = $conn->prepare("SELECT * FROM message WHERE message_from = $message_from AND message_to = $message_to 
                            OR message_from = $message_to   AND message_to = $message_from ORDER BY message_id ASC ") ;
    $query_1->execute() ;
    $count_1 = $query_1->rowCount() ;
    $rows = $query_1->fetchAll() ;
    
    foreach($rows as $row) :
        $class = $row['message_from'] === $message_to ? 'receive' : 'send' ;
        $results .= "<div class=\"$class\">$row[message_content]</div> " ;
    endforeach ;
    echo $results ;

?>