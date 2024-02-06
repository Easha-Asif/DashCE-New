@extends('admin.layouts.master')

@section('title')
    Promo Codes Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <x-cardheader title="Promo Codes" /> 
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Code</th>
                          <th>Discount Type</th>
                          <th>Discount</th>
                          <th>Status</th>
                          <th width="250px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($promocodes as $key => $promocode)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $promocode->name }}</td>
                        <td>{{ $promocode->code }}</td>
                        <td>{{ $promocode->discount_type }}</td>
                        <td>{{ $promocode->discount }}</td>
                        <td>
                          @can('promo-code-edit')
                            @if($promocode->status == '0')
                            <a href="{{ route('promocodes.status', $promocode->id) }}" class="btn btn-primary">Active</a>
                            @else
                            <a href="{{ route('promocodes.status', $promocode->id) }}" class="btn btn-danger">Deactive</a>
                            @endif
                          @endcan
                        </td>
                        <td>
                            @can('promo-code-edit')
                            <a class="btn btn-primary" href="{{ route('promocodes.edit',$promocode->id) }}">Edit</a>
                            @endcan
                            @can('promo-code-delete')
                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $promocode->id }})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <form id="delete-form-{{ $promocode->id }}" action="{{ route('promocodes.destroy', $promocode->id) }}" method="post"
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