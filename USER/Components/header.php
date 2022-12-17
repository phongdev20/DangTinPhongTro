<?php
include('../Components/ketnoi.php');
$username = "";
if (isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
}
$name;
$avatar;
if ($username) {
    $sql = "SELECT * FROM `user` WHERE `UserName` = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['Name'];
            $avatar = $row['Avatar'];
        }
    }
}
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="../ASSETS/img/logo.png" height="40" alt="MDB Logo" loading="lazy" />
            </a>
            <!-- Left links -->
            <ul class="nav nav-tabs" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="../TABHOME/index.php" id="home">Trang chủ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="../TABHOME/myRoom.php" id="room">Cho thuê phòng</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="../TABHOME/search.php" id="search">Xem Phòng</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="../TABHOME/contact.php" id="contact">Liên hệ</a>
                </li>
            </ul>
            <!-- Left links -->
            <form class="d-flex" action="../TABHOME/search.php">
                <input name="search" class="form-control me-2" type="search" placeholder="Nhập từ khoá" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center fs-4">
            <!-- Icon -->
            <!-- <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart"></i>
            </a> -->

            <!-- Notifications -->
            <!-- <div class="dropdown">
                <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div> -->
            <!-- Avatar -->
            <?php if ($username) {
                echo '<div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="../Uploads/User/' . $username . '/' . $avatar . '" class="rounded-circle" width="40" height="40" loading="lazy" />
                    <p style="margin-top: 12px; margin-left: 6px;">' . $name . '</p>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="../Profile">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="../Update">Update profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="../Components/logout.php">Logout</a>
                    </li>
                </ul>
            </div>';
            } else {
                echo '<a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="../Auth/index.php" i>
                    Đăng nhập
                </a>';
            } ?>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
