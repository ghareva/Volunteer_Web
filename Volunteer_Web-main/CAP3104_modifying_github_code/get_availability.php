<?php
require_once 'classes/dbh.classes.php'; // make sure this is the correct path
session_start();
$userId = $_SESSION['id'];

$db = new dbh();
$conn = $db->getConnection();

$stmt = $conn->prepare("
    SELECT day_of_week, TIME_FORMAT(time_block, '%H:%i') AS time_block
    FROM availability
    WHERE user_id = :user_id AND available = 1
");

$stmt->execute([':user_id' => $userId]);
$availability = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($availability);