<?php
include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['userId'])) {
            $userId = $_GET['userId'];

            $result = $conn->query("SELECT p.id, p.model, p.price, p.image 
                                FROM product p 
                                JOIN vedor_product vp ON vp.product_id = p.id 
                                WHERE vp.user_id = $userId");
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            echo json_encode($products);

        } else {
            $result = $conn->query("SELECT * FROM product");
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            include 'procesare.php';

        }
        break;

    case 'POST':
        $idUser = $_POST['userId'];
        $model = isset($_POST['model']) ? $_POST['model'] : null;
        $price = isset($_POST['price']) ? $_POST['price'] : null;
        $image = isset($_POST['image']) ? $_POST['image'] : null;
        $isError = false;
        $idProduct = 0;

        if (!isset($model, $price)) {
            $error_message = json_encode(["error" => "Missing input data"]);
            $isError = true;
        } else {
            try {
                $stmt = $conn->prepare("INSERT INTO product (model, price, image) VALUES (?, ?, ?)");
                $stmt->bind_param("sds", $model, $price, $image); // s = string, d = double

                if (!$stmt->execute()) {
                    $error_message = json_encode(["error" => $stmt->error]);
                    $isError = true;
                }

                $idProduct = $stmt->insert_id;
                $stmt->close();
            } catch (Exception $ex) {
                $error_message = json_encode(["error" => $ex->getMessage()]);
                $isError = true;
            }
        }
        if (!isset($idUser, $idProduct)) {
            $error_message = json_encode(["error" => "Missing input data"]);
            $isError = true;
        } else {
            try {
                $result = $conn->query("INSERT INTO vendor_product (user_id, product_id)
                                     VALUES ('$idUser', '$idProduct')");
            } catch (Exception $ex) {
                $error_message = json_encode(["error" => $ex->getMessage()]);
                $isError = true;
            }
        }
        include 'procesare.php';
        break;

    case
    'PUT':
        $id = $_GET['id'];
        $model = isset($_POST['model']) ? $_POST['model'] : null;
        $price = isset($_POST['price']) ? $_POST['price'] : null;
        $image = isset($_POST['image']) ? $_POST['image'] : null;
        $isError = false;
        $idProduct = 0;

        if (!isset($model, $price)) {
            $error_message = json_encode(["error" => "Missing input data"]);
            $isError = true;
        } else {
            try {
                $stmt = $conn->prepare("UPDATE product SET model = ?, price = ?, image = ? WHERE id = ?");
                $stmt->bind_param("sds", $model, $price, $image, $id); // s = string, d = double

                if (!$stmt->execute()) {
                    $error_message = json_encode(["error" => $stmt->error]);
                    $isError = true;
                }

                $idProduct = $stmt->insert_id;
                $stmt->close();
            } catch (Exception $ex) {
                $error_message = json_encode(["error" => $ex->getMessage()]);
                $isError = true;
            }
        }

        include 'procesare.php';
        break;


    case 'DELETE':
        $id = $_GET['id'];
        $conn->query("DELETE FROM vendor_product WHERE product_id=$id");
        $conn->query("DELETE FROM product WHERE id=$id");
        break;

    default:
        $error_message = json_encode(["message" => "Invalid request method"]);
        break;
}

$conn->close();
?>

