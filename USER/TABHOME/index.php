<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <title>Đăng tin thuê phòng</title>
</head>

<body>
    <div class="d-flex flex-column" style="min-height: 100vh;">
        <div class="mb-auto">

            <?php include("../Components/header.php") ?>

            <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
                <div class="container mt-4">
                    <h3 class="mb-4">Các phòng trọ được xem nhiều nhất</h3>
                    <div class="row wrap">
                        <?php
                        $sql = 'SELECT motel.ID, motel.images, motel.title, user.Name, motel.created_at, motel.count_view, motel.address, motel.price FROM `motel` INNER JOIN `user` ON motel.user_id = user.ID INNER JOIN categories on motel.category_id = categories.ID INNER JOIN districts on motel.district_id = districts.ID ORDER BY `count_view` DESC';
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <div class="card d-flex flex-row mb-3" style="width: 50%;">
                                    <img src="../Uploads/Motel/<?php echo $row["images"] ?>" style="width: 50%;" class="card-img-top" alt="Ảnh phòng trọ">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row["title"] ?></h5>
                                        <p class="card-text">Người đăng: <?php echo $row["Name"] ?></p>
                                        <p class="card-text">Ngày đăng: <?php echo $row["created_at"] ?></p>
                                        <p class="card-text">Lượt xem: <?php echo $row["count_view"] ?></p>
                                        <p class="card-text">Địa chỉ: <?php echo $row["address"] ?></p>
                                        <p class="card-text">Giá: <?php echo $row["price"] ?></p>
                                        <a href="/documents/DangTinPhongTro/USER/TABHOME/detail.php?id=<?php echo $row["ID"] ?>" class="btn btn-primary">Xem chi tiết</a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="container mt-4">
                    <h3 class="mb-4">Các phòng trọ mới nhất được đăng tải</h3>
                    <div class="row wrap">
                        <?php
                        $sql = 'SELECT motel.images, motel.title, user.Name, motel.created_at, motel.count_view, motel.address, motel.price FROM `motel` INNER JOIN `user` ON motel.user_id = user.ID INNER JOIN categories on motel.category_id = categories.ID INNER JOIN districts on motel.district_id = districts.ID ORDER BY `created_at` DESC';
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <div class="card d-flex flex-row mb-3" style="width: 50%;">
                                    <img src="../Uploads/Motel/<?php echo $row["images"] ?>" style="width: 50%;" class="card-img-top" alt="Ảnh phòng trọ">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row["title"] ?></h5>
                                        <p class="card-text">Người đăng: <?php echo $row["Name"] ?></p>
                                        <p class="card-text">Ngày đăng: <?php echo $row["created_at"] ?></p>
                                        <p class="card-text">Lượt xem: <?php echo $row["count_view"] ?></p>
                                        <p class="card-text">Địa chỉ: <?php echo $row["address"] ?></p>
                                        <p class="card-text">Giá: <?php echo $row["price"] ?></p>
                                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="container mt-4">
                    <h3 class="mb-4">Các phòng trọ gần trường ĐH Vinh nhất</h3>
                    <div class="row wrap">
                        <?php
                        $sql = 'SELECT motel.images, motel.title, user.Name, motel.created_at, motel.count_view, motel.address, motel.price FROM `motel` INNER JOIN `user` ON motel.user_id = user.ID INNER JOIN categories on motel.category_id = categories.ID INNER JOIN districts on motel.district_id = districts.ID ORDER BY `count_view` DESC';
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <div class="card d-flex flex-row mb-3" style="width: 50%;">
                                    <img src="../Uploads/Motel/<?php echo $row["images"] ?>" style="width: 50%;" class="card-img-top" alt="Ảnh phòng trọ">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row["title"] ?></h5>
                                        <p class="card-text">Người đăng: <?php echo $row["Name"] ?></p>
                                        <p class="card-text">Ngày đăng: <?php echo $row["created_at"] ?></p>
                                        <p class="card-text">Lượt xem: <?php echo $row["count_view"] ?></p>
                                        <p class="card-text">Địa chỉ: <?php echo $row["address"] ?></p>
                                        <p class="card-text">Giá: <?php echo $row["price"] ?></p>
                                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabs content -->
        <?php include("../Components/footer.php") ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>
