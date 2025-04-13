<?php

session_start();
require_once 'classes/dbh.classes.php';

if (!isset($_SESSION['id'])) {
    http_response_code(403);
    echo 'Unauthorized';
    exit;
}

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$user_id = $_SESSION['id'];

$db = new dbh();
$conn = $db->getConnection();

$stmt = $conn->prepare("INSERT INTO events (user_id, title, start, end) VALUES (?, ?, ?, ?)");
$stmt->execute([$user_id, $title, $start, $end]);

echo 'success';