@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')

@role('admin')

    <!-- <section class="section">
        <div class="row ">
            <x-maincard title="User" count="{{ $users }}" image="{{ asset('assets/admin/img/banner/1.png') }}" />
            <x-maincard title="Not Found" count="-" image="{{ asset('assets/admin/img/banner/2.png') }}" />
            <x-maincard title="Content" count="{{ $contents }}" image="{{ asset('assets/admin/img/banner/3.png') }}" />
            <x-maincard title="Roles" count="{{ $roles }}" image="{{ asset('assets/admin/img/banner/4.png') }}" />
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>
            <x-maincard title="Not Found" count="-" image="{{ asset('assets/admin/img/banner/4.png') }}" />
            <x-maincard title="Not Found" count="-" image="{{ asset('assets/admin/img/banner/1.png') }}" />
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                  <div class="card-header">
                    <h4>Revenue chart</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-9">
                        <div id="chart1"></div>
                        <div class="row mb-0">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="list-inline text-center">
                              <div class="list-inline-item p-r-30">
                                <h5 class="m-b-0">$675</h5>
                                <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="list-inline text-center">
                              <div class="list-inline-item p-r-30">
                                <h5 class="m-b-0">$1,587</h5>
                                <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="list-inline text-center">
                              <div class="list-inline-item p-r-30">
                                <h5 class="mb-0 m-b-0">$45,965</h5>
                                <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="row mt-5">
                          <div class="col-7 col-xl-7 mb-3">Total customers</div>
                          <div class="col-5 col-xl-5 mb-3">
                            <span class="text-big">{{ $users }}</span>
                          </div>
                          <div class="col-7 col-xl-7 mb-3">Total Income</div>
                          <div class="col-5 col-xl-5 mb-3">
                            <span class="text-big">$9,857</span>
                          </div>
                          <div class="col-7 col-xl-7 mb-3">Project completed</div>
                          <div class="col-5 col-xl-5 mb-3">
                            <span class="text-big">28</span>
                          </div>
                          <div class="col-7 col-xl-7 mb-3">Total expense</div>
                          <div class="col-5 col-xl-5 mb-3">
                            <span class="text-big">$6,287</span>
                          </div>
                          <div class="col-7 col-xl-7 mb-3">New Customers</div>
                          <div class="col-5 col-xl-5 mb-3">
                            <span class="text-big">{{ $today_customers }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </section> -->
@endrole

@endsection

@push('js')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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
