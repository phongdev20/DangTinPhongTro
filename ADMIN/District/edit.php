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
                            <h1 class="text-uppercase">cập nhật địa chỉ</h1>
                        </div>
                        <div class="col-sm-6">
                            <p class="breadcrumb float-sm-right">
                                <a href="../District" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Quay lại</a>
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
                $sql = "SELECT `ID`, `Name` FROM `districts` WHERE `ID` = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = $row['Name'];
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
