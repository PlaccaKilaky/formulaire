<?php 

//session_start();
$host='localhost';
$db='placca';
$user='root';
$pass='';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=placca', $user, $pass);
    echo "";
} catch ( PDOException $e) {
    die($e->getmessage());
}

?>
