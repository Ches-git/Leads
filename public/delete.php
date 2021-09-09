<?php
header('Content-Type: application/json');
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$id = intval($_GET['id'] ?? 0);
$statement = $pdo->prepare("DELETE FROM todo WHERE id = ?");
$ok = $statement->execute([$id]);
echo json_encode(["ok" => $ok]);