<?php Session::start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{url('site')}}/assets/css/style.css">;
    <link rel="stylesheet" type="text/css" href="{{url('site')}}/assets/css/style_sign_in_up.css">;
	<script src="https://kit.fontawesome.com/fba1acef77.js" crossorigin="anonymous"></script>
	<title>14/2</title>
</head>
<body>
	<!-- Header -->
	<div id="header">
			<div class="header_nav">
				<ul class="nav">
					<li>
						<img class="home_icon" src="{{url('site')}}/assets/img/home_icon.png">
					</li>
					<li>
						<a href="{{route('home.index')}}">Trang Chủ</a>
					</li>
                    @foreach($category as $model)
                        <li>
                            <a href="{{route('home.cat_product',$model->id)}}">{{$model->name}}</a>
                        </li>
                    @endforeach
				</ul>
			</div>

			<div class="header_right">
				<div class="header_cart">
					<a href="{{route('cart.show_cart')}}"><img class="cart_icon" src="{{url('site')}}/assets/img/Cart-01.svg"></a>
				</div>
				<div class="header_search">
                    <form action="">
                        <div class="wrap_search">
                            <button type="submit"><img class="search_icon" src="{{url('site')}}/assets/img/search-outline.svg"></button>
                            <input type="text" name="key" placeholder="Tìm kiếm...">
                        </div>
                    </form>
				</div>
               <?php
                $id = Session::get('user_id');
                if ($id != NULL) { ?>
                    <div class="header_user">
                        <a href="#">
                            Đăng Xuất
                        </a>
                    </div>
                <?php
                }else {?>
                <div class="header_user">
                    <a href="{{route('home.login')}}">
                        Đăng Nhập
                    </a>
                </div>
				<?php }?>
			</div>
	</div>
	<!-- Header end -->
	@yield('main')
	<!-- Footer -->
	<div id="footer">
		<div class="socials-list">
    		<a href=""><i class="fab fa-facebook-square"></i></a>
        	<a href=""><i class="fab fa-instagram"></i></a>
        	<a href=""><i class="fab fa-youtube"></i></a>
        	<a href=""><i class="fab fa-pinterest-p"></i></a>
        	<a href=""><i class="fab fa-twitter"></i></a>
        	<a href=""><i class="fab fa-linkedin-in"></i></a>
		</div>
		<p class="copyright">Made by Đức Hào</p>
	</div>
@yield('search')
</body>
<script src="{{url('site')}}/assets/js/slid.js"></script>
</html>
