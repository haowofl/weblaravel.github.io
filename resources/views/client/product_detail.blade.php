@extends('layouts.site')
@section('main')
<div id="product">
    <div class="container flex">
        <div class="product-content flex">
            <div class="product-content-left flex">
                <div class="demowrap">
                    <img src="{{url('uploads')}}/{{$product->image}}">
                </div>
                <input type="hidden" id="arrhidden" value="{{$product->image_list}}">
                <div id="show_image_list" class="elastislide-wrapper">

                </div>
            </div>

            <div class="produc-content-right">
                <h1 class="cat_h1 margin-bottom-10">{{$product->name}}</h1>
                <p class="ID_productDetail margin-bottom-10">MSP: {{$product->id}}</p>
                <p class="price_productDetail margin-bottom-10">
						<span>
							<small>{{$product->price}}</small><sup>đ</sup>
						</span>
                </p>

                <ul class="color_productDetail list-inline margin-bottom-20">
                    <li class="margin-bottom-10">
                        <span class="weiht-blod">Màu sắc:</span>
                        <span>Đỏ</span>
                        <span style="color:red;">*</span>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{url('site')}}/assets/img/sp_color.png">
                        </a>
                    </li>
                </ul>
                <ul class="size_productDetail list-inline margin-bottom-10">
                    <li>
                        <span class="weiht-blod">Size:</span>
                    </li>
                    <li>
                        <ul class="list-inline flex">
                            <li>S</li>
                            <li>M</li>
                            <li>L</li>
                            <li>XL</li>
                        </ul>
                    </li>
                </ul>
                <form action="{{route('cart.save_cart')}}" method="POST">
                    {{csrf_field()}}
                    <p class="value_productDetail">
                        <span class="weiht-blod">Số lương:</span>
                        <input type="number" min= "1" value="1" name="quantity">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                    </p>
                    <p class="hiddens_productDetail margin-bottom-10"><span class="vuilongchon color-red">Vui lòng chọn size</span></p>
                    <p class="button_productDetail">
                        <button class="hidden"><i class="fas fa-basket-shopping"></i>Hết Hàng</button>
                        <button class=""><i class="fas fa-basket-shopping"></i>MUA HÀNG</button>
                    </p>
                </form>
                <div class="form_showroom">
                    <a href="#">TÌM TẠI CỬA HÀNG</a>
                </div>
                <ul class="list-inline phone-chat-mail flex">
                    <li><a href="#"><img width="10px" src="{{url('site')}}/assets/img/phone-icon.png">Hotline</a></li>
                    <li><a href="#"><img width="15px" src="{{url('site')}}/assets/img/chat-icon.png">Chat</a></li>
                    <li><a href="#"><img width="15px" src="{{url('site')}}/assets/img/mail-icon.png">Mail</a></li>
                </ul>
                <div class="qrcode">
                    <img width="50px" src="{{url('site')}}/assets/img/qrcode.png">
                </div>
                <hr>
                <p class="productDetail_buttonShow">
                    <i class="fas fa-angle-down productDetail_buttonShow_btn"></i>
                </p>
                <div class="productDetail-hidden hidden">
                    <div class="productDetail-hidden-title flex">
                        <div id="detail" class="productDetail-hidden-title-item">
                            <p>Chi tiết</p>
                        </div>
                        <div id="preserve" class="productDetail-hidden-title-item ">
                            <p>Bảo quản</p>
                        </div>
                        <div class="productDetail-hidden-title-item">
                            <p>Tham khảo size</p>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tabpanel-detail">
                            <p> {{$product->description}}</p>
                        </div>
                        <div class="tabpanel-preserve">
                            <p>Chi tiết bảo quản sản phẩm :&nbsp;</p>
                            <p>* Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn.</p>
                            <p>* Vải voan , lụa , chiffon nên giặt bằng tay.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="product-related">
            <div class="product-related-title">
                <p>SẢN PHẨM LIÊN QUAN</p>
            </div>
            <div class="product-content flex">
                <div class="product-related-item">
                    <img src="{{url('site')}}/assets/img/pr1.JPG">
                    <h1>TWEED DRESS MS 48M7059</h1>
                    <small>1.300.000</small><sup>đ</sup>
                </div>
                <div class="product-related-item">
                    <img src="{{url('site')}}/assets/img/item1.png">
                    <h1>TWEED DRESS MS 48M7059</h1>
                    <small>1.300.000</small><sup>đ</sup>
                </div>
                <div class="product-related-item">
                    <img src="{{url('site')}}/assets/img/item2.png">
                    <h1>TWEED DRESS MS 48M7059</h1>
                    <small>1.300.000</small><sup>đ</sup>
                </div>
                <div class="product-related-item">
                    <img src="{{url('site')}}/assets/img/item3.png">
                    <h1>TWEED DRESS MS 48M7059</h1>
                    <small>1.300.000</small><sup>đ</sup>
                </div>
                <div class="product-related-item">
                    <img src="{{url('site')}}/assets/img/item4.png">
                    <h1>TWEED DRESS MS 48M7059</h1>
                    <small>1.300.000</small><sup>đ</sup>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{url('site')}}/assets/js/product.js"></script>
    <script>
        let _link = document.getElementById('arrhidden').value;
        let _html = '';

        if (/^[\],:{}\s]*$/.test(_link.replace(/\\["\\\/bfnrtu]/g, '@').
        replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
        replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
            let _arr = JSON.parse(_link);
            for(let _i = 0; _i < _arr.length; _i++) {
                let _url = "{{url('uploads')}}" + '/' +_arr[_i];
                _html += '<img src="'+_url+'">';
            }

        }
        let _element = document.querySelector('#show_image_list')
        _element.innerHTML = _html;
    </script>
</div>
@stop();
