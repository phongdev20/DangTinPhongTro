<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #login {
            margin-top: 200px;
            display: flex;
            justify-content: center;
        }

        #login .txtTitle {
            background-color: blue;
            color: white;
            font-size: 24px;
            padding: 12px;
            margin-bottom: 32px;
        }

        #login .box-login {
            border: 1px solid blue;
        }

        #login .col1 {
            text-align: right;
            padding-right: 80px;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 20px;
            padding-left: 60px;
            font-weight: bold;
        }

        #login .col2 {
            width: 300px;
        }

        #login .btn {
            background-color: blue;
            color: white;
            padding: 12px 24px;
            margin-top: 24px;
            margin-bottom: 24px;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid black;
        }

        input {
            border: 1px solid black;
            border-radius: 5px;
            width: '100%';
            margin: 0 12px;
            padding: 8px 12px;
        }

        .boxRegister {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .capcha {
            height: 40px;
            width: 120px;
        }
    </style>
    <script src='https://www.google.com/recaptcha/api.js?hl=vi' async defer></script>

</head>

<body>
    <div id="login">
        <div class="box-login">
            <p class="txtTitle">Đăng Nhập</p>
            <form action="login.php" method="post">
                <table class="table-login">
                    <tr>
                        <td class="col1">Tài khoản :</td>
                        <td class="col2"><input type="text" id="username" name="username" placeholder="Nhập tài khoản"></td>
                    </tr>
                    <tr>
                        <td class="col1">Mật khẩu :</td>
                        <td><input type="password" id="pass" name="pass" placeholder="Nhập mật khẩu"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" class="g-recaptcha" data-sitekey="6Le9mHYjAAAAAAvn_QkrOslFB3ssH4eGKHENqf0p"></td>

                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="btn_submit" class="btn" value="Đăng nhập">
                            <p id="mess"></p>
                        </td>

                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <div class="boxRegister">
                                <h4>Nếu bạn chưa có tài khoản. Mời bạn nhấn vào </h4>
                                <a href="./Register" style="text-decoration: none; margin-left: 4px; margin-right: 4px;">Đăng ký</a>
                                <h4>để đăng ký</h4>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>
