<?php
require_once "../../config/auth.php";
require_once "../../models/Student.php";
require_once "../../views/layouts/header.php";

$model = new Student();
$student = $model->getById($_GET['id']);
?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Edit Student</h3>
                <a href="index.php" class="btn btn-secondary btn-sm">← Back</a>
            </div>

            <form method="POST" action="../../controllers/studentController.php">

                <input type="hidden" name="id" value="<?= $student['id'] ?>">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name"
                           value="<?= htmlspecialchars($student['name']) ?>"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email"
                           value="<?= htmlspecialchars($student['email']) ?>"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone"
                           value="<?= htmlspecialchars($student['phone']) ?>"
                           class="form-control">
                </div>

                <button type="submit" name="update_student" class="btn btn-success w-100">
                    Update Student
                </button>

            </form>

        </div>

    </div>
</div>

<?php require_once "../../views/layouts/footer.php"; ?>