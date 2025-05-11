<?php
include 'db.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM user WHERE id=$id");
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } elseif (isset($_GET['username']) and isset($_GET['password'])) {
            $username = $_GET['username'];
            $password = $_GET['password'];
            $result = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            $result = $conn->query("SELECT * FROM user");
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        }
        break;

    case 'POST':
        $name = $_POST['username'];
        $password = $_POST['password'];
        $type = $_POST['type'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if (!isset($name, $password, $type,  $phone ,  $address)) {
            echo json_encode(["error" => "Missing input data"]);
            exit;
        }
        $conn->query("INSERT INTO user (username, password, phone, type, address) VALUES ('$name', '$password', '$phone', '$type', '$address') ");
        echo json_encode(["message" => "User created successfully"]);
        break;

    case 'PUT':
        $id = $_GET['id'];
        $password = $input['password'];
        $type = $input['type'];
        $phone = $input['phone'];
        $address = $input['address'];

        $conn->query("UPDATE user SET password='$password',
                type='$type', phone='$phone', address='$address' WHERE id=$id");
        echo json_encode(["message" => "User updated successfully"]);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $conn->query("DELETE FROM user WHERE id=$id");
        echo json_encode(["message" => "User deleted successfully"]);
        break;

    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

$conn->close();
?>