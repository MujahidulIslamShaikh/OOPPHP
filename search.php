<?php
require './config/db.php';
require './classes/OOPClass.php';

$db = new Database();
$conn = $db->connect();

$student = new Students($conn);
$results = [];

if (isset($_POST['search'])) {
    $term = $_POST['term'];
    $results = $student->search($term);
}
?>

<h2>🔍 Search Student</h2>
<form method="POST">
    <input type="text" name="term" placeholder="Enter student name..." required>
    <button type="submit" name="search">Search</button>
</form>

<?php if (!empty($results)): ?>
    <h3>Results:</h3>
    <ul>
        <?php foreach($results as $row): ?>
            <li><?= $row['name'] ?> (<?= $row['course'] ?>)</li>
        <?php endforeach; ?>
    </ul>
<?php elseif (isset($_POST['search'])): ?>
    <p>No results found.</p>
<?php endif; ?>

<br>
<a href="index.php">🏠 Back to Home</a>
