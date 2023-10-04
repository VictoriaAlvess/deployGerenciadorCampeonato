<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
        // Handle user update request
        // Example: updateUser($_POST['id'], $_POST['username'], $_POST['email'], $_POST['password']);
    } elseif (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
        // Handle user deletion request
        // Example: deleteUser($_POST['id']);
    } else {
        // Handle user creation request
        // Example: createUser($_POST['username'], $_POST['email'], $_POST['password']);
    }
}

// Database connection and user functions
// Implement the createUser, updateUser, and deleteUser functions here

// Sample function for creating a user (replace with actual implementation)
function createUser($username, $email, $password) {
    // Connect to the database (you'll need to provide the DB connection details)
    $conn = new mysqli("hostname", "username", "password", "database_name");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize inputs and insert data into the database
    $username = $conn->real_escape_string($username);
    $email = $conn->real_escape_string($email);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

// Sample function for updating a user (replace with actual implementation)
function updateUser($id, $username, $email, $password) {
    // Connect to the database and perform the update
}

// Sample function for deleting a user (replace with actual implementation)
function deleteUser($id) {
    // Connect to the database and perform the delete
}
?>
