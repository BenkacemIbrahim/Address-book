<?php
require_once 'db_connection.php';

// Ensure proper error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Sanitize input
        $name = trim($_POST['name']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $address = trim($_POST['address']);

        // Prepare and execute the INSERT statement
        $sql = "INSERT INTO contacts (name, phone, email, address) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $phone, $email, $address);
        
        $success = $stmt->execute();
        
        // Return JSON response
        header('Content-Type: application/json');
        if ($success) {
            echo json_encode([
                "success" => true,
                "message" => "Contact added successfully",
                "id" => $conn->insert_id
            ]);
        } else {
            throw new Exception("Failed to add contact");
        }
    } catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode([
            "success" => false,
            "message" => $e->getMessage()
        ]);
    } finally {
        // Close the statement and connection
        if (isset($stmt)) $stmt->close();
        if (isset($conn)) $conn->close();
    }
}