<?php
session_start();
require_once "../../config/role_auth.php";

if (!isAdmin()) {
    echo "<h3>Access Denied</h3>";
    exit;
}
require_once "../../config/auth.php";
require_once "../../models/Student.php";
require_once "../../views/layouts/header.php";

$model = new Student();
if (isset($_GET['search']) && $_GET['search'] != "") {
    $students = $model->search($_GET['search']);
} else {
    $students = $model->getAll();
}
?>

<div class="d-flex justify-content-between align-items-center mb-3">
<div>
        <a href="../../public/dashboard.php" class="btn btn-secondary btn-sm">
    ← Back to Dashboard
</a>
    </div>    
<h2>Students</h2>
    <a href="create.php" class="btn btn-primary">+ Add Student</a>
</div>
<form method="GET" class="mb-3">

    <div class="input-group">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Search students...">

        <button class="btn btn-primary" type="submit">
            Search
        </button>

        <a href="index.php" class="btn btn-secondary">
            Reset
        </a>

    </div>

</form>
<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th style="width: 180px;">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php if (count($students) > 0): ?>
            <?php foreach ($students as $s): ?>
                <tr>
                    <td><?= $s['id'] ?></td>
                    <td><?= htmlspecialchars($s['name']) ?></td>
                    <td><?= htmlspecialchars($s['email']) ?></td>
                    <td><?= htmlspecialchars($s['phone']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="../../controllers/studentController.php?delete=<?= $s['id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this student?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No students found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once "../../views/layouts/footer.php"; ?>