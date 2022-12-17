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
                            <h1 class="text-uppercase">danh sách người dùng</h1>
                        </div>
                        <div class="col-sm-6">
                            <p class="breadcrumb float-sm-right">
                                <a href="../User/add.php" class="btn btn-sm btn-success mr-3"><i class="fas fa-plus"></i> Thêm</a>
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
                                    Tên
                                </th>
                                <th>
                                    Tên đăng nhập
                                </th>
                                <th style="width:100px">
                                    Ảnh đại diện
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Điện thoại
                                </th>
                                <th>
                                    Phân quyền
                                </th>
                                <th class="text-center" style="width: 180px">Chức năng</th>
                            </tr>

                            <?php
                            include('../Components/ketnoi.php');
                            $sql = "SELECT `ID`, `Name`, `UserName`, `Email`, `Password`, `Role`, `Phone`, `Avatar` FROM `user`";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['ID'];
                                    $name = $row['Name'];
                                    $user_name = $row['UserName'];
                                    $email = $row['Email'];
                                    $phone = $row['Phone'];
                                    $avatar = $row['Avatar'];
                                    $role = $row['Role'];
                            ?>
                                    <tr>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $user_name ?></td>
                                        <td style="width:100px"><img class="img-fluid" src="../../USER/Uploads/User/<?php echo $user_name ?>/<?php echo $avatar ?>"></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $role ?></td>
                                        <td class='text-center' style='width: 180px'>
                                            <a href='../User/edit.php?id=<?php echo $id ?>' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></a>
                                            <a href="../User/detail.php?id=<?php echo $id ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            <a href='../User/delete.php?id=<?php echo $id ?>' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a>
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
