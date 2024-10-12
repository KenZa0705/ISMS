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
        <nav class="navbar navbar-expand-lg bg-white text-black fixed-top mb-5">
            <div class="container">
                <div class="user-left d-flex">
                    <div class="d-md-none ms-0 mt-2 me-3">
                        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <a class="navbar-brand d-flex align-items-center" href="#"><img src="img/brand.png" class="img-fluid branding" alt=""></a>
                </div>

                <div class="user-right d-flex align-items-center justify-content-center">
                    <p class="username d-flex align-items-center m-0">Username</p>
                    <div class="user-profile">
                        <div class="dropdown">
                            <button class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="border: none; background: none; padding: 0;">
                                <img class="img-fluid w-100" src="img/test pic.jpg" alt="">
                            </button>
                            <ul class="dropdown-menu mt-3" style="left: auto; right:1px;">
                                <li><a class="dropdown-item text-center" href="#">Settings</a></li>
                                <li><a class="dropdown-item text-center" href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>
    </header>
    <main>
        <div class="container pt-5">
            <div class="row g-4">
                <!-- left sidebar -->
                <div class="col-md-3 d-none d-md-block">
                    <div class="sticky-sidebar pt-5">
                        <div class="sidebar">
                            <div class="card">
                                <div class="card-body d-flex flex-column">
                                    <a href="admin.php" class="btn mb-3"><i class="bi bi-house"></i> Home</a>
                                    <a class="btn active mb-3" href="create.php"><i class="bi bi-megaphone"></i> Create Announcement</a>
                                    <a class="btn mb-3" href=""><i class="bi bi-kanban"></i> Manage Post</a>
                                    <a class="btn" href=""><i class="bi bi-clipboard"></i> Logs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- main content -->
                <div class="col-md-6 pt-5 px-5">
                    <h3 class="text-center"><b>Create Announcement</b></h3>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control title py-3 px-3" id="title" placeholder="Enter title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control custom-class py-3 px-3" id="description" rows="5" placeholder="Enter description" required style="border-radius: 20px;"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <div class="upload-image-container d-flex flex-column align-items-center justify-content-center bg-white">
                                <div class="d-flex">
                                    <p id="upload-text" class="mt-3">Upload Photo</p>
                                    <input type="file" class="form-control-file" id="image" style="display: none;" onchange="imagePreview()">
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