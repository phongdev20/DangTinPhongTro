<head>
    <title>Thêm bài đăng</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
</head>
<?php include('../Components/ketnoi.php'); ?>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <?php include("../Components/headerMyRoom.php") ?>

        <div class="content-wrapper">

            <!-- Default box -->
            <div class="card d-flex justify-content-center container mt-4">
                <div class="card-body">
                    <form action="./handleAddRoom.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="title">Tên phòng trọ</label>
                                    <input type="text" id="title" name="title" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <input type="text" id="description" name="description" value="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="image">Hình ảnh</label>
                                    <input name="image" type="file" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" id="address" name="address" value="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="latlng">Bản đồ</label>
                                    <input type="text" id="latlng" name="latlng" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="utilities">Tiện nghi</label>
                                    <input type="text" id="utilities" name="utilities" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input type="number" id="price" name="price" value="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Điện thoại</label>
                                    <input type="text" id="phone" name="phone" value="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="approve">Xác nhận</label>
                                    <select class="form-select form-control" name="approve" id="approve">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category">Loại phòng</label>
                                    <select class="form-select form-control" name="category" id="category">
                                        <option value="0" selected>-- Chọn loại phòng --</option>
                                        <?php
                                        $sql = "SELECT `ID`, `Name` FROM `categories`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['ID'];
                                                $name = $row['Name'];
                                        ?>
                                                <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="district">Quận, huyện</label>
                                    <select class="form-select form-control" name="district" id="district">
                                        <option value="0" selected>-- Chọn vị trí --</option>
                                        <?php
                                        $sql = "SELECT `ID`, `Name` FROM `districts`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['ID'];
                                                $name = $row['Name'];
                                        ?>
                                                <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">Trạng thái</label>
                                    <select class="form-select form-control" name="status" id="status">
                                        <option value="1">1</option>
                                        <option value="2" selected>2</option>
                                    </select>
                                </div>

                                <div class="form-group d-flex justify-content-end mt-4 row">
                                    <a type="submit" name="create" class="btn btn-sm btn-error" href="./myRoom.php">Quay lại</a>
                                    <button type="submit" name="create" class="btn btn-sm btn-success mt-3"><i class="fas fa-save"></i> Tạo mới</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
        <!-- /.control-sidebar -->
        <?php include("../Components/footer.php") ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>
