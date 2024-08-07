@extends('admin.layouts.app')
@section('content')


	<main id="main" class="main">

	    <section class="section">
	      <div class="row">
	        <div class="col-lg-12">

	        @include('_message')

	        	<div class="card">
					<div class="card-body">
					  <h2 class="card-title fw-bold">Logo</h2>

					  <!-- General Form Elements -->
					  <form action="{{ url('admin/logo/update') }}" method="post" enctype="multipart/form-data">

					  	{{ csrf_field() }}

					  	<div class="form-group row mb-3">
					      <label for="inputNumber" class="col-sm-2 col-form-label">Favicon<span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input class="form-control" type="file" name="favicon">
					        @if($getRecord[0]->favicon)
	                        	<img class="mt-2" width="100" height="100" src="{{ url('public/images/logo/'.$getRecord[0]->favicon) }}">
	                      	@endif
					      </div>
					    </div>

					    <div class="form-group row mb-3">
					      <label for="inputNumber" class="col-sm-2 col-form-label">Main Logo<span style="color: red;">*</span></label>
					      <div class="col-sm-10">
					        <input class="form-control" type="file" name="mainlogo">
					        @if($getRecord[0]->mainlogo)
	                        	<img class="mt-2" width="100" height="100" src="{{ url('public/images/logo/'.$getRecord[0]->mainlogo) }}">
	                      	@endif
					      </div>
					    </div>

					    <input type="hidden" name="id" value="{{ @$getRecord[0]->id ? $getRecord[0]->id : '' }}">

					    <div class="card-footer">
		                    <button type="submit" name="add_to_update" class="btn btn-primary" value="{{ @count($getRecord)>0 ? 'Update' : 'Add' }}"> {{ @count($getRecord)>0 ? 'Update' : 'Add' }} </button>
		                </div>

					  </form><!-- End General Form Elements -->

					</div>
				</div>

	        </div>
	      </div>
	    </section>

  </main><!-- End #main -->



@endsection