<?php
header('Content-Type: application/json');
$pdo = new PDO('mysql:host=localhost;dbname=todoDB', 'root', 'root');
$title = trim($_GET['title'] ?? '');

if(strlen($title) == 0) {
    echo json_encode(["ok" => false]);
} else {
    $statement = $pdo->prepare("UPDATE todo,SET title=?, WHERE  id = ?");
    $ok = $statement->execute([$title, $id]);
    echo json_encode(["ok" => $ok]);
}