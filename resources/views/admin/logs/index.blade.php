@extends('admin.layouts.master')

@section('title')
    Manage Logs
@endsection

@section('content')
@php
$i = 1;
@endphp
<section class="section">
   <div class="section-body">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <x-cardheader title="Logs" /> 
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped" id="table-1">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Log Name</th>
                              <th>Description</th>
                              <th>Subject ID</th>
                              <th>Sub Type</th>
                              <th>Causer Type </th>
                              <th>Causer ID</th>
                              <th>Create At</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($logs as $log)
                           @if(!empty($log))
                           <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $log->log_name }}</td>
                              <td>{{ $log->description }}</td>
                              <td>{{ $log->subject_id }}</td>
                              <td>{{ $log->subject_type }}</td>
                              <td>{{ $log->causer_type }}</td>
                              <td>{{ $log->causer_id }}</td>
                              <td>{{ $log->created_at }}</td>
                           </tr>
                           @else
                           <div class="alert alert-danger">
                             No Records Found
                           </div>
                           @endif
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