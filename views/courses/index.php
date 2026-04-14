<?php
require_once "../../config/auth.php";
require_once "../../models/Course.php";
require_once "../../views/layouts/header.php";

$model = new Course();
if (isset($_GET['search']) && $_GET['search'] != "") {
    $courses = $model->search($_GET['search']);
} else {
    $courses = $model->getAll();
}
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <a href="../../public/dashboard.php" class="btn btn-secondary btn-sm">
    ← Back to Dashboard
</a>
    </div>
    <h2>Courses</h2>
    <a href="create.php" class="btn btn-primary">Add Course</a>
</div>
<form method="GET" class="mb-3">

    <div class="input-group">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Search courses...">

        <button class="btn btn-primary">Search</button>

        <a href="index.php" class="btn btn-secondary">Reset</a>

    </div>

</form>
<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Code</th>
            <th style="width: 180px;">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php if (count($courses) > 0): ?>
            <?php foreach ($courses as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['course_name']) ?></td>
                    <td><?= htmlspecialchars($c['course_code']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="../../controllers/courseController.php?delete=<?= $c['id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this course?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No courses found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once "../../views/layouts/footer.php"; ?>