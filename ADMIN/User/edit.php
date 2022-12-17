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
                            <h1 class="text-uppercase">cập nhật người dùng</h1>
                        </div>
                        <div class="col-sm-6">
                            <p class="breadcrumb float-sm-right">
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
                $sql = "SELECT `ID`, `Name`, `UserName`, `Email`, `Password`, `Role`, `Phone`, `Avatar` FROM `user` WHERE `ID` = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = $row['Name'];
                    $email = $row['Email'];
                    $phone = $row['Phone'];
                    $avatar = $row['Avatar'];
                    $role = $row['Role'];
                    $user_name = $row['UserName'];
                } else {
                    echo 'Khong co ban ghi nao';
                } ?>
                <!-- Default box -->
                <div class="card d-flex justify-content-center">
                    <div class="card-body">
                        <form action="update.php/?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="name">Tên</label>
                                        <input type="text" id="name" name="name" value="<?php echo $name ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <div class="row w-100">
                                            <img class="img-fluid col-md-2" src="../../USER/Uploads/User/<?php echo $user_name ?>/<?php echo $avatar ?>">
                                            <input name="avatar" type="file" class="form-control col-10" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" value="<?php echo $email ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Điện thoại</label>
                                        <input type="text" id="phone" name="phone" value="<?php echo $phone ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Phân quyền</label>
                                        <input type="number" id="role" name="role" value="<?php echo $role ?>" class="form-control">
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" name="update" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Lưu lại</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
