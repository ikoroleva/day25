<?php 
$user_is_admin = true; 
$banned_users = ['John Smith', 'Clearly Fake Account', 'Spambot'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<ul class="menu">
    <li><a href="#">Home</a></li>
    <li><a href="#">Eshop</a></li>
    <li><a href="#">Contact</a></li>


    <?php if($user_is_admin) :?> 
        <li><a href="#">Link just for administrators</a></li>
        <li><a href="#">Another link just for administrators</a></li>
        
        <?php //else:?>
             <!-- <h1>Get outta here</h1> -->
        <?php endif; ?>

        <!-- <h3>Banned Users:</h3>
        <ul> -->
            <?php //foreach($banned_users as $banned_user) :?>
                <!-- <li><?php //echo $banned_user ?></li> -->
            <?php //endforeach; ?>
        </ul>

</body>
</html>