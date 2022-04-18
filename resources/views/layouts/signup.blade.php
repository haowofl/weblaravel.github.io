@extends('layouts.site')
@section('main')
<div class= "main">
    <form action="process_register.php" method="POST" class="form" id="form-1">
        <h3 class ="heading">Thành viên đăng ký</h3>
        <p class="desc">Cùng nhau học lập trình ❤ ❤ ❤ </p>

        <div class="spacer"></div>

        <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input type="text" id="fullname" name="name" placeholder="Hào Đức" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="Email" class="form-label">Email</label>
            <input type="text" id="Email" name="email" placeholder="VD: email@domain.com" class="form-control">
            <span class="form-message">
                </span>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Nhập mật khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="password-confirmation" class="form-label">Nhập lại mât khẩu </label>
            <input type="password" id="password-confirmation" name="password-confirmation" placeholder="Nhập lại mật khẩu" class="form-control">
            <span class="form-message"></span>
        </div>

        <button class="form-submit">Đăng Ký</button>

    </form>

</div>
<script src="./assets/js/form-register.js"></script>
<script>
    //Mong Muốn của chúng ta
    Validator({
        form: "#form-1",
        errorSelector: '.form-message',
        formGroup: '.form-group',
        rules: [
            Validator.isRequired('#fullname','Vui lòng nhập đầy đủ họ tên của bạn'),
            Validator.isRequired('#Email',''),
            Validator.isEmail('#Email'),
            Validator.minLength('#password',6),
            Validator.isRequired('#password-confirmation'),
            Validator.isConirmaed('#password-confirmation', function(){
                return document.querySelector('#form-1 #password').value;
            },'Mật khẩu của bạn không chính xác vui lòng nhập lại'),
        ],
        // onsubmit: function(data){
        //     console.log(data)
        // }
    });

</script>
@stop();
