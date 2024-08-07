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
                <a href="{{ url('admin/users') }}" type="button" class="btn btn-primary text-white">Reset</a>
                <a href="{{ url('admin/user/softdelete/list') }}" type="button" class="btn btn-warning text-white ms-auto">Trash</a>
              </div>
            </div>
          </div>

          

          {{-- Admin Table --}}
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-bold">Admin List</h5>
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

      				    	@foreach($getAdmin as $value)
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
                        <td style="text-wrap: nowrap;"><a href="{{ url('admin/user/edit/'.$value->id) }}" class="btn btn-primary text-white"><i class="bi bi-pencil-square"></i></a></td>
      		              <td style="text-wrap: nowrap;"><a href="{{ url('admin/user/softdelete/'.$value->id) }}" class="btn btn-warning text-white" onclick="return confirm('Are you sure you want to trash this item?');"><i class="bi bi-trash-fill"></i></a></td>
      				      </tr>
      				      @endforeach

      				    </tbody>
      				  </table>

                {!! $getAdmin->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

				      </div>

              <!-- End Table with stripped rows -->
            </div>
          </div>

          {{-- Register Table --}}
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-bold">Register List</h5>
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

                    @foreach($getRegister as $value)
                      <tr>
                        <td style="text-wrap: nowrap;">{{ $value->id }}</td>
                        <td>
                          @if(!empty($value->image))
                            <img src="{{ url('public/images/users/'.$value->image) }}" style="height: 30px; width: 30px; object-fit: cover; border-radius: 50px;"> 
                          @endif
                        </td>
                        <td style="text-wrap: nowrap;">{{ $value->name }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->email }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->isRole == 0 ? 'Register' : 'Admin' }}</td>
                        <td style="text-wrap: nowrap;">{{ date('d-m-y'), strtotime($value->created_at) }}</td>
                        <td style="text-wrap: nowrap;"><a href="{{ url('admin/user/edit/'.$value->id) }}" class="btn btn-primary text-white"><i class="bi bi-pencil-square"></i></a></td>
                        <td style="text-wrap: nowrap;"><a href="{{ url('admin/user/softdelete/'.$value->id) }}" class="btn btn-warning text-white" onclick="return confirm('Are you sure you want to trash this item?');"><i class="bi bi-trash-fill"></i></a></td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>

                {!! $getRegister->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

              </div>

              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->




@endsection