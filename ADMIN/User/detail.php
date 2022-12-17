<head>
    <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <!-- MDB
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link href="../ASSETS/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="../ASSETS/dist/css/adminlte.min.css" rel="stylesheet" />
    <link href="../ASSETS/css/layoutAdmin.css" rel="stylesheet" />
</head>
<?php include('../Components/ketnoi.php');
$id = $_GET["id"]; ?>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("../Components/navbar.php") ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php include("../Components/sidebar.php") ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-uppercase">chi tiết người dùng</h1>
                        </div>
                        <div class="col-sm-6">
                            <p class="breadcrumb float-sm-right">
                                <a href="../User/edit.php?id=<?php echo $id ?>" class="btn btn-sm btn-warning mr-3"><i class="fas fa-edit"></i> Cập nhật</a>
                                <a href="../User" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Quay lại</a>
                            </p>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php include('../Components/ketnoi.php');
                $id = $_GET["id"];
                $name;
                $user_name;
                $email;
                $phone;
                $avatar;
                $pass;
                $salt;
                $role;
                $sql = "SELECT `ID`, `Name`, `UserName`, `Email`, `Password`, `Role`, `Phone`, `Avatar`, `Salt` FROM `user` WHERE `ID` = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = $row['Name'];
                    $email = $row['Email'];
                    $phone = $row['Phone'];
                    $avatar = $row['Avatar'];
                    $role = $row['Role'];
                    $user_name = $row['UserName'];
                    $pass = $row['Password'];
                    $salt = $row['Salt'];
                } else {
                    echo 'Khong co ban ghi nao';
                } ?>
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <p>
                            <span class="font-weight-bold">
                                ID
                            </span>
                            <?php echo $id ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Tên đăng nhập
                            </span>
                            <?php echo $user_name ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Tên
                            </span>
                            <?php echo $name ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                Ảnh đại diện
                            </span>
                            <?php echo $avatar ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Email
                            </span>
                            <?php echo $email ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Số điện thoại
                            </span>
                            <?php echo $phone ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Phân quyền
                            </span>
                            <?php echo $role ?>
                        </p>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.control-sidebar -->
    </div>


    <script src="../ASSETS/plugins/jquery/jquery.min.js"></script>
    <script src="../ASSETS/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../ASSETS/dist/js/adminlte.js"></script>
    <script src="../ASSETS/dist/js/demo.js"></script>
</body>

</html>
