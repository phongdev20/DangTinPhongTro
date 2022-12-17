<?php
include('../Components/ketnoi.php');
$id = $_GET["id"];
$user_name;
$salt;
$sql = "SELECT `UserName`, `Password`, `Salt` FROM `user` WHERE `ID` = '$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_name = $row['UserName'];
    $salt = $row['Salt'];
} else {
    echo 'Khong co ban ghi nao';
}
if (isset($_POST["update"])) {
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $role = addslashes($_POST['role']);
    $avatar = "";
    $avatar_path = addslashes($_FILES["avatar"]["name"]);
    $target_dir = "../../USER/Uploads/User/$user_name/";
    // Kiểm tra thư mục đã tồn tại hay chưa
    if ($avatar_path) {
        if (!file_exists($target_dir)) {
            mkdir($target_dir);
        }
        $target_file = $target_dir . basename($avatar_path);
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $avatar = $avatar_path;
        } else {
            echo '<script language="javascript">alert("Upload không thành công"); window.location="../../User";</script>';
        }
    }
    $sql_update = "UPDATE `user` SET `Name`='$name',`Email`='$email',`Password`='$pass',`Salt`='$salt',`Phone`='$phone',`Avatar`='$avatar',`Role`='$role' WHERE `ID` = '$id'";
    $result = $conn->query($sql_update);
    if ($result) {
        echo '<script>alert("Cập nhật thành công"); window.location="../../User";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../../User";</script>';
    }
} else {
    echo '<script language="javascript">alert("Cập nhật không thành công"); window.location="../../User";</script>';
}
