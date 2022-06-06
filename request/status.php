<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    var_dump($_SESSION);

    if(isset($_SESSION['flashed-messages']) && isset($_SESSION['flashed-messages']['was-good'])){
        $apology = $_SESSION['flashed-messages']['was_good'];
        $_SESSION['flashed-messages'] = [];
    } else {
        $apology = '';
    }
    ?>
    <h1>You have successfully submitted the form</h1>

    <h3><?=$apology?></h3>
</body>
</html>