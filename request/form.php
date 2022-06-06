<h1>Receiver</h1>
<?php

session_start(); 
$_SESSION['post_counter'] = 0;

$was_good_error = '';

if(isset($_SESSION['flashed-messages']['errors']['was_good'])) {
    $was_good_error = $_SESSION['flashed-messages']['errors']['was_good'];
    unset($_SESSION['flashed-messages']['errors']['was_good']);
}

echo 'Session: ';
var_dump($_SESSION);
echo '<br>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver</title>
</head>
<body>

    <form action="receiver.php?limit=5" method='post'>
        Lunch: <input type="text" name="lunch"><br>
        Was it good (optional): <input type="checkbox" name="was_good">
        <button type="submit">Submit form</button>
        <p><?php echo $was_good_error ?></p>
    </form>
    
</body>
</html>