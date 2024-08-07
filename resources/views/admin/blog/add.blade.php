@extends('admin.layouts.app')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ url('public/assets/tags/bootstrap-tagsinput.css') }}">
@endsection

@section('content')

	<main id="main" class="main">

	    <section class="section">
	      <div class="row">
	        <div class="col-lg-12">

	        @include('_message')

	        	<div class="card">
					<div class="card-body">
					  <h2 class="card-title fw-bold">Add Blog</h2>

					  <!-- General Form Elements -->
					  <form action="{{ url('admin/blog/add') }}" method="post" enctype="multipart/form-data">

					  	{{ csrf_field() }}


					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Title <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="title" class="form-control" required>
					        <span style="color: red;">{{ $errors->first('title') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-4">
		                    <label class="col-sm-2 col-form-label">Category<span style="color: red;">*</span></label>
		                    <div class="col-sm-10">
		                      <select class="form-control" name="category_id">
		                      	<option value="">Select Category</option>

		                      	@foreach($categoryRecord as $value)
		                      		<option value="{{ $value->id }}">{{ $value->name }}</option>
		                      	@endforeach

		                      </select>
		                    </div>
		                </div>

		                <div class="form-group row mb-3">
					      <label for="inputNumber" class="col-sm-2 col-form-label">Image <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input class="form-control" type="file" name="image">
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Description <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <textarea class="form-control" name="description" rows="4"></textarea>
					        <span style="color: red;">{{ $errors->first('description') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Meta Description <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <textarea class="form-control" name="meta_description" rows="4"></textarea>
					        <span style="color: red;">{{ $errors->first('meta_description') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Meta Keywords</label>
					      <div class="col-sm-10">
					        <input type="text" name="meta_keywords" class="form-control">
					        <span style="color: red;">{{ $errors->first('meta_keywords') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Tags</label>
					      <div class="col-sm-10">
					        <input type="text" name="tags" id="tags" class="form-control">
					      </div>
					    </div>

					    <div class="form-group row mb-4">
		                    <label class="col-sm-2 col-form-label">Publish <span style="color: red;">*</span></label>
		                    <div class="col-sm-10">
		                      <select class="form-control" name="isPublish" required>
		                      	<option value="0">Yes</option>
		                      	<option value="1">Not</option>
		                      </select>
		                    </div>
		                </div>

					    <div class="form-group row mb-4">
		                    <label class="col-sm-2 col-form-label">Status <span style="color: red;">*</span></label>
		                    <div class="col-sm-10">
		                      <select class="form-control" name="status" required>
		                      	<option value="0">Active</option>
		                      	<option value="1">Deactive</option>
		                      </select>
		                    </div>
		                </div>

					    <div class="card-footer">
		                    <button type="submit" class="btn btn-primary" value="">Add</button>
		                </div>

					  </form><!-- End General Form Elements -->

					</div>
				</div>

	        </div>
	      </div>
	    </section>

  </main><!-- End #main -->

@endsection

@section('script')
	<script src="{{ url('public/assets/tags/bootstrap-tagsinput.js') }}"></script>
	<script type="text/javascript">
		$("#tags").tagsinput();
	</script>
@endsection

