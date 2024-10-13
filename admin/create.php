<?php
require_once '../login/dbh.inc.php'; // DATABASE CONNECTION
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login/login.php");
    exit();
}

//Get info from admin session
$user = $_SESSION['user'];
$admin_id = $_SESSION['user']['admin_id'];
$first_name = $_SESSION['user']['first_name'];
$last_name = $_SESSION['user']['last_name'];
$email = $_SESSION['user']['email'];
$contact_number = $_SESSION['user']['contact_number'];
$department_id = $_SESSION['user']['department_id'];
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- head CDN links -->
    <?php include '../cdn/head.html'; ?>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="create.css">
</head>

<body>
    <header>
        <?php include '../cdn/navbar.php'; ?>
    </header>
    <main>
        <div class="container pt-5">
            <div class="row g-4">
                <!-- left sidebar -->
                <?php include '../cdn/sidebar.php'; ?>

                <!-- main content -->
                <div class="col-md-6 pt-5 px-5">
                    <h3 class="text-center"><b>Create Announcement</b></h3>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <input type="text" id="admin_id" name="admin_id" value="<?php echo $admin_id; ?>" style="display: none;">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control title py-3 px-3" id="title" name="title" placeholder="Enter title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control custom-class py-3 px-3" id="description" name="description" rows="5" placeholder="Enter description" required style="border-radius: 20px;"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <div class="upload-image-container d-flex flex-column align-items-center justify-content-center bg-white">
                                <div class="d-flex">
                                    <p id="upload-text" class="mt-3">Upload Photo</p>
                                    <input type="file" class="form-control-file" id="image" name="image" style="display: none;" onchange="imagePreview()">
                                    <button class="btn btn-light" id="file-upload-btn" onclick="document.getElementById('image').click();">
                                        <i class="bi bi-upload"></i>
                                    </button>
                                    <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 100%; margin-top: 15px;">
                                    <i id="delete-icon" class="bi bi-trash" style="position: absolute; top: 5px; right: 5px; display: none; cursor: pointer;" onclick="deleteImage()"></i>
                                </div>
                            </div>
                        </div>
                        <div class="button-container d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-3">Post</button>
                        </div>
                    </form>

                </div>
                <script src="create.js"></script>
    </main>
    <footer>

    </footer>
    <!-- Body CDN links -->
    <?php include '../cdn/body.html'; ?>
</body>

</html>