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
    <title>Quản lý phòng trọ</title>
</head>

<body>
    <div class="d-flex flex-column" style="min-height: 100vh;">
        <div class="mb-auto">

            <?php include("../Components/headerMyRoom.php") ?>

            <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
                <div class="container mt-4">
                    <div class="mb-4">
                        <a type="button" class="btn btn-success" href="./addRoom.php">Đăng tin cho thuê phòng</a>
                    </div>
                    <table class="table table-success table-striped" style="border-radius: 16px">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên phòng trọ</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Ngày đăng</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tình trạng phòng</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $username = $_COOKIE["username"];
                            $sql = "SELECT motel.ID, motel.images, motel.title, user.Name, motel.created_at, motel.count_view, motel.address, motel.price, motel.approve FROM `motel` INNER JOIN `user` ON motel.user_id = user.ID INNER JOIN categories on motel.category_id = categories.ID INNER JOIN districts on motel.district_id = districts.ID WHERE user.UserName = '" . $username . "'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $tinhTrang;
                                    if ($row["approve"] == 0) {
                                        $tinhTrang = "Còn trống";
                                    } else {
                                        $tinhTrang = "Đã đầy";
                                    }
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $row["ID"] ?></th>
                                        <th scope="col"><?php echo $row["title"] ?></th>
                                        <th scope="col"><?php echo $row["images"] ?></th>
                                        <th scope="col"><?php echo $row["created_at"] ?></th>
                                        <th scope="col"><?php echo $row["count_view"] ?></th>
                                        <th scope="col"><?php echo $row["price"] ?></th>
                                        <th scope="col"><?php echo $tinhTrang ?></th>
                                        <td>
                                            <a type="button" class="btn btn-warning" href="/documents/DangTinPhongTro/USER/TABHOME/detail.php?id=<?php echo $row["ID"] ?>">Chi tiết</a>
                                            <a type="button" class="btn btn-primary" href="/documents/DangTinPhongTro/USER/TABHOME/updateStatusRoom.php?id=<?php echo $row["ID"] ?>">Cho thuê</a>
                                            <a type="button" class="btn btn-danger">Xoá bài</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>



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
