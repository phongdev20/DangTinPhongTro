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
    <title>Tìm phòng trọ</title>
</head>

<body>
    <div class="d-flex flex-column" style="min-height: 100vh;">
        <div class="mb-auto">

            <?php include("../Components/headerSearch.php") ?>

            <!-- Tabs content -->
            <div class="tab-content" id="ex3-content">
                <div class="container mt-4">
                    <form method="post">
                        <div class="mt-4 container mb-4">
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" name="category" aria-label="Default select example">
                                        <option value="0" selected>Chọn loại phòng</option>
                                        <?php
                                        $name1 = '';
                                        $sql = "SELECT * FROM `categories`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['ID'];
                                                $name1 = $row['Name'];
                                        ?>
                                                <option value="<?php echo $id ?>"><?php echo $name1 ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col">
                                    <select class="form-select" name="address" aria-label="Default select example">
                                        <option value="0" selected>Chọn địa điểm</option>
                                        <?php
                                        $name2 = '';
                                        $sql = "SELECT * FROM `districts`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['ID'];
                                                $name2 = $row['Name'];
                                        ?>
                                                <option value="<?php echo $id ?>"><?php echo $name2 ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col">
                                    <select class="form-select" name="price" aria-label="Default select example">
                                        <option value="0" selected>Chọn mức giá</option>
                                        <?php
                                        $name3 = 0;
                                        $sql = "SELECT * FROM `motel`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['ID'];
                                                $name3 = $row['price'];
                                        ?>
                                                <option value="<?php echo $name3 ?>"><?php echo $name3 ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col">
                                    <input type="submit" name="filter" value="lọc" class="btn btn-primary" style="z-index: 10;">
                                </div>
                            </div>
                        </div>
                    </form>
                    <h3 class="mb-4">Các phòng trọ được tìm thấy</h3>
                    <div class="row wrap">
                        <?php
                        $search = "";
                        $text = "";
                        $text = $_GET["search"];
                        if ($text) {
                            $search = "( motel.title LIKE '%" . $text . "%') ";
                        }
                        if (isset($_POST['filter'])) {
                            $name1 = (int)addslashes($_POST['category']);
                            $name2 = addslashes($_POST['address']);
                            $name3 = addslashes($_POST['price']);
                            if ($name1) {
                                $search = $search ? $search . "AND (motel.category_id = $name1) " : $search . "(motel.category_id = $name1) ";
                            }
                            if ($name2) {
                                $search = $search ? $search . "AND ( motel.district_id = $name2) " : $search . "( motel.district_id = $name2) ";
                            }
                            if ($name3) {
                                $search = $search ? $search . "AND (motel.price > $name3)" : $search . "(motel.price > $name3)";
                            }
                        }
                        $sql = "SELECT motel.ID, motel.images, motel.title, user.Name, motel.created_at, motel.count_view, motel.address, motel.price FROM `motel` INNER JOIN `user` ON motel.user_id = user.ID INNER JOIN categories on motel.category_id = categories.ID INNER JOIN districts on motel.district_id = districts.ID";
                        if ($search) {
                            $sql .= " WHERE " . $search;
                        }
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
            </div>
        </div>
        <!-- Tabs content -->
        <?php include("../Components/footer.php") ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>
