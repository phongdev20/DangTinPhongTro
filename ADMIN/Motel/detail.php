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
                            <h1 class="text-uppercase">chi tiết phòng trọ</h1>
                        </div>
                        <div class="col-sm-6">
                            <p class="breadcrumb float-sm-right">
                                <a href="../Motel/edit.php?id=<?php echo $id ?>" class="btn btn-sm btn-warning mr-3"><i class="fas fa-edit"></i> Cập nhật</a>
                                <a href="../Motel" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Quay lại</a>
                            </p>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php include('../Components/ketnoi.php');
                $id = $_GET["id"];
                $title;
                $description;
                $price;
                $image;
                $address;
                $latlng;
                $utilities;
                $phone;
                $approve;
                $status;
                $category;
                $district;
                $count_view;
                $created_at;
                $user;
                $sql = "SELECT `ID`, `title`, `description`, `price`, `count_view`, `address`, `latlng`, `images`, `user_id`, `category_id`, `district_id`, `utilities`, `created_at`, `phone`, `approve`, `status` FROM `motel` WHERE `ID` = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image = $row['images'];
                    $address = $row['address'];
                    $latlng = $row['latlng'];
                    $utilities = $row['utilities'];
                    $phone = $row['phone'];
                    $approve = $row['approve'];
                    $status = $row['status'];
                    $category = $row['category_id'];
                    $district = $row['district_id'];
                    $count_view = $row['count_view'];
                    $created_at = $row['created_at'];
                    $user = $row['user_id'];
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
                                Tên phòng trọ
                            </span>
                            <?php echo $title ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Mô tả
                            </span>
                            <?php echo $description ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Giá
                            </span>
                            <?php echo $price ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                Hình ảnh
                            </span>
                            <?php echo $image ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Địa chỉ
                            </span>
                            <?php echo $address ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Bản đồ
                            </span>
                            <?php echo $latlng ?>
                        </p>

                        <p>
                            <span class="font-weight-bold">
                                Tiện nghi
                            </span>
                            <?php echo $utilities ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                Xác nhận
                            </span>
                            <?php echo $approve ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                Category
                            </span>
                            <?php echo $category ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                District
                            </span>
                            <?php echo $district ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                Count_view
                            </span>
                            <?php echo $count_view ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                Created_at
                            </span>
                            <?php echo $created_at ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                User
                            </span>
                            <?php echo $user ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">
                                Trạng thái
                            </span>
                            <?php echo $status ?>
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
