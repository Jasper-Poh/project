<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("localhost", "root", "", "myform");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $shopName = trim($_POST['shopName']);
    $address = trim($_POST['address']);
    $phoneNumber = trim($_POST['phoneNumber']);
    $date = trim($_POST['date']);
    $month = trim($_POST['month']);
    $year = trim($_POST['year']);

    $stmt = $conn->prepare("INSERT INTO myForm (shopName, address, phoneNumber, date, month, year) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $shopName, $address, $phoneNumber, $date, $month, $year);

    if ($stmt->execute()) {
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405);
    echo "405 Method Not Allowed";
}
?>