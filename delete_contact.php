<?php

require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM contacts WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Contact deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error deleting contact"]);
    }

    $stmt->close();
    $conn->close();
}