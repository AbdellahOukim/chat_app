<?php
include_once "./includes/DB.php" ;
session_start() ;

if (isset($_SESSION['user_id'])) {
$id = intval($_GET['to']) ;

$query = $conn->prepare("SELECT * FROM users WHERE user_id = $id ") ;
$query->execute() ;

$row = $query->fetch() ;

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
    <script defer src="js/message.js"></script>
</head>
<body>
    <div class="app">
        <div class="sticky">
            <div class="header">
                <div class="profile">
                    <img src="images/<?php echo $row['user_image'] ?>">
                   <h3><?php echo $row['user_fname'] ?></h3> 
                </div>
                <div class="icons">
                    <span><i class="fa-solid fa-video"></i></span>
                    <span><i class="fa-solid fa-phone"></i></span>
                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
            </div>
        </div>
        <div class="discusion">
            
        </div>
        <form method="post" action="send.php" class="message-area">
            <input type="hidden" name="message_to" value="<?php echo $_GET['to']  ?>">
            <div class="message-input">
                <span><i class="fa-solid fa-face-smile"></i></span>
                <input type="text" id="message_input" name="message" placeholder="Message" autocomplete="off" >
                <span><i class="fa-solid fa-paperclip"></i></span>
                <span><i class="fa-solid fa-camera"></i></span>
            </div>
            <button type="submit" id="send" class="send-area">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </div>
</body>
</html>
<?php
}
else {
    header('Location:index.html') ;
}