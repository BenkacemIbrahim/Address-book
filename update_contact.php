<?php

require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE contacts SET name=?, phone=?, email=?, address=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $phone, $email, $address, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Contact updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error updating contact"]);
    }

    $stmt->close();
    $conn->close();
}