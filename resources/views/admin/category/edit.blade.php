@extends('layouts.admin')
@section('title','Edit Category')
@section('main')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset">
				<form method="POST" action="{{route('category.update',$category->id)}}" role='form'>
				@csrf @method('PUT')
				<input type="hidden" name="id" value="{{$category->id}}">
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" name="name" type="text" value="{{$category->name}}">
						@error('name')
						<small class="help-block">{{massage}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Status</label>
						<div class="radio">
							<label>
								<input type="radio" name="status" value="1">
								Publish
							</label>
							<label>
								<input type="radio" name="status" value="0">
								Private
							</label>
						</div>
					</div>
					<div class="form-group">
						<label>Prioty</label>
						<input class="form-control" name="prioty" type="number" value="{{$category->prioty}}"></input>
						@error('prioty')
						<small class="help-block">{{massage}}</small>
						@enderror
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>

@stop();
