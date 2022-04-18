@extends('layouts.admin')
@section('title','Add Slide')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset">
                <form method="POST" action="{{route('slide.store')}}" role='form' enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" type="text" placeholder="Nhập tên Ảnh">
                        @error('name')
                        <small class="help-block">{{massage}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" name="file_upload" type="file" placeholder="....">
                    </div>
                    <button type="submit" class="btn btn-primary">Save data</button>
                </form>
            </div>
        </div>
    </div>

@stop();
