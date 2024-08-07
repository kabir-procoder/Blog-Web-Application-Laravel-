@extends('admin.layouts.app')
@section('content')


	<main id="main" class="main">

	    <section class="section">
	      <div class="row">
	        <div class="col-lg-12">

	        @include('_message')

	        	<div class="card">
					<div class="card-body">
					  <h2 class="card-title fw-bold">Seo Update</h2>

					  <!-- General Form Elements -->
					  <form action="{{ url('admin/seo/update') }}" method="post" enctype="multipart/form-data">

					  	{{ csrf_field() }}

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Slug <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="slug" class="form-control" value="{{ @$getRecord[0]->slug }}" required>
					        <span style="color: red;">{{ $errors->first('slug') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Title <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="title" class="form-control" value="{{ @$getRecord[0]->title }}" required>
					        <span style="color: red;">{{ $errors->first('title') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Description <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <textarea name="description" class="form-control" rows="5" required>{{ @$getRecord[0]->description }}</textarea>
					        <span style="color: red;">{{ $errors->first('description') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Meta Title <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="meta_title" class="form-control" value="{{ @$getRecord[0]->meta_title }}" required>
					        <span style="color: red;">{{ $errors->first('meta_title') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Meta Description <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <textarea name="meta_description" class="form-control" rows="5" required>{{ @$getRecord[0]->meta_description }}</textarea>
					        <span style="color: red;">{{ $errors->first('meta_description') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Meta Keywords <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="meta_keywords" class="form-control" value="{{ @$getRecord[0]->meta_keywords }}" required>
					        <span style="color: red;">{{ $errors->first('meta_keywords') }}</span>
					      </div>
					    </div>

					    <input type="hidden" name="id" value="{{ @$getRecord[0]->id ? $getRecord[0]->id : '' }}">

					    <div class="card-footer">
		                    <button type="submit" name="add_or_update" class="btn btn-primary" value="{{ count($getRecord)>0 ? 'Update' : 'Add' }}">{{ count($getRecord)>0 ? 'Update' : 'Add' }}</button>
		                    <a href="" class="btn btn-default float-right">Cancel</a>
		                </div>

					  </form><!-- End General Form Elements -->

					</div>
				</div>

	        </div>
	      </div>
	    </section>

  </main><!-- End #main -->



@endsection