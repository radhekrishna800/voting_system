<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">

<h2 class="w3-center">User Registration</h2>
<form class="w3-container w3-card-4" method="POST">
    <p>
        <label>Username</label>
        <input class="w3-input" type="text" name="username" required>
    </p>
    <p>
        <label>Password</label>
        <input class="w3-input" type="password" name="password" required>
    </p>
    <p>
        <button class="w3-button w3-green" type="submit" name="register">Register</button>
    </p>
</form>

<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='w3-text-green'>Registration successful! <a href='login.php'>Login here</a></p>";
    } else {
        echo "<p class='w3-text-red'>Error: " . $conn->error . "</p>";
    }
}
?>
</body>
</html>
