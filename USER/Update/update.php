<?php
include('../Components/ketnoi.php');
$user_name_cookie = $_COOKIE["username"];
$user_name;
$pass = "";
$re_pass = "";
$pass_old = "";
$salt;
$avatar;
$sql_user = "SELECT `UserName`, `Password`, `Salt`, `Avatar` FROM `user` WHERE `UserName` = '$user_name_cookie'";
$result_sql = $conn->query($sql_user);
if ($result_sql->num_rows > 0) {
    $row = $result_sql->fetch_assoc();
    $user_name = $row['UserName'];
    $pass = $row['Password'];
    $salt = $row['Salt'];
    $avatar = $row['Avatar'];
} else {
    echo 'Khong co ban ghi nao';
}
if (isset($_POST["update"]) && $_POST["update"]) {
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $old_pass = addslashes($_POST['old_pass']);
    $new_pass = addslashes($_POST['new_pass']);
    $re_pass = addslashes($_POST['re_pass']);
    $avatar_path = addslashes($_FILES["avatar"]["name"]);
    $target_dir = "../Uploads/User/$user_name_cookie/";
    // Kiểm tra thư mục đã tồn tại hay chưa
    if ($avatar_path) {
        if (!file_exists($target_dir))
            mkdir($target_dir);

        $target_file = $target_dir . basename($avatar_path);
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $avatar = $avatar_path;
        } else {
            echo '<script language="javascript">alert("Upload không thành công"); window.location="index.php";</script>';
        }
    }
    if ($new_pass) {
        $pass_old = $old_pass . $salt;
        $pass_old = md5($pass_old);
        if ($pass !== $pass_old) {
            echo '<script>alert("Nhập mật khẩu cũ không chính xác"); window.location="index.php";</script>';
            exit;
        }
        if ($pass !== $re_pass) {
            echo '<script>alert("Nhập lại mật khẩu không đúng"); window.location="index.php";</script>';
            exit;
        }
        if ($old_pass == $new_pass) {
            echo '<script>alert("Mật khẩu cũ bị trùng với mật khẩu mới"); window.location="index.php";</script>';
            exit;
        }
        $salt = strtotime("now");
        $pass = $new_pass . $salt;
        $pass = md5($pass);
    }
    $sql_update = "UPDATE `user` SET `Name`='$name',`Email`='$email',`Password`='$pass',`Salt`='$salt',`Phone`='$phone',`Avatar`='$avatar' WHERE `UserName` = '$user_name_cookie'";
    $result = $conn->query($sql_update);
    if ($result) {
        echo '<script>alert("Cập nhật thành công"); window.location="../TABHOME";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php";</script>';
    }
} else {
    echo '<script language="javascript">alert("Cập nhật không thành công"); window.location="index.php";</script>';
}
