@extends('layouts.admin')
@section('title','Add Category')
@section('main')
					<form method="POST" action="{{route('products.store')}}" role='form' enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" name="name" type="text" placeholder="....">
									@error('name')
										<small class="help-block">{{massage}}</small>
									@enderror
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea name="description" id="content" class="form-control" placeholder="...."></textarea>

									@error('description')
										<small class="help-block">{{massage}}</small>
									@enderror
								</div>
                                <div class="form-group">
									<label>Image List</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" id="image_list" name="image_list" type="hidden" placeholder="....">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_image_list"><i class="fa fa-folder-open"></i></button>
                                            </span>
                                        </div>
                                    </div>

									<div class="row" id="show_image_list">

                                    </div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Price</label>
                                    <input class="form-control" name="price" type="number" placeholder="....">
									@error('price')
										<small class="help-block">{{massage}}</small>
									@enderror
								</div>
								<div class="form-group">
									<label>Category</label>
									<select name="category_id" class="form-control" required="required">
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
									<label>Image</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" id="image" name="image" type="text" placeholder="....">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalimage"><i class="fa fa-folder-open"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="show_image">

                                    </div>

									@error('price')
										<small class="help-block">{{massage}}</small>
									@enderror
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Save Data</button>
					</form>

                    <!-- Modal -->
                    <div class="modal fade" id="modalimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-custom" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <iframe src="{{url('files/dialog.php?field_id=image')}}" style="width:100%;height:500px;overflow:auto; border:none"></iframe>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal image_list -->
                    <div class="modal fade" id="modal_image_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-custom" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal image_list</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <iframe src="{{url('files/dialog.php?field_id=image_list')}}" style="width:100%;height:500px;overflow:auto; border:none"></iframe>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
	</div>

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

	  });
      $('#modalimage').on('hidden.bs.modal', function (event) {
        let _link = $('input#image').val();
        let _img = "{{url('uploads')}}" + '/' + _link;
        let _html = '';
        _html += '<img src="'+_img+'" style="width:100%">';
          $('#show_image').html(_html);
      })
      $('#modal_image_list').on('hidden.bs.modal', function (event) {
          let _link = $('input#image_list').val();
          let _html = '';

          if (/^[\],:{}\s]*$/.test(_link.replace(/\\["\\\/bfnrtu]/g, '@').
          replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
          replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
              let _arr = $.parseJSON(_link);

                  for(let _i = 0; _i < _arr.length; _i++) {
                      let _url = "{{url('uploads')}}" + '/' +_arr[_i];
                      _html += '<div class="col-md-4">';
                      _html += '<img src="'+_url+'" style="width:100%">';
                      _html += '</div>';
                  }

          }
          let _url = "{{url('uploads')}}" + '/' +_link;
          _html += '<div class="col-md-4">';
          _html += '<img src="'+_url+'" style="width:100%">';
          _html += '</div>';
          $('#show_image_list').html(_html);
      })
	</script>
@stop
