@extends('layouts.admin')
@section('title','Update Product')
@section('main')
    <form method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" type="text" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="content" class="form-control" >{{$product->description}}</textarea>
                </div>
            <!-- <div class="form-group">
									<label>Image List</label>
									<input class="form-control" name="image_list" type="text" placeholder="....">
									@error('image_list')
                <small class="help-block">{{massage}}</small>
									@enderror
                </div> -->
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" name="price" type="number" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" required="required">
                        <option value="">---SELECT ONE---</option>
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <small class="help-block">{{massage}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Chọn Ảnh Mới</label>
                    <input class="form-control" name="file_upload" type="file">
                    <label>Ảnh cũ</label>
                    <div><img src="{{url('uploads')}}/{{$product->image}}" width="120"></div>
                    <input type="hidden" name="file_old" class="form-control" value="{{$product->image}}"
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Data</button>
    </form>

@stop();

@section('css')
    <link rel="stylesheet" href="{{url('admyn')}}/plugins/summernote/summernote-bs4.min.css">
@stop
@section('js')
    <script src="{{url('admyn')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            // Summernote
            $('#content').summernote({
                height:250,
                placeholder:"Product Description"
            });

        })
    </script>
@stop
