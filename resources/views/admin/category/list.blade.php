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
                <a href="{{ url('admin/category/add') }}" type="button" class="btn btn-primary text-white mx-2">Add</a>
                <a href="{{ url('admin/category/softdelete/list') }}" type="button" class="btn btn-warning text-white ms-auto">Trash</a>
              </div>
            </div>
          </div>


          {{-- Register Table --}}
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-bold">Category List</h5>
              <!-- Table with stripped rows -->
              <div class="table-responsive">          
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="text-wrap: nowrap;">Id</th>
                      <th style="text-wrap: nowrap;">Name</th>
                      <th style="text-wrap: nowrap;">Slug</th>
                      <th style="text-wrap: nowrap;">Title</th>
                      <th style="text-wrap: nowrap;">Meta Title</th>
                      <th style="text-wrap: nowrap;">Meta Description</th>
                      <th style="text-wrap: nowrap;">Meta Keywords</th>
                      <th style="text-wrap: nowrap;">Status</th>
                      <th style="text-wrap: nowrap;">Create Date</th>
                      <th style="text-wrap: nowrap;">Edit</th>
                      <th style="text-wrap: nowrap;">SoftDelete</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($getRecord as $value)
                      <tr>
                        <td style="text-wrap: nowrap;">{{ $value->id }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->name }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->slug }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->title }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->meta_title }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->meta_description }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->meta_keywords }}</td>

                        <td style="text-wrap: nowrap;">{{ $value->status == 0 ? 'Active' : 'Deactive' }}</td>
                        <td style="text-wrap: nowrap;">{{ date('d-m-y'), strtotime($value->created_at) }}</td>
                        <td style="text-wrap: nowrap;"><a href="{{ url('admin/category/edit/'.$value->id) }}" class="btn btn-primary text-white"><i class="bi bi-pencil-square"></i></a></td>
                        <td style="text-wrap: nowrap;"><a href="{{ url('admin/category/softdelete/'.$value->id) }}" class="btn btn-warning text-white" onclick="return confirm('Are you sure you want to trash this item?');"><i class="bi bi-trash-fill"></i></a></td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>

                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

              </div>

              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->




@endsection