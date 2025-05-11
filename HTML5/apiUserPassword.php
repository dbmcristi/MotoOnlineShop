<?php
include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case
    'POST':
        $password = $_POST['password'];
        $userId = $_POST['userId'];;
        if (isset($userId)  and isset($_POST['password'])) {
            $stmt = $conn->prepare("UPDATE user SET password=? WHERE id=?");
            $stmt->bind_param("si", $password, $userId);
            $stmt->execute();

        } else {
            $error_message = json_encode(["error" => "Missing required fields or user not logged in"]);
        }
        include 'index.php';
        break;
    default:
        $error_message = json_encode(["message" => "Invalid request method"]);
        break;
}

$conn->close();
?>

