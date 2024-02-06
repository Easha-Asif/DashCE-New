@extends('admin.layouts.master')

@section('title')
    Licenses Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <x-cardheader title="Licenses" /> 
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>State</th>
                          <th>Type</th>
                          <th>Expiration</th>
                          <th>License #</th>
                          <th>Brokerage</th>
                          <th>Brokerage #</th>
                          <th>Status</th>
                          <th width="250px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($licenses as $key => $license)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $license->name }}</td>
                        <td>{{ $license->state }}</td>
                        <td>{{ $license->type }}</td>
                        <td>{{ $license->expiration_date }}</td>
                        <td>{{ $license->license }}</td>
                        <td>{{ $license->brokerageid->id ?? '' }}</td>
                        <td>{{ $license->brokerageid->name ?? '' }}</td>
                        <td>
                          @can('license-edit')
                            @if($license->status == '0')
                            <a href="{{ route('licenses.status', $license->id) }}" class="btn btn-primary">Active</a>
                            @else
                            <a href="{{ route('licenses.status', $license->id) }}" class="btn btn-danger">Deactive</a>
                            @endif
                          @endcan
                        </td>
                        <td>
                            @can('license-edit')
                            <a class="btn btn-primary" href="{{ route('licenses.edit',$license->id) }}">Edit</a>
                            @endcan
                            @can('license-delete')
                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $license->id }})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <form id="delete-form-{{ $license->id }}" action="{{ route('licenses.destroy', $license->id) }}" method="post"
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