<?php
require_once "../../config/auth.php";
require_once "../../models/Enrollment.php";
require_once "../../models/Student.php";
require_once "../../models/Course.php";
require_once "../../views/layouts/header.php";

$enrollmentModel = new Enrollment();
$studentModel = new Student();
$courseModel = new Course();

$enrollments = $enrollmentModel->getAll();
$students = $studentModel->getAll();
$courses = $courseModel->getAll();
?>

<!-- HEADER SECTION -->
<div class="d-flex justify-content-between align-items-center mb-3">

    <a href="../../public/dashboard.php" class="btn btn-secondary btn-sm">
        ← Back to Dashboard
    </a>

    <h2 class="mb-0">Enrollments</h2>

    <span></span>
</div>

<!-- ENROLL FORM -->
<div class="row mb-4">
    <div class="col-md-6">

        <div class="card shadow p-3">

            <h5 class="mb-3">Enroll Student</h5>

            <form method="POST" action="../../controllers/enrollmentController.php">

                <div class="mb-3">
                    <label>Select Student</label>
                    <select name="student_id" class="form-select" required>
                        <option value="">-- Choose Student --</option>
                        <?php foreach ($students as $s): ?>
                            <option value="<?= $s['id'] ?>">
                                <?= htmlspecialchars($s['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Select Course</label>
                    <select name="course_id" class="form-select" required>
                        <option value="">-- Choose Course --</option>
                        <?php foreach ($courses as $c): ?>
                            <option value="<?= $c['id'] ?>">
                                <?= htmlspecialchars($c['course_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" name="enroll" class="btn btn-primary w-100">
                    Enroll Student
                </button>

            </form>

        </div>

    </div>
</div>

<!-- ENROLLMENT TABLE -->
<div class="card shadow p-3">

    <h5 class="mb-3">Enrollment List</h5>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Course</th>
                <th style="width: 120px;">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if (count($enrollments) > 0): ?>
                <?php foreach ($enrollments as $e): ?>
                    <tr>
                        <td><?= $e['id'] ?></td>
                        <td><?= htmlspecialchars($e['student_name']) ?></td>
                        <td><?= htmlspecialchars($e['course_name']) ?></td>
                        <td>
                            <a href="../../controllers/enrollmentController.php?delete=<?= $e['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Remove this enrollment?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No enrollments found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<?php require_once "../../views/layouts/footer.php"; ?>