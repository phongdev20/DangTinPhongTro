<?php
include('../Components/ketnoi.php');
$username = $_COOKIE["username"];
$name;
$avatar;
$sql = "SELECT * FROM `user` WHERE `UserName` = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['Name'];
        $avatar = $row['Avatar'];
    }
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 100vh; height: 100%; position: fixed; top: 0; bottom: 0;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../../USER/Uploads/User/<?php echo $username ?>/<?php echo $avatar ?>" alt="<?php echo $name  ?>" class="brand-image img-circle" style="width:35px;height:35px;">
        <span class="brand-text font-weight-light"><?php echo $name  ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="../Motel" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Thông tin phòng trọ
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../Category" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Loại phòng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../District" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Địa điểm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../User" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Tài khoản người dùng</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
