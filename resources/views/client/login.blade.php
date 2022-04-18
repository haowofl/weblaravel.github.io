<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('site')}}/assets/css/style_sign_in_up.css">
</head>
<body>
    <div class= "main">
        <form action="{{route('home.login_process')}}" method="POST" class="form" id="form-2">
            {{csrf_field()}}
            <h3 class ="heading">Thành viên Đăng Nhập</h3>
            <p class="desc">Cùng nhau học lập trình ❤ ❤ ❤ </p>

            <div class="spacer">
                <p class="desc"><?php
                    $message = Session::get('massage');
                    if ($message) {
                        echo $message;
                        $message = Session::put('massage');
                        $message = '';
                    }
                    ?>
                </p>
            </div>

            <div class="form-group">
                <label for="Email" class="form-label">Email</label>
                <input type="text" id="Email" name="email" rules ="required|email" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Nhập mật khẩu</label>
                <input type="password" id="password" name="password" rules ="required|min:6" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="Remember" class="form-label">Ghi nhớ mật khẩu</label>
                <input type="checkbox" id="remember" name="remember" class="form-control">
            </div>
            <button class="form-submit">Đăng Nhập</button>
            <div class="form-submit"><a style="color: #fff; text-decoration: none;" href="{{route('user.signup')}}">Đăng Ký</a></div>
        </form>

    </div>
    <script src="{{url('site')}}/assets/js/form-sign-in.js"></script>
    <script>

        /// mong muốn
        Validator('#form-2');


    </script>
</body>
</html>
