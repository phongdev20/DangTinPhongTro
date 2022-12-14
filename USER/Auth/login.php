<?php
session_start();
if (isset($_POST['btn_submit'])) {

    $captcha;
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
    }
    if (!$captcha) {
        echo '<script>alert("Xác thực không thành công"); window.location="../Auth";</script>';
        exit;
    } else {
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le9mHYjAAAAANQhAQLv3QCN4JsHNeEcQbLrFLj6&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response['success'] == false) {
            echo '<script>alert("Xác thực không thành công"); window.location="../Auth";</script>';
            exit;
        } else {
            if (!isset($_POST['username'])) {
                die('');
            }

            include('../Components/ketnoi.php');

            header('Content-Type: text/html; charset=UTF-8');

            $username = addslashes($_POST['username']);
            $pass = addslashes($_POST['pass']);

            if (!$username || !$pass) {
                echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); window.location="../Auth";</script>';
                exit;
            }

            $salt;
            $sqlSalt = "SELECT `Salt` FROM `user`WHERE `UserName` = '$username'";
            $resultSalt = $conn->query($sqlSalt);
            if ($resultSalt->num_rows > 0) {
                while ($row = $resultSalt->fetch_assoc()) {
                    $salt = $row['Salt'];
                }
            }

            $pass .= $salt;
            $pass = md5($pass);

            $sql = "SELECT * FROM `user` WHERE `UserName` = '$username' AND `Password` = '$pass'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 day
                // $_COOKIE[$cookie_name];
                // $_SESSION['username'] = $username;
                // echo $_SESSION['username'];
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                echo '<script language="javascript">window.location="../TABHOME";</script>';
            } else {
                echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng"); window.location="../Auth";</script>';
            }
        }
    }
}
