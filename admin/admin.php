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

<!DOCTYPE html>
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
                    <p class="username d-flex align-items-center m-0"><?php echo $first_name ?></p>
                    <div class="user-profile">
                        <div class="dropdown">
                            <button class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="border: none; background: none; padding: 0;">
                                <img class="img-fluid w-100" src="img/test pic.jpg" alt="">
                            </button>
                            <ul class="dropdown-menu mt-3" style="left: auto; right:1px;">
                                <li><a class="dropdown-item text-center" href="#">Settings</a></li>
                                <li><a class="dropdown-item text-center" onclick="alert('Logged Out Successfully')" href="../login/logout.php">Logout</a></li>
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
                                    <a href="admin.php" class="btn active mb-3"><i class="bi bi-house"></i> Home</a>
                                    <a class="btn mb-3" href="create.php"><i class="bi bi-megaphone"></i> Create Announcement</a>
                                    <a class="btn mb-3" href="manage.php"><i class="bi bi-kanban"></i> Manage Post</a>
                                    <a class="btn" href=""><i class="bi bi-clipboard"></i> Logs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- main content -->
                <div class="col-md-6 pt-5 px-5">
                    <div class="feed-container">
                        <div class="card mb-3">
                            <div class="profile-container d-flex px-3 pt-3">
                                <div class="profile-pic">
                                    <img class="img-fluid" src="img/test pic.jpg" alt="">
                                </div>
                                <p class="ms-1 mt-1">Username</p>
                                <div class="dropdown-edit d-flex ms-auto">
                                    <a href=""><i class="bi bi-three-dots"></i></a>
                                </div>

                            </div>
                            <div class="image-container pb-3 mx-3">
                                <img src="img/c1.jpg" alt="Post Image" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Post Title</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi error laboriosam illo nulla culpa exercitationem laudantium optio saepe sequi, nam aut fugit velit minus ipsa debitis sint deleniti doloribus voluptatum.</p>
                                <p class="card-text">
                                    Tags:
                                </p>
                                <small>Updated at October 4, 2024</small>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
                // Assuming you have already connected to the database
                try {
                    // Query to get the announcements
                    $query = "SELECT a.announcement_id, a.title, a.description, d.department_name AS department, c.year_level, a.admin_id, a.image, a.updated_at, s.first_name AS admin_name
                            FROM announcement a
                            JOIN admin s ON a.admin_id = s.admin_id
                            JOIN year_level c ON a.year_level_id = c.year_level_id
                            JOIN department d ON a.department_id = d.department_id
                            ORDER BY a.updated_at DESC"; // You can modify the ORDER BY as per your requirement
                    // Prepare and execute the query
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    // Fetch all the results
                    $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Loop through the announcements and display them
                    foreach ($announcements as $row) {
                        $announcement_id = $row['a.announcement_id'];
                        $title = $row['a.title'];
                        $description = $row['a.description'];
                        $image = $row['a.image'];
                        $admin_name = $row['admin_name'];
                        $department = $row['department'];
                        $year_level = $row['c.year_level'];
                        $updated_at = date('F d, Y', strtotime($row['a.updated_at'])); // Format the date
                        ?>

                        <div class="col-md-6 pt-5 px-5">
                                    <div class="feed-container">
                                        <div class="card mb-3">
                                            <div class="profile-container d-flex px-3 pt-3">
                                                <div class="profile-pic">
                                                    <img class="img-fluid" src="path/to/profile/pic.jpg" alt=""> <!-- Profile image can be dynamic if available -->
                                                </div>
                                                <p class="ms-1 mt-1"><?php echo htmlspecialchars($admin_name); ?></p>
                                                <div class="dropdown-edit d-flex ms-auto">
                                                    <a href=""><i class="bi bi-three-dots"></i></a>
                                                </div>
                                            </div>

                                            <div class="image-container pb-3 mx-3">
                                                <img src="uploads/<?php echo htmlspecialchars($image); ?>" alt="Post Image" class="img-fluid"> <!-- Dynamically display post image -->
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo htmlspecialchars($title); ?></h5>
                                                <p><?php echo htmlspecialchars($description); ?></p>
                                                <p class="card-text">
                                                    Tags: <?php echo htmlspecialchars($year_level), htmlspecialchars($department); ?>
                                                </p>
                                                <small>Updated at <?php echo htmlspecialchars($updated_at); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php

                        } 
                    } catch (PDOException $e) {
                            // Handle any errors that occur during query execution
                            echo "Error: " . $e->getMessage();
                }
                ?>


               

                <div class="col-md-3 d-none d-md-block">
                    <div class="sticky-sidebar pt-5">
                        <div class="filter">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-2">Recent Posts</h5>
                                    <div class="posts">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-star me-2"></i> <span>JPCS Membership Fee</span>
                                        </div>

                                        <h5 class="text-center card-title">Announcements Filter</h5>
                                        <form class="filtered_option d-flex flex-column" action="">
                                            <label>Choose Department</label>
                                            <div class="checkbox-group mb-3">
                                                <label><input type="checkbox" name="department_filter" value="1"> CECS</label><br>
                                                <label><input type="checkbox" name="department_filter" value="2"> CABE</label><br>
                                                <label><input type="checkbox" name="department_filter" value="3"> CAS</label><br>
                                            </div>

                                            <label>Select Year Level</label>
                                            <div class="checkbox-group">
                                                <label><input type="checkbox" name="year_level" value="1"> 1st Year</label><br>
                                                <label><input type="checkbox" name="year_level" value="2"> 2nd Year</label><br>
                                                <label><input type="checkbox" name="year_level" value="3"> 3rd Year</label><br>
                                                <label><input type="checkbox" name="year_level" value="4"> 4th Year</label><br>

                                            </div>
                                            <button type="button" class="btn btn-primary mt-3">Filter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="admin.js"></script>
    </main>
    <footer>

    </footer>
    <!-- Body CDN links -->
    <?php include '../cdn/body.html'; ?>
</body>

</html>