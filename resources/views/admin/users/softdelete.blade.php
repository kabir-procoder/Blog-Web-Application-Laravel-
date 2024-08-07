@extends('admin.layouts.app')
@section('content')



<main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          @include('_message')

          <div class="card">
            <div class="card-body p-3">
              <div class="header-button d-flex">
                <a href="{{ url('admin/users') }}" type="button" class="btn btn-primary text-white">Back to List</a>
              </div>
            </div>
          </div>

          

          {{-- Admin Table --}}
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-bold">SoftDelete List</h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">          
      				  <table class="table table-bordered table-hover">
      				    <thead>
      				      <tr>
      		        			<th style="text-wrap: nowrap;">Id</th>
                        <th style="text-wrap: nowrap;">Image</th>
                        <th style="text-wrap: nowrap;">Username</th>
                        <th style="text-wrap: nowrap;">Email</th>
                        <th style="text-wrap: nowrap;">Role</th>
                        <th style="text-wrap: nowrap;">Create-Date</th>
                        <th style="text-wrap: nowrap;">Edit</th>
                        <th style="text-wrap: nowrap;">SoftDelete</th>
      				      </tr>
      				    </thead>
      				    <tbody>

      				    	@foreach($getSoftdelete as $value)
      				      <tr>
      		        			<td style="text-wrap: nowrap;">{{ $value->id }}</td>
                        <td>
                            @if(!empty($value->image))
                              <img src="{{ url('public/images/users/'.$value->image) }}" style="height: 30px; width: 30px; object-fit: cover; border-radius: 50px;"> 
                            @endif
                        </td>
                        <td style="text-wrap: nowrap;">{{ $value->name }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->email }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->isRole == 1 ? 'Admin' : 'Register' }}</td>
                        <td style="text-wrap: nowrap;">{{ date('d-m-y'), strtotime($value->created_at) }}</td>
                        <td style="text-wrap: nowrap;"><a href="{{ url('admin/user/restore/'.$value->id) }}" class="btn btn-success text-white"><i class="bi bi-recycle"></i></a></td>
      		              <td style="text-wrap: nowrap;"><a href="{{ url('admin/user/delete/'.$value->id) }}" class="btn btn-danger text-white" onclick="return confirm('Are you sure you want to parmanently delete this item?');"><i class="bi bi-trash-fill"></i></a></td>
      				      </tr>
      				      @endforeach

      				    </tbody>
      				  </table>

                {!! $getSoftdelete->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

				      </div>

              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->




@endsection