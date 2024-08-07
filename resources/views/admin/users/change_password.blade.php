@extends('admin.layouts.app')
@section('content')


	<main id="main" class="main">

	    <section class="section">
	      <div class="row">
	        <div class="col-lg-12">

	        @include('_message')

	        	<div class="card">
					<div class="card-body">
					  <h2 class="card-title fw-bold">Change Password</h2>

					  <!-- General Form Elements -->
					  <form action="{{ url('admin/change/password') }}" method="post" enctype="multipart/form-data">

					  	{{ csrf_field() }}

					    <div class="form-group row mb-3">
					      <label for="inputPassword" class="col-sm-2 col-form-label">Old Password</label>
					      <div class="col-sm-10">
					        <input type="password" name="old_password" class="form-control">
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
					      <div class="col-sm-10">
					        <input type="password" name="new_password" class="form-control">
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
					      <div class="col-sm-10">
					        <input type="password" name="confirm_password" class="form-control">
					      </div>
					    </div>

					    <div class="card-footer">
		                    <button type="submit" name="add_to_update" class="btn btn-primary" value=""> Update Password </button>
		                </div>

					  </form><!-- End General Form Elements -->

					</div>
				</div>

	        </div>
	      </div>
	    </section>

  </main><!-- End #main -->



@endsection