<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user = $conn->query("SELECT * FROM users WHERE id=$user_id")->fetch_assoc();

// If user already voted, block access
if ($user['voted'] == 1) {
    echo "<h3 class='w3-text-red w3-center'>You have already voted! <a href='results.php'>View Results</a></h3>";
    exit();
}

// Handle vote submission
if (isset($_POST['vote'])) {
    $candidate_id = $_POST['candidate'];

    // Update candidate votes
    $conn->query("UPDATE candidates SET votes = votes + 1 WHERE id = $candidate_id");

    // Mark user as voted
    $conn->query("UPDATE users SET voted = 1 WHERE id = $user_id");

    echo "<h3 class='w3-text-green w3-center'>Vote submitted successfully! <a href='results.php'>View Results</a></h3>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vote</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css"> <!-- your custom styles -->
</head>
<body class="w3-container">

<h2 class="w3-center">Vote for Your Candidate</h2>
<form class="w3-container w3-card-4" method="POST">
    <?php
    $candidates = $conn->query("SELECT * FROM candidates");
    while ($row = $candidates->fetch_assoc()) {
        echo "<p><input class='w3-radio' type='radio' name='candidate' value='{$row['id']}' required> {$row['name']}</p>";
    }
    ?>
    <p><button class="w3-button w3-green" type="submit" name="vote">Submit Vote</button></p>
</form>

</body>
</html>
