@extends('admin.layouts.app')
@section('content')


	<main id="main" class="main">

	    <section class="section">
	      <div class="row">
	        <div class="col-lg-12">

	        @include('_message')

	        	<div class="card">
					<div class="card-body">
					  <h2 class="card-title fw-bold">Account Setting</h2>

					  <!-- General Form Elements -->
					  <form action="{{ url('admin/account/update/'.$getRecord->id) }}" method="post" enctype="multipart/form-data">

					  	{{ csrf_field() }}

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Username <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="text" name="name" class="form-control" value="{{ $getRecord->name }}">
					        <span style="color: red;">{{ $errors->first('name') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label class="col-sm-2 col-form-label">Email <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input type="email" name="email" class="form-control" value="{{ $getRecord->email }}">
					        <span style="color: red;">{{ $errors->first('email') }}</span>
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label for="inputNumber" class="col-sm-2 col-form-label">File Upload <span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input class="form-control" type="file" name="image">
					        @if($getRecord->image)
	                        	<img class="mt-3" width="100" height="100" src="{{ url('public/images/users/'.$getRecord->image) }}">
	                      	@endif
					      </div>
					    </div>

					    <div class="card-footer">
		                    <button type="submit" name="add_to_update" class="btn btn-primary" value=""> Update </button>
		                </div>

					  </form><!-- End General Form Elements -->

					</div>
				</div>

	        </div>
	      </div>
	    </section>

  </main><!-- End #main -->



@endsection