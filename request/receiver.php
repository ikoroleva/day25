<h1>Receiver</h1>

<?php 

//var_dump($_SERVER['REQUEST_URI']);

// $query = parse_url($_SERVER['REQUEST_URI'])['query'];
// echo $query;
// echo '<br>';

// parse_str($query, $data);
// var_dump($data);
// echo '<br>';

// $rebuilt_query = http_build_query($data);
// var_dump($rebuilt_query);
// echo '<br>';

// echo json_encode($data);


// die();

session_start();

if(isset($_SESSION['post_counter'])){
    $_SESSION['post_counter'] = $_SESSION['post_counter'] + 1;
} else {
    $_SESSION['post_counter'] = 1;
}


// if($_SESSION['post_counter']>=5) {
//     unset($_SESSION['post_counter']);
// }

//echo 'Session: ';
//var_dump($_SESSION);
//echo '<br>';

//$_SESSION['someinfo'] = 'value';
if(!isset($POST['was_good'])){
    $_SESSION['flashed-messages'] = ['errors' => ['was_good' => "Umm, excuse me? WHAT?"]];
    header('Location: form.php');
    exit();
}

$post_counter = $_SESSION['post_counter'];
echo "<h3>Saving form data for the {$post_counter}th time</h3>";
header('Location: status.php');

die();

var_dump($_GET);
echo '<br>';
var_dump($_POST);
echo '<br>';

// echo $_GET['lunch'];
//echo '<br>';

$lunch_isset = isset($_GET['lunch']);
$lunch_empty = empty($_GET['lunch']);

$was_good_isset = isset($_GET['was_good']);
$was_good_empty = empty($_GET['was_good']);

var_dump($lunch_isset);
echo '<br>';

var_dump($lunch_empty);
echo '<br>';

var_dump($was_good_isset);
echo '<br>';

var_dump($was_good_isset);
echo '<br>';

$lunch =  $_GET['lunch'];

$whatever = $_GET['whatever'] ?? "I don't know";

var_dump($whatever)


// echo '<br>';
// echo $_GET['was_good'];

?>