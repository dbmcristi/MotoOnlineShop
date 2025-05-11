<?php
//
if (function_exists('curl_init')) {
    echo "cURL is enabled!";
} else {
    echo "cURL is not enabled.";
}
$name = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$headers = [
    'Content-Type: application/json'
];
//$data = array('postvar1' => 'value1');

// set post fields
$data = [
    'username' => $name,
    'password' => $password,
    'type'   => $type,
    'phone'    => $phone,
    'address'  => $address
];
$json_data = json_encode($data);

$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_URL, 'http://localhost:8000/apiUser.php');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

// execute!
$response = curl_exec($curl);

// Verifică erorile
if(curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    echo "Răspunsul serverului: " . $response;
}

// close the connection, release resources used
curl_close($curl);

// do anything you want with your response
echo($response);

if (isset($_POST['type']) && $_POST['type'] === "magazin") {
    include 'procesare.php';
} else {
    include 'motociclete.php';
}
?>