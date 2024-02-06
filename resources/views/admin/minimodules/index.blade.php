@extends('admin.layouts.master')

@section('title')
    Mini Modules Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <x-cardheader title="Mini Modules" />
              <div class="card-body">
              <div class="table-responsive text-nowrap">
                  <table class="table table-striped" id="table-1">
                    <thead class="table-dark">
                      <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Display Name</th>
                          <th># Of Mini Modules</th>
                          <th>Time</th>
                          <th>Status</th>
                          <th width="250px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($minimodules as $key => $module)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $module->name }}</td>
                        <td>{{ $module->display_name }}</td>
                        <td>{{ $module->discount_type }}</td>
                        <td>{{ $module->discount }}</td>
                        <td>
                          @can('module-edit')
                            @if($module->status == '0')
                            <a href="{{ route('minimodules.status', $module->id) }}" class="btn btn-primary">Active</a>
                            @else
                            <a href="{{ route('minimodules.status', $module->id) }}" class="btn btn-danger">Deactive</a>
                            @endif
                          @endcan
                        </td>
                        <td>
                            @can('module-edit')
                            <a class="btn btn-primary" href="{{ route('minimodules.edit',$module->id) }}">Edit</a>
                            @endcan
                            @can('module-delete')
                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $module->id }})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <form id="delete-form-{{ $module->id }}" action="{{ route('minimodules.destroy', $module->id) }}" method="post"
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
