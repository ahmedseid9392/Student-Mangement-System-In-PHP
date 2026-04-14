<?php
require_once "../config/auth.php";
require_once "../config/database.php";

$students = $conn->query("SELECT COUNT(*) FROM students")->fetchColumn();
$courses = $conn->query("SELECT COUNT(*) FROM courses")->fetchColumn();
$enrollments = $conn->query("SELECT COUNT(*) FROM enrollments")->fetchColumn();
?>

<?php require_once "../views/layouts/header.php"; ?>

<h2 class="mb-4">Dashboard Overview
    <small class="text-muted">
        (<?= $_SESSION['role'] ?>)
    </small>
</h2>

<!-- STATS CARDS -->
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card bg-primary text-white p-3 shadow">
            <h5>Students</h5>
            <h2><?= $students ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white p-3 shadow">
            <h5>Courses</h5>
            <h2><?= $courses ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-dark text-white p-3 shadow">
            <h5>Enrollments</h5>
            <h2><?= $enrollments ?></h2>
        </div>
    </div>

</div>

<!-- CHARTS SECTION -->
<div class="row mb-4">

    <div class="col-md-6">
        <div class="card p-3 shadow">
            <h5>Students vs Courses</h5>
            <canvas id="barChart"></canvas>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-3 shadow">
            <h5>System Distribution</h5>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

</div>

<!-- NAVIGATION -->
<div class="mb-3">
    <a href="../views/students/index.php" class="btn btn-primary">Students</a>
    <a href="../views/courses/index.php" class="btn btn-success">Courses</a>
    <a href="../views/enrollments/index.php" class="btn btn-dark">Enrollments</a>
    <a href="../controllers/authController.php?logout=true" class="btn btn-danger">Logout</a>
</div>

<!-- CHART.JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const barChart = document.getElementById('barChart');

new Chart(barChart, {
    type: 'bar',
    data: {
        labels: ['Students', 'Courses'],
        datasets: [{
            label: 'Count',
            data: [<?= $students ?>, <?= $courses ?>],
            backgroundColor: ['#0d6efd', '#198754']
        }]
    }
});
</script>

<script>
const pieChart = document.getElementById('pieChart');

new Chart(pieChart, {
    type: 'doughnut',
    data: {
        labels: ['Students', 'Courses', 'Enrollments'],
        datasets: [{
            data: [<?= $students ?>, <?= $courses ?>, <?= $enrollments ?>],
            backgroundColor: ['#0d6efd', '#198754', '#212529']
        }]
    }
});
</script>

<?php require_once "../views/layouts/footer.php"; ?>