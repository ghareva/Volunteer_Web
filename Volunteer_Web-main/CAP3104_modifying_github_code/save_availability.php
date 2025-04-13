<?php
require_once 'classes/dbh.classes.php'; // make sure this is the correct path
session_start();
$userId = $_SESSION['id'];

if (!$userId) {
    http_response_code(401);
    echo "User not logged in.";
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['availability'])) {
    http_response_code(400);
    echo "No availability data provided.";
    exit;
}

$db = new dbh();
$conn = $db->getConnection();

$conn->prepare("DELETE FROM availability WHERE user_id = :user_id")
    ->execute([':user_id' => $userId]);

$stmt = $conn->prepare("
    INSERT INTO availability (user_id, day_of_week, time_block, available)
    VALUES (:user_id, :day_of_week, :time_block, 1)
    ON DUPLICATE KEY UPDATE available = 1
");

foreach ($data['availability'] as $slot) {
    $stmt->execute([
        ':user_id' => $userId,
        ':day_of_week' => $slot['day'],
        ':time_block' => $slot['time']
    ]);
}

echo "Availability saved successfully.";