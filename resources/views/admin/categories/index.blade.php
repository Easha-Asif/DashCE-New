@extends('admin.layouts.master')

@section('title')
    Categories Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <!-- <x-cardheader title="Categories" /> -->
                <div class="card-header" style="display: block;">
                  <h4>Categories</h4>
                  <a href="{{ route('coursecategories.create') }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Categories</a>
                </div>
              <div class="card-body">
              <div class="table-responsive text-nowrap">
                  <table class="table table-striped" id="table-1">
                    <thead class="table-dark">
                      <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th width="250px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $key => $category)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                          @can('course-category-edit')
                            @if($category->status == '0')
                            <a href="{{ route('coursecategories.status', $category->id) }}" class="btn btn-primary">Active</a>
                            @else
                            <a href="{{ route('coursecategories.status', $category->id) }}" class="btn btn-danger">Deactive</a>
                            @endif
                          @endcan
                        </td>
                        <td>
                            @can('course-category-edit')
                            <a class="btn btn-primary" href="{{ route('coursecategories.edit',$category->id) }}">Edit</a>
                            @endcan
                            @can('course-category-delete')
                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $category->id }})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('coursecategories.destroy', $category->id) }}" method="post"
                                  style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endcan
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <!-- Sweet Alert Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        function deleteItem(id) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
