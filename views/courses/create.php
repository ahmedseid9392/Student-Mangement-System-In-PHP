<?php
require_once "../../config/auth.php";
require_once "../../views/layouts/header.php";
?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow p-4">

            <h3 class="mb-3">Add Course</h3>
            <a href="index.php" class="btn btn-secondary btn-sm">← Back</a>

            <form method="POST" action="../../controllers/courseController.php">

                <div class="mb-3">
                    <label>Course Name</label>
                    <input type="text" name="course_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Course Code</label>
                    <input type="text" name="course_code" class="form-control" required>
                </div>

                <button type="submit" name="add_course" class="btn btn-primary w-100">
                    Add Course
                </button>

            </form>

        </div>

    </div>
</div>

<?php require_once "../../views/layouts/footer.php"; ?>