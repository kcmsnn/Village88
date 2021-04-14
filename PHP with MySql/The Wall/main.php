<?php
include('process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>The Wall</title>
</head>
<body>
    <div class="container">
        <div class="header">
        <h2>CodingDojo Wall</h2>
        <h3>Welcome <?=$_SESSION['first_name']?>!</h3>
        <a href="index.php">Log off</a>
        </div>
        <div class="content">
            <div class="post_message">
                <h2>Post a Message!</h2>
                <form action="process.php" method='post'>
                    <input type="hidden" name="action" value="post_message">
                    <textarea name="message" id="message_area"></textarea>
                    <input type="submit" value="post message" name="submit" id="message">
                </form>
            </div>
            <div class="display_message">    
<?php
            $message_query = "SELECT wall_messages.messages_id, CONCAT(users.first_name,' ',users.last_name) AS Name, wall_messages.message, wall_messages.created_at FROM wall_messages 
                            INNER JOIN users ON wall_messages.user_id = users.user_id";
            $message_rows = fetch_all($message_query);
            if (!empty($message_rows) ) {
                foreach ($message_rows as $rows) { 
                    $message_id = $rows['messages_id'];
                    $_SESSION['message_id'] = $rows['messages_id'];
                    $time = strtotime($rows['created_at']);
                    $myFormatForView = date("F d Y ", $time);?>
                    <section class="message">
                        <h2><?= $rows['Name'] . ' - ' . $myFormatForView . $_SESSION['message_id'] ?> </h2>
                        <p><?= $rows['message'];?></p>    
                    </section> 
                    <section class ="comment">                    
                        <h2>Comments:</h2>    
<?php
                        $comment_query = "SELECT comments.messages_id, CONCAT(users.first_name,' ',users.last_name) AS Name, comments.comment, comments.created_at FROM comments
                                        INNER JOIN users ON comments.users_id = users.user_id
                                        WHERE messages_id = '$message_id';";
                        $comment_rows = fetch_all($comment_query);
                        if (!empty($comment_rows) ) {
                            foreach ($comment_rows as $rows) { 
                                $time = strtotime($rows['created_at']);
                                $myFormatForView = date("F d Y ", $time);?>
                                <h3><?= $rows['Name'] . ' - ' . $myFormatForView?></h2>
                                <p><?= $rows['comment'];?></p>                 
<?php                       } ?>
<?php                   } ?>
                                <h3>Post a Comment:</h3>
                                <form action="process.php" method='post'>
                                    <input type="hidden" name="action" value="post_comment">
                                    <input type="hidden" name="message_id" value="<?= $message_id;?>">
                                    <textarea name="comment" id="comment_area"></textarea>
                                    <input type="submit" value="comment" name="submit" id="comment">
                                </form>                                   
                    </section>                    
<?php           } ?>
<?php       } ?>
            </div>
        </div>
    </div>
</body>
</html>