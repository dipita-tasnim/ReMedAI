<?php
require_once('DBconnect.php');

// Handle new antibiotic addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['duration'])) {
    $name = $_POST['name'];
    $duration = (int)$_POST['duration'];
    $sql = "INSERT INTO tracker (name, duration) VALUES ('$name', $duration)";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-msg'>Antibiotic added successfully!</p>";
    } else {
        echo "<p class='error-msg'>Error: " . $conn->error . "</p>";
    }
}

// Handle checkbox updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $days_taken = isset($_POST['days_taken']) ? array_map('intval', $_POST['days_taken']) : [];
    $days_taken_json = json_encode($days_taken);
    $sql = "UPDATE tracker SET days_taken = '$days_taken_json' WHERE id = $id";
    if (!$conn->query($sql)) {
        echo "<p class='error-msg'>Error updating record: " . $conn->error . "</p>";
    }
}

// Fetch all tracked antibiotics
$sql = "SELECT * FROM tracker";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Antibiotic Tracker</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <h1>Antibiotic Tracker</h1>

    <!-- Input Form -->
    <div class="form-container">
        <h2>Add New Antibiotic</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Antibiotic Name" required>
            <input type="number" name="duration" placeholder="Number of Days" required>
            <button type="submit">Add Antibiotic</button>
        </form>
    </div>

    <!-- Tracker Display -->
    <div class="tracker-container">
        <h2>Antibiotic Course Tracker</h2>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="antibiotic-item">
                    <h3><?= htmlspecialchars($row['name']) ?> (<?= $row['duration'] ?> days)</h3>

                    <!-- Progress Bar -->
                    <?php 
                        $days_taken = json_decode($row['days_taken'], true) ?? [];
                        $total_days = $row['duration'];
                        $completed_days = count($days_taken);
                        $progress = ($total_days > 0) ? ($completed_days / $total_days) * 100 : 0;
                    ?>
                    <div class="progress-bar">
                        <div class="progress" style="width: <?= $progress ?>%;"></div>
                    </div>
                    <p><?= round($progress) ?>% Complete</p>

                    <!-- Tracker Form -->
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <?php for ($i = 1; $i <= $total_days; $i++): ?>
                            <div class="checkbox-label">
                                <input type="checkbox" name="days_taken[]" value="<?= $i ?>"
                                    <?= in_array($i, $days_taken) ? 'checked' : '' ?>
                                    onchange="this.form.submit()">
                                <label>Day <?= $i ?></label>
                                <span class="message">
                                    <?= in_array($i, $days_taken) 
                                        ? 'Antibiotic taken for the day' 
                                        : 'You did not take antibiotic for today' ?>
                                </span>
                            </div>
                        <?php endfor; ?>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No antibiotics are currently being tracked.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>

