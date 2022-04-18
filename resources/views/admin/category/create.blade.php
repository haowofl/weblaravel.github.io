@extends('layouts.admin')
@section('title','Add Category')
@section('main')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset">
				<form method="POST" action="{{route('category.store')}}" role='form'>
				@csrf
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" name="name" type="text" placeholder="Nhập Tên Danh Mục">
						@error('name')
							<small class="help-block">{{massage}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Prioty</label>
						<input class="form-control" name="prioty" type="text" placeholder="Nhập quyền ưu tiên"></input>
						@error('name')
							<small class="help-block">{{massage}}</small>
						@enderror
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>	
				</form>
			</div>
		</div>
	</div>

@stop();