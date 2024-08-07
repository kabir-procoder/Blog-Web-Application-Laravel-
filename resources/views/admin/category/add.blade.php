@extends('admin.layouts.app')
@section('content')


	<main id="main" class="main">

	    <section class="section">
	      <div class="row">
	        <div class="col-lg-12">

	        @include('_message')

	        	<div class="card">
					<div class="card-body">
					  <h2 class="card-title fw-bold">Add Category</h2>

					  <!-- General Form Elements -->
					  <form action="{{ url('admin/category/add') }}" method="post" enctype="multipart/form-data">

					  	{{ csrf_field() }}

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Name <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="name" class="form-control" required>
					        <span style="color: red;">{{ $errors->first('name') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Slug <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="slug" class="form-control" required>
					        <span style="color: red;">{{ $errors->first('slug') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Title <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="title" class="form-control" required>
					        <span style="color: red;">{{ $errors->first('title') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Meta Title <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="meta_title" class="form-control" required>
					        <span style="color: red;">{{ $errors->first('meta_title') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Meta Description <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="meta_description" class="form-control" required>
					        <span style="color: red;">{{ $errors->first('meta_description') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Meta Keywords <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="meta_keywords" class="form-control" required>
					        <span style="color: red;">{{ $errors->first('meta_keywords') }}</span>
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