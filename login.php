<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css"> <!-- ✅ moved inside head -->
</head>
<body class="w3-container">

<h2 class="w3-center">User Login</h2>
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
        <button class="w3-button w3-blue" type="submit" name="login">Login</button>
    </p>
</form>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: vote.php");
            exit(); // ✅ important
        } else {
            echo "<p class='w3-text-red'>Invalid password.</p>";
        }
    } else {
        echo "<p class='w3-text-red'>User not found.</p>";
    }
}
?>
</body>
</html>

