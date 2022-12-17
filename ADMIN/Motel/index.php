<!DOCTYPE html>
<html>

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
</head>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("../Components/navbar.php") ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php include("../Components/sidebar.php") ?>
        <!-- Control Sidebar -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-uppercase">danh sách phòng trọ</h1>
                        </div>
                        <div class="col-sm-6">
                            <p class="breadcrumb float-sm-right">
                                <a href="../Motel/add.php" class="btn btn-sm btn-success mr-3"><i class="fas fa-plus"></i> Thêm</a>
                            </p>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <tr>
                                <th>
                                    Tên phòng trọ
                                </th>
                                <th>
                                    Mô tả
                                </th>
                                <th>
                                    Giá
                                </th>
                                <th style="width: 100px">
                                    Hình ảnh
                                </th>
                                <th>
                                    Tiện nghi
                                </th>
                                <th>
                                    Điện thoại
                                </th>
                                <th>
                                    Xác nhận
                                </th>
                                <th class="text-center" style="width: 180px">Chức năng</th>
                            </tr>
                            <?php
                            include('../Components/ketnoi.php');
                            $sql = "SELECT `ID`, `title`, `description`, `price`, `images`, `utilities`, `phone`, `approve`, `status` FROM `motel`";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['ID'];
                                    $title = $row['title'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    $image = $row['images'];
                                    $utilities = $row['utilities'];
                                    $phone = $row['phone'];
                                    $approve = $row['approve'];
                                    $status = $row['status'];
                            ?>
                                    <tr>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $description ?></td>
                                        <td><?php echo $price ?></td>
                                        <td style="width:100px"><img class="img-fluid" src="../../USER/Uploads/Motel/<?php echo $image ?>"></td>
                                        <td><?php echo $utilities ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $approve ?></td>
                                        <td class='text-center' style='width: 180px'>
                                            <a href='change.php?id=<?php echo $id ?>' class="btn btn-sm <?php echo $status == 1 ? 'btn-default' : 'btn-primary' ?>">
                                                <i class="fas <?php echo $status == 1 ? 'fa-toggle-off' : 'fa-toggle-on' ?>"></i></a>
                                            <a href='../Motel/edit.php?id=<?php echo $id ?>' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></a>
                                            <a href="../Motel/detail.php?id=<?php echo $id ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            <a href='../Motel/delete.php?id=<?php echo $id ?>' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- /.control-sidebar -->
    </div>

    <script src="../ASSETS/plugins/jquery/jquery.min.js"></script>
    <script src="../ASSETS/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../ASSETS/dist/js/adminlte.js"></script>
    <script src="../ASSETS/dist/js/demo.js"></script>
</body>

</html>
