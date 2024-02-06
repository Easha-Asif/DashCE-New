@extends('admin.layouts.master')

@section('title')
    Interactions Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <x-cardheader title="Interactions" />
              <div class="card-body">
              <div class="table-responsive text-nowrap">
                  <table class="table table-striped" id="table-1">
                    <thead class="table-dark">
                      <tr>
                          <th>No</th>
                          <th>Mini</th>
                          <th>Mod</th>
                          <th>Badge</th>
                          <th>Type</th>
                          <th>Interaction Name</th>
                          <th>Time</th>
                          <th>Status</th>
                          <th width="250px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($interactions as $key => $interactions)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $interactions->minimodule->name ?? '' }}</td>
                        <td>{{ $interactions->module->name ?? '' }}</td>
                        <td>{{ $interactions->badge }}</td>
                        <td>{{ $interactions->type }}</td>
                        <td>{{ $interactions->name }}</td>
                        <td>{{ $interactions->time }}</td>
                        <td>
                          @can('interaction-edit')
                            @if($interactions->status == '0')
                            <a href="{{ route('interactions.status', $interactions->id) }}" class="btn btn-primary">Active</a>
                            @else
                            <a href="{{ route('interactions.status', $interactions->id) }}" class="btn btn-danger">Deactive</a>
                            @endif
                          @endcan
                        </td>
                        <td>
                            @can('interaction-edit')
                            <a class="btn btn-primary" href="{{ route('interactions.edit',$interactions->id) }}">Edit</a>
                            @endcan
                            @can('interaction-delete')
                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $interactions->id }})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <form id="delete-form-{{ $interactions->id }}" action="{{ route('interactions.destroy', $interactions->id) }}" method="post"
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
