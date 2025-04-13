<?php
// submit_contact_form.php

// Show PHP errors (for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database credentials
    $host = "localhost";
    $user = "root";
    $pass = "golu@222122"; // your DB password
    $dbname = "codex_container";

    // Get POST values safely
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // DB Connection
    $conn = new mysqli($host, $user, $pass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert into the correct table: contact_form
    $sql = "INSERT INTO contact_form (name, email, subject, message) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Thanks for contacting! I will reach out to you shortly.'); window.location.href='contact.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
