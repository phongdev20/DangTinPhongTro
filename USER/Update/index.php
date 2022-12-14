<?php
include('../Components/ketnoi.php');
$user_name_cookie = $_COOKIE["username"];
$name;
$user_name;
$email;
$phone;
$avatar;
$old_pass = "";
$new_pass = "";
$sql = "SELECT `ID`, `Name`, `UserName`, `Email`, `Password`, `Role`, `Phone`, `Avatar` FROM `user` WHERE `UserName` = '$user_name_cookie'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['Name'];
    $user_name = $row['UserName'];
    $email = $row['Email'];
    $phone = $row['Phone'];
    $avatar = $row['Avatar'];
} else {
    echo 'Khong co ban ghi nao';
}
?>
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
    <title>Cập nhật</title>
    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box !important;
        }

        #update {
            margin: 100px auto;
            max-width: 600px;
            display: flex;
            flex-direction: column;
        }

        #update .txtTitle {
            border-radius: 16px 16px 0 0;
            background-color: blue;
            color: white;
            font-size: 24px;
            padding: 12px;
        }

        #update .box-update {
            padding-top: 32px;
            border: 1px solid blue;
            background-color: white;
            border-radius: 0 0 16px 16px;
        }

        #update .col1 {
            text-align: right;
            padding-right: 40px;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 20px;
            padding-left: 30px;
            font-weight: bold;
        }

        #update .col2 {
            width: 300px;
        }

        #update .btn {
            background-color: blue;
            color: white;
            padding: 12px 24px;
            margin-top: 24px;
            margin-bottom: 24px;
        }

        input {
            border: 1px solid black;
            border-radius: 5px;
            width: 300px;
            margin: 0 30px;
            padding: 8px 12px;
        }
    </style>
</head>

<body class="body">
    <?php include('../Components/header.php') ?>
    <div id="update">
        <div class="txtTitle">Cập nhật thông tin</div>
        <div class="box-update">
            <form action="update.php" method="post" enctype="multipart/form-data">
                <table class="table-update">
                    <tr>
                        <td class="col1">Họ Tên :</td>
                        <td><input type="text" id="name" name="name" value="<?php echo $name ?>"></td>
                    </tr>
                    <tr>
                        <td class="col1">Email :</td>
                        <td><input type="text" id="email" name="email" value="<?php echo $email ?>"></td>
                    </tr>
                    <tr>
                        <td class="col1">Số điện thoại :</td>
                        <td><input type="text" id="phone" name="phone" value="<?php echo $phone ?>"></td>
                    </tr>
                    <tr>
                        <td class="col1">Ảnh đại diện :</td>
                        <td><input type="file" id="avatar" name="avatar" value="<?php echo $avatar ?>"></td>
                    </tr>
                    <tr>
                        <td class="col1">Mật khẩu cũ :</td>
                        <td><input type="text" id="old_pass" name="old_pass" value="<?php echo $old_pass ?>"></td>
                    </tr>
                    <tr>
                        <td class="col1">Mật khẩu mới :</td>
                        <td><input type="text" id="new_pass" name="new_pass" value="<?php echo $new_pass ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="update" class="btn" value="Cập nhật"></td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
    <?php include("../Components/footer.php") ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>
