<?php

session_start();
require_once 'classes/dbh.classes.php';

if (!isset($_SESSION['id'])) {
    http_response_code(403);
    echo 'Unauthorized';
    exit;
}

$user_id = $_SESSION['id'];

$db = new dbh();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT id, title, start, end FROM events WHERE user_id = ?");
$stmt->execute([$user_id]);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($events);
