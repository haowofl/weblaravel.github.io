@extends('layouts.site')
@section('main')
    <section class="cart padding-top-110 margin-bottom-20">
        <?php
        $content = Cart::content();
        ?>
        <div class="container">
            <div class="cart-top flex">
                <div class="pbarcart ">
                    <div class="text">Giỏ hàng</div>
                    <div class="bar"></div>
                    <div class="circle active"><i class="fas fa-shopping-cart"></i></div>
                </div>
                <div class="pbarcart">
                    <div class="text">Địa chỉ giao hàng</div>
                    <div class="bar"></div>
                    <div class="circle"><i class="fas fa-location"></i></div>
                </div>
                <div class="pbarcart">
                    <div class="text">Thanh toán</div>
                    <div class="bar"></div>
                    <div class="circle"><i class="fas fa-credit-card"></i></div>
                </div>
            </div>
            <div class="cart-content flex">
                <div class="cart-content-left">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($content as $model)
                        <tr>
                            <td><a href="#"><img width="100%" src="{{url('uploads')}}/{{$model->options->image}}"></a></td>
                            <td>
                                <p>{{$model->name}}</p>
                            </td>
                            <td><img width="30px" src="{{url('site')}}/assets/img/sp_color.png"></td>
                            <td>XL</td>
                            <td><input type="tex" name="product_quantity" value="{{$model->qty}}"></td>
                            <td><?php
                                $subtotal = $model->price * $model->qty;
                                echo $subtotal;
                                ?><sup>đ</sup></td>
                            <td><a href="{{route('cart.delete',$model->rowId)}}" class="none-a">X</a></td>

                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="cart-content-right flex">
                    <h5 class="margin-top-10">TỔNG TIỀN GIỎ HÀNG</h5>
                    <table>
                        <tbody>
                        <tr>
                            <td>TỔNG TIỀN HÀNG</td>
                            <td>{{Cart::priceTotal()}}<sup>đ</sup></td>
                        </tr>
                        <tr>
                            <td>Thuế</td>
                            <td>{{Cart::tax()}}<sup>đ</sup></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Thành tiền</td>
                            <td>{{Cart::total()}}<sup>đ</sup></td>
                        </tr>
                        </tfoot>

                    </table>
                    <div class="cart-content-right-text">
                        <p class="text-center">Bạn sẽ nhận được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000 đ</p>
                        <p class="text-center" style="color: red; font-weight: bold;">Mua thêm <span style="font-size: 16px;">1.370.000đ</span> để được miễn phí SHIP</p>
                    </div>
                    <div class="cart-content-right-btn weiht-blod text-center">
                        <a href="#" class="none-a">TIẾP TỤC MUA SẮM</a>
                        <a href="{{route('checkout.delivery')}}" class="none-a">THANH TOÁN</a>
                    </div>
                    <div class="cart-content-right-sigin">
                        <p>TÀI KHOẢN IVY</p>
                        <p>Hãy <a href="#">đăng nhập</a> tài khoản của bạn để được tích điểm thành viên</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop();
