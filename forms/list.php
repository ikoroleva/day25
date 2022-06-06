<?php

require_once 'DBBlackbox.php';

$limit = 5;

$total = count(select());
$pages = ceil($total / $limit);



if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (int) $_GET['page'];
    $offset = ($page - 1)  * $limit;
    $items = select($limit, $offset);
    

 } else {
    $page = 1;
    $items = select(5);
 } 
 // if current page is greater than total pages...
 if ($page > $pages) {
    $page = $pages;
    $offset = ($page - 1)  * $limit;
    $items = select($limit, $offset);
 } 
 // if current page is less than first page...
 if ($page < 1) {
    $page = 1;
    $items = select(5);
 } 

 
// The "back" link
$prevlink = ($page > 1) ?
'<a href="?page=1">&laquo;</a>
 <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : 
 '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

// The "forward" link
// $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';


var_dump($page);


// var_dump($_GET);
// $items = select();





if (isset($_GET['delete'])) {
    delete($_GET['id']);
    header('Location: list.php');
    
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videogames page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Videogames List</h1>
<div class="list_act_container">
<a href="edit.php" class="add">
    <span class="add_img"></span>
    <p>Add a new game</p>
</a>
</div>
<div class="table_info">Showing page <?php echo $page . ' of '.$pages ?></div>


<table class="table">
    <tr>
        <th>No</th>
        <th>Game</th>
        <th>Studio</th>
        <th>Year of release</th>
        <th>Genre</th>
        <th>Released</th>
        <th>Rating</th>
        <th>Actions</th>
    </tr>
<?php foreach($items as $index => $item) :?>
    <tr>
        <td><?php echo $item['id']?></td>
        <td><?php echo $item['name']?></td>
        <td><?php echo $item['studio']?></td>
        <td><?php echo $item['year']?></td>
        <td><?php echo $item['genre']?></td>
        <td><?php 

        if($item['is_released'] === 'on'){
            echo '&#9989';}
            else {
                echo '&#10060';} 
        
        
        ?></td>
        <td><?php echo $item['rating']?></td>
        <td>
        <div class="act_container">
            <a class="edit" href="<?php echo 'edit.php?id='.$item['id'].''?>">
                <span class="edit_img"></span>
            </a>
            <a class="delete" href="<?php echo '?delete&id='.$item['id']?>">
                <span class="delete_img"></span>
            </a>
        </div>
    
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">

<a class="table_pager">&laquo; Previous</a>
<?php for ($i = 1; $i <= $pages; $i++) {
    echo '<a class="table_pager" href="?page=' . $i .'">' . $i. '</a>';
} ?>
<a class="table_pager">Next &raquo;</a>
</div>


</body>
</html>