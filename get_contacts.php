<?php
require_once 'db_connection.php';

// Ensure proper error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Prepare and execute the SELECT statement
    $sql = "SELECT * FROM contacts ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Fetch all contacts
    $contacts = [];
    while ($row = $result->fetch_assoc()) {
        $contacts[] = $row;
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($contacts);
} catch (Exception $e) {
    // Handle any errors
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    // Close the statement and connection
    if (isset($stmt)) $stmt->close();
    if (isset($conn)) $conn->close();
}