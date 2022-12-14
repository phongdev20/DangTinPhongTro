<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #register {
            margin: 100px auto;
            max-width: 600px;
            display: flex;
            flex-direction: column;
        }

        #register .txtTitle {
            border-radius: 16px 16px 0 0;
            background-color: blue;
            color: white;
            font-size: 24px;
            padding: 12px;
        }

        #register .box-register {
            padding-top: 32px;
            border: 1px solid blue;
            background-color: white;
            border-radius: 0 0 16px 16px;
        }

        #register .col1 {
            text-align: right;
            padding-right: 60px;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 20px;
            padding-left: 40px;
            font-weight: bold;
        }

        #register .col2 {
            width: 300px;
        }

        #register .btn {
            background-color: blue;
            color: white;
            padding: 12px 24px;
            margin-top: 24px;
            margin-bottom: 24px;
            border: 1px solid black;
            border-radius: 5px;
            text-decoration: none;
        }

        input {
            border: 1px solid black;
            border-radius: 5px;
            width: '100%';
            margin: 0 16px;
            padding: 10px 12px;
        }

        .body {
            background-image: url(./../ASSETS/img/background1.jpg);
        }
    </style>
</head>

<body class="body">
    <div id="register">
        <div class="txtTitle">Đăng ký thành viên mới</div>
        <div class="box-register">
            <form action="register.php" method="post">
                <table class="table-register">
                    <tr>
                        <td class="col1">Tài khoản :</td>
                        <td class="col2"><input type="text" id="username" name="username"></td>
                    </tr>
                    <tr>
                        <td class="col1">Mật khẩu :</td>
                        <td><input type="password" id="pass" name="pass"></td>
                    </tr>
                    <tr>
                        <td class="col1">Nhập lại mật khẩu :</td>
                        <td><input type="password" id="re_pass" name="re_pass"></td>
                    </tr>
                    <tr>
                        <td class="col1">Họ Tên :</td>
                        <td><input type="text" id="name" name="name"></td>
                    </tr>
                    <tr>
                        <td class="col1">Email :</td>
                        <td><input type="text" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="btn_submit" class="btn" value="Đăng ký">
                            <a href="../index.php" class="btn">Trở lại</a>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</body>

</html>
