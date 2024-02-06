@extends('admin.layouts.master')

@section('title')
    Contents Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <x-cardheader title="Contents" /> 
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Value</th>
                          <th></th>
                          <th width="280px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($contents as $key => $content)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $content->name }}</td>
                        <td>{{ $content->value }}</td>
                        <td></td>
                        <td>
                            @can('content-edit')
                            <a class="btn btn-primary" href="{{ route('contents.edit',$content->id) }}">Edit</a>
                            @endcan
                            @can('content-delete')
                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $content->id }})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <form id="delete-form-{{ $content->id }}" action="{{ route('contents.destroy', $content->id) }}" method="post"
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