@extends('layouts.admin')
@section('title','Category List')
@section('main')
	<form action="" class="form-inline">
		<div class="form-group">
            <input class="form-control" name="key" placeholder="Search by name...">
		</div>
		<button type="submit" class="btn btn-primary">
			<i class="fas fa-search"></i>
		</button>
	</form>
    <a href="{{route('category.create')}}" class="btn btn-primary">Thêm</a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Total Product</th>
				<th>status</th>
				<th>Created Date</th>
				<th class="text-right">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $model)
			<tr>
				<td>{{$model->id}}</td>
				<td>{{$model->name}}</td>
				<td>{{$model->product->count() ?? ''}}</td>
				<td>
					@if($model->status == 0)
						<span class="badge badge-danger">Private</span>
					@else
						<span class="badge badge-success">Publish</span>
					@endif
				</td>
				<td>{{$model->created_at->format('d-m-Y')}}</td>
				<td class="text-right">
						<a href="{{route('category.edit',$model->id)}}" class="btn btn-sm btn-success">
							<i class="fas fa-edit"></i>
						</a>
						<a href="{{route('category.destroy',$model->id)}}" class="btn btn-sm btn-danger btn-delete">
							<i class="fas fa-trash"></i>
						</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<form method="POST" action="" id="form-delete">
		@csrf @method('DELETE')
	</form>

	<hr>
	<div class="">
		{{$data->appends(request()->all())->links()}}
	</div>
@stop();
@section('js')

	<script>
		$('.btn-delete').click(function(ev) {
			ev.preventDefault();
			var _href = $(this).attr('href');
			$('form#form-delete').attr('action',_href);

			if(confirm('Bạn có chắc không??')){
				$('form#form-delete').submit();
			}
		})
	</script>

@stop();
