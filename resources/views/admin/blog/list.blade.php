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
                <a href="{{ url('admin/blog/add') }}" type="button" class="btn btn-primary text-white mx-2">Add</a>
                <a href="{{ url('admin/blog/softdelete/list') }}" type="button" class="btn btn-warning text-white ms-auto">Trash</a>
              </div>
            </div>
          </div>


          {{-- Register Table --}}
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-bold">Blog List</h5>

              <form class="row g-3" accept="get">
                <div class="col-md-4">
                  <label class="form-label">Id</label>
                  <input type="text" class="form-control" name="id" value="{{ Request::get('id') }}">
                </div>

                <div class="col-md-4">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" value="{{ Request::get('username') }}">
                </div>

                <div class="col-md-4">
                  <label class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" value="{{ Request::get('title') }}">
                </div>


                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('admin/blog') }}" type="reset" class="btn btn-secondary">Reset</a>
                </div>
              </form>

              <hr>


              <!-- Table with stripped rows -->
              <div class="table-responsive">          
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="text-wrap: nowrap;">Id</th>
                      @if(Auth::user()->isRole == 1)
                        <th style="text-wrap: nowrap;">Author</th>
                      @endif
                      <th style="text-wrap: nowrap;">Title</th>
                      <th style="text-wrap: nowrap;">Slug</th>
                      <th style="text-wrap: nowrap;">Category</th>
                      <th style="text-wrap: nowrap;">Image</th>
                      <th style="text-wrap: nowrap;">Description</th>
                      @if(Auth::user()->isRole == 1)
                        <th style="text-wrap: nowrap;">Meta Description</th>
                      @endif
                      @if(Auth::user()->isRole == 1)
                        <th style="text-wrap: nowrap;">Meta Keywords</th>
                      @endif
                      <th style="text-wrap: nowrap;">Publish</th>
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
                        @if(Auth::user()->isRole == 1)
                          <td style="text-wrap: nowrap;">{{ $value->user_name }}</td>
                        @endif
                        <td style="text-wrap: nowrap;">{{ $value->title }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->slug }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->category_name }}</td>
                        <td style="text-wrap: nowrap;">
                        @if(!empty($value->image))
                            <img src="{{ url('public/images/blog/'.$value->image) }}" style="height: 60px; width: 120px; object-fit: cover;"> 
                        @endif
                        </td>
                        <td style="min-width: 700px;">{{ $value->description }}</td>
                        @if(Auth::user()->isRole == 1)
                          <td style="min-width: 700px;">{{ $value->meta_description }}</td>
                        @endif
                        @if(Auth::user()->isRole == 1)
                          <td style="text-wrap: nowrap;">{{ $value->meta_keywords }}</td>
                        @endif
                        <td style="text-wrap: nowrap;">{{ $value->isPublish == 0 ? 'Yes' : 'No' }}</td>
                        <td style="text-wrap: nowrap;">{{ $value->status == 0 ? 'Active' : 'Deactive' }}</td>
                        <td style="text-wrap: nowrap;">{{ date('d-m-y'), strtotime($value->created_at) }}</td>
                        <td style="text-wrap: nowrap;"><a href="{{ url('admin/blog/edit/'.$value->id) }}" class="btn btn-primary text-white"><i class="bi bi-pencil-square"></i></a></td>
                        <td style="text-wrap: nowrap;"><a href="{{ url('admin/blog/softdelete/'.$value->id) }}" class="btn btn-warning text-white" onclick="return confirm('Are you sure you want to trash this item?');"><i class="bi bi-trash-fill"></i></a></td>
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