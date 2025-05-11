<?php
include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM user WHERE id=$id");
            $data = $result->fetch_assoc();
            json_encode($data);
        } elseif (isset($_GET['username']) and isset($_GET['password'])) {
            $username = $_GET['username'];
            $password = $_GET['password'];
            $result = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
            $data = $result->fetch_assoc();
            //  if ( $data.type === "magazin") {
            //      include 'procesare.php';
            //  } else {
            //       include 'motociclete.php';
            //   }
        } else {
            $result = $conn->query("SELECT * FROM user");
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            if ($type === "magazin") {
                include 'procesare.php';
            } else {
                include 'motociclete.php';
            }
        }
        break;

    case 'POST':
        $isChangePassword = isset($_POST['$isChangePassword']) ? $_POST['$isChangePassword'] : null;
        $isLogin = isset($_POST['isLogin']) ? $_POST['isLogin'] : null;
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        $address = isset($_POST['address']) ? $_POST['address'] : null;
        $isError = false;

        if (isset($isChangePassword) and $isChangePassword === 'true') {
            $password = $_POST['password'];
            $userId = $_POST['userId'];;
            if (isset($userId) and isset($_POST['password'])) {
                $stmt = $conn->prepare("UPDATE user SET password=? WHERE id=?");
                $stmt->bind_param("si", $password, $userId);
                $stmt->execute();

            } else {
                $error_message = json_encode(["error" => "Missing required fields or user not logged in"]);
            }
            include 'index.php';
            break;
        }
        if (isset($isLogin) and $isLogin === 'false') {
            if (!isset($username, $password, $type)) {
                $error_message = json_encode(["error" => "Missing input data"]);
                $isError = true;
            } else {
                try {
                    $result = $conn->query("INSERT INTO user (username, password, phone, type, address)
                                     VALUES ('$username', '$password', '$phone', '$type', '$address')");
                    $current_userId = $conn->insert_id;
                } catch (Exception $ex) {
                    $error_message = json_encode(["error" => $ex->getMessage()]);
                    $isError = true;
                }
            }
        } else if (isset($isLogin) and $isLogin === 'true') {
            try {
                $result = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $type = $row['type'];
                            $current_userId = $row['id']; // or whatever your column name is

                        }
                    } else {
                        $error_message = json_encode(["error" => "Invalid username or password"]);
                        $isError = true;
                    }
                }
            } catch (Exception $ex) {
                $error_message = json_encode(["error" => $ex->getMessage()]);
                $isError = true;
            }
        }

        if ($isError === true) {
            if (isset($isLogin) and $isLogin === 'false') {
                include 'inregistrare.php';
            } else if (isset($isLogin) and $isLogin === 'true') {
                include 'autentificare.php';
            }
            break;
        }

        if ($type === "magazin") {
            include 'procesare.php';
        } else {
            include 'motociclete.php';
        }

        break;

    case 'DELETE':
        $id = $_GET['id'];
        $conn->query("DELETE FROM user WHERE id=$id");
        $error_message = json_encode(["message" => "User deleted successfully"]);
        break;

    default:
        $error_message = json_encode(["message" => "Invalid request method"]);
        break;
}

$conn->close();
?>

