@extends('layouts.site')
@section('main')
    <section class ="cartegory margin-top-70">
        <div class="container flex">
            <div class="" id="dieuhuong">
				<ul class="list-inline flex">
					<li><a href="#">Trang chủ</a> <span>→</span></li>
					<li><a href="#">{{$cat_id->name}}</a> <span>→</span></li>
					<li><a href="#">Bộ sưu tập</a></li>
				</ul>
			</div>
        </div>

        <div class="container flex">
            <div class="cartegory-left">
                <div class="nav-side-menu margin-top-10">
                    @foreach($category as $model)
                	<div class="brand1">
                		<div class="margin-bottom-10">
                			<a href="#">{{$model->name}}</a>
                		</div>
                		<div class="menu-list">
                			<ul>
                				<li><a href="">Hàng mới về</a></li>
                				<li><a href="">Áo +</a></li>
                			</ul>
                		</div>
                	</div>
                    @endforeach
                </div>
            </div>
            <div class="cartegory-right flex">
                <div class="cartegory-right-top flex">
                	<div class="cartegory-right-top-item">
                    	    <h3>Hàng {{$cat_id->name}} mới về</h3>
                	</div>
                	<div class="cartegory-right-top-item">
                    	<button>
                        	<span>Bộ lọc</span>
                    	</button>
                	</div>
                	<div class="cartegory-right-top-item">
                    	<select name="" id="">
                        	<option value="">Sắp xếp</option>
                        	<option value="">Giá: cao đến thấp</option>
                        	<option value="">Giá: Thấp đến cao</option>
                    	</select>
                	</div>
                </div>
                <div class="cartegory-right-content flex">
                    @foreach($product as $model)
                	<div class="cartegory-right-content-item">
                        <a class="none-a"href="{{route('home.product_detail',$model->id)}}">
                            <input type="hidden" name="category_id" value="{{$model->category_id}}" />
                            <img src="{{url('uploads')}}/{{$model->image}}">
                            <div class="margin-top-10">
                                <p>{{$model->name}}</p>
                                <p>{{$model->price}}<sup>đ</sup></p>
                            </div>
                        </a>
                	</div>
                    @endforeach
            </div>
                <div class="cartegory-right-bottom flex">
                    <div class="cartegory-right-bottom-item">
                        <p>Hiện thị 2<span>|</span>4 sản phẩm</p>
                    </div>
                    <div class="cartegory-right-bottom-item">
                        </span>{{$product->appends(request()->all())->links()}}<span>
                    </div>
                </div>
        </div>
        </div>

    </section>
    <script src="{{ asset('site/assets/js/slid.js')}}">
    </script>
@stop()
