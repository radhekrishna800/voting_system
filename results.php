<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">

<h2 class="w3-center">Voting Results</h2>
<table class="w3-table-all w3-card-4">
    <tr class="w3-green">
        <th>Candidate</th>
        <th>Votes</th>
    </tr>
    <?php
    $results = $conn->query("SELECT * FROM candidates ORDER BY votes DESC");
    while ($row = $results->fetch_assoc()) {
        echo "<tr><td>{$row['name']}</td><td>{$row['votes']}</td></tr>";
    }
    ?>
</table>

<p class="w3-center"><a href="logout.php" class="w3-button w3-red">Logout</a></p>

</body>
</html>
<link rel="stylesheet" href="style.css">
