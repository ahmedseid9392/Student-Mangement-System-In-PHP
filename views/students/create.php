<?php
require_once "../../config/auth.php";
require_once "../../views/layouts/header.php";
?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Add Student</h3>
                <a href="index.php" class="btn btn-secondary btn-sm">← Back</a>
            </div>

            <form method="POST" action="../../controllers/studentController.php">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <button type="submit" name="add_student" class="btn btn-primary w-100">
                    Save Student
                </button>

            </form>

        </div>

    </div>
</div>

<?php require_once "../../views/layouts/footer.php"; ?>