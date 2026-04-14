<?php
require_once "../../config/auth.php";
require_once "../../models/Course.php";
require_once "../../views/layouts/header.php";

$model = new Course();
$course = $model->getById($_GET['id']);
?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow p-4">

            <h3 class="mb-3">Edit Course</h3>

            <form method="POST" action="../../controllers/courseController.php">

                <input type="hidden" name="id" value="<?= $course['id'] ?>">

                <div class="mb-3">
                    <label>Course Name</label>
                    <input type="text" name="course_name"
                           value="<?= htmlspecialchars($course['course_name']) ?>"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Course Code</label>
                    <input type="text" name="course_code"
                           value="<?= htmlspecialchars($course['course_code']) ?>"
                           class="form-control" required>
                </div>

                <button type="submit" name="update_course" class="btn btn-success w-100">
                    Update Course
                </button>

            </form>

        </div>

    </div>
</div>

<?php require_once "../../views/layouts/footer.php"; ?>