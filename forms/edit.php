<?php 
require_once 'DBBlackbox.php';

$data = [];
$parts = parse_url($_SERVER['REQUEST_URI']);
$id = null;
$videogame = [];
$updateUrl = false;


if(isset($parts['query'])) {
$query = $parts['query'];
parse_str($query, $data);
$id = $data['id'];
}

if(!$_POST){
    if($id) {
        $videogame = find($id); 
    }  
} else {
        $videogame = $_POST;
        if(!isset($videogame['is_released'])){
            $videogame['is_released'] = '';}

            if($id) {
            update($id, $videogame);
            echo 'A videogame id='.$id . ' has been updated';
            echo '<a href="list.php"> Go to list </a>';

            } else {
                //$videogame = $_POST;
                $id = insert($videogame);
                echo 'A new videogame has been inserted with id ' . $id;
                echo '<a href="list.php"> Go to list </a>';

                $updateUrl = true;

                //$query_data = ['id' => $id];
                //$query_string = http_build_query($query_data);
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videogames page</title>
    <link rel="stylesheet" href="style.css">
    <?php
    if($updateUrl){
        echo "
            <script type=\"text/javascript\">
            window.history.pushState('object or string', 'Title', window.location.href + " . $id . ")
            </script>
        ";
     }
  ?>
</head>

<body>

    <form <?php echo 'action="edit.php?id=' .$id.'"'?> method="post">
        <div>
            <label for="name">Game</label>
            <input type="text" name="name" value="<?php 
                echo isset($videogame['name'])?
                $videogame['name']:
                ''
                ?>">
        </div>
        <div>
            <label for="studio">Studio</label>
            <input type="text" name="studio" value="<?php 
        echo isset($videogame['studio'])?
        $videogame['studio']:
        ''
        ?>">
        </div>
        <div>
            <label for="year">Year of release</label>
            <input type="text" name="year" value="<?php 
        echo isset($videogame['year'])?
        $videogame['year']:        
        ''
        ?>">
        </div>
        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" value="<?php 
        echo isset($videogame['genre'])?$videogame['genre']:''?>">
        </div>
        <div class="checkbox_container">
            <label for="is_released">Released</label>
            <input type="checkbox" name="is_released" <?php echo ((isset($videogame['is_released'])) &&
                ($videogame['is_released']==='on' )) ? 
                'checked' : 
                '' ?>>
        </div>
        <div>
            <label for="rating">Rating</label>
            <input type="text" name="rating" value="<?php 
                echo isset($videogame['rating'])?
        $videogame['rating']:
        ''
        ?>">
        <div class="button_container">
        <input  class="add submit_button" type="submit" value="Submit">
        </div>
    </form>
</body>

</html>