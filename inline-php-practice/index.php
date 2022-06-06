<?php 
$title = 'Inline PHP practice';
$vehicles = [
    'Bicycle' => 50,
    'Car' => 150,
    'Train' => 110
];

$messages = [
    'Preparing to do some stuff...',
    'Doing amazing stuff...',
    'Stuff is done.'
];

$messages = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?php echo $title; ?></h1>

    <table>
    <tr>
        <th>Means of transport</th>
        <th>Max. speed (km/h)</th>
    <tr>
    <!-- <tr> -->
    <?php foreach($vehicles as $vehicle => $speed) :?>
    <tr>
        <td><?php echo $vehicle?></td>
        <td><?php echo $speed?></td>
    </tr>
    <?php endforeach; ?>
    <!-- </tr> -->
</table>

<?php if ($messages === true) : ?>
    <ul class="messages" style="padding: 1em; border: 1px solid black; margin: 1em;">
<?php foreach($messages as $message) :?>
    <li><?php echo $message?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>


    
</body>
</html>