@extends('layouts.site')
@section('main')
    <section class="delivery padding-top-110">
        <div class="container">
            <div class="cart-top flex">
                <div class="pbarcart ">
                    <div class="text">Giỏ hàng</div>
                    <div class="bar"></div>
                    <div class="circle "><i class="fas fa-shopping-cart"></i></div>
                </div>
                <div class="pbarcart">
                    <div class="text">Địa chỉ giao hàng</div>
                    <div class="bar"></div>
                    <div class="circle active"><i class="fas fa-map-marker-alt"></i></div>
                </div>
                <div class="pbarcart">
                    <div class="text">Thanh toán</div>
                    <div class="bar"></div>
                    <div class="circle"><i class="fas fa-credit-card"></i></div>
                </div>
            </div>
        </div>
        <?php
        $user_id = Session::get('user_id');
        ?>
        <div class="container">
            <div class="delivery-content flex">
                <div class="delivery-content-left">
                    <h5 class="padding-rl-15">Vui lòng chọn địa chỉ giao hàng</h5>
                    <form method="POST" action="{{route('checkout.addOrder')}}">
                    {{csrf_field()}}
                    <div class="flex">
                         <div class="padding-rl-15">
                            <p>Họ tên <span style="color: red;">*</span></p>
                            <input type="text" name="name" class="required-form">
                            <input type="hidden" name="user_id" class="required-form" value="{{$user_id}}">
                        </div>
                        <div class="padding-rl-15">
                            <p>Điện thoại <span style="color: red;">*</span></p>
                            <input type="text" name="number_phone" class="required-form">
                        </div>
                    </div>
                    <div class="">
                        <div class="padding-rl-15">
                            <p>Địa chỉ <span style="color: red;">*</span></p>
                            <input type="text" name="address" class="required-form">
                        </div>
                    </div>

                    <div class="flex">
                        <div class="padding-rl-15 pay-btn flex">
                            <a class="none-a" href="#"><< Quay lại giỏ hàng</a>
                            <button>Thanh toán và giao hàng</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="delivery-content-right">
                    <table>
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giảm giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        @foreach ($carts as $cart)
                        <tbody>
                        <tr>
                            <td>
                                <p>{{$cart->name}}</p>
                            </td>
                            <td>0</td>
                            <td>{{$cart->qty}}</td>
                            <td><p>{{$cart->price * $cart->qty}} <sup>đ</sup></p></td>
                        </tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                        <tr>
                            <td colspan="3">Tổng tiền hàng</td>
                            <td class="weiht-blod"><p>{{$priceTotal}}<sup>đ</sup></p></td>
                        </tr>
                        <tr>
                            <td colspan="3">Thuế VAT</td>
                            <td class="weiht-blod">{{$tax}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">Thành tiền</td>
                            <td class="weiht-blod"><p>{{$total}} <sup>đ</sup></p></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop();
