<?php
// DATABASE CONNECTION
$servername = "localhost:3307"; // Usually localhost
$username = "root";        // XAMPP default user
$password_db = "";         // XAMPP default password is empty
$dbname = "gmu";       // Change to your DB name

$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<div style='color:red;'>Database connection failed: " . $conn->connect_error . "</div>");
}

// HANDLE FORM SUBMIT
$response = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($name) || empty($email) || empty($password)) {
        $response = "<div class='error'>All fields are required</div>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt->execute()) {
            $response = "<div class='success'>User added successfully!</div>";
        } else {
            $response = "<div class='error'>Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background-color: #45a049; }
        .success {
            background-color: #dff0d8;
            border: 1px solid #d6e9c6;
            color: #3c763d;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
        .error {
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            color: #a94442;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2>Add New User</h2>
<?php if (!empty($response)) echo $response; ?>

<form method="POST">
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit">Add User</button>
</form>

</body>
</html>
