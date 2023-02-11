<?php
include_once "./includes/DB.php" ;
session_start() ;

if (isset($_SESSION['user_id'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script defer src="js/all.min.js"></script>
    <script defer src="js/main.js"></script>
    <script defer src="js/home.js"></script>
</head>
<body>
    <div class="app">
        <div class="sticky">
            <div class="header">
                <h3>WhatsApp</h3>
                <div class="icons">
                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                    <span><i class="fa-solid fa-ellipsis-vertical"></i></span>
                </div>
            </div>
            <ul class="tabs">
                    <li class="active">chats</li>
                    <li>status</li>
                    <li>calls</li>
            </ul>
        </div>
        <div class="message-container">
            
        </div>
        </div>
    </div>
</body>
</html>
<?php
}
else {
    header('Location:index.html') ;
}