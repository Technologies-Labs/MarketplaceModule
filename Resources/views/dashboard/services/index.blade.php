@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Services</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Services</li>
<li class="breadcrumb-item active">All</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
                     <table class="display" id="basic-1">
                        <thead>
                            @if($message = Session::get('success'))
                            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                <i data-feather="thumbs-up"></i>
                                <p>{{ $message }}</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                            @endif
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                @can('service-activate')
                                <th>Activation</th>
                                @endcan
                            </tr>
                         </thead>
                            <tbody>
                            @foreach ($services as $key => $service)
                                <tr id="delete_services_{{ $service->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $service->name }}</td>
                                    @can('service-activate')
                                    <td>
                                        <div class="media-body text-center icon-state switch-outline">
                                            <label class="switch"  for="service-activation-{{$service->id}}">
                                            <input type="checkbox"  @if ($service->is_active) checked @endif class="custom-control-input" id="service-activation-{{$service->id}}" onclick="activate_item('services',{{$service->id}})"><span class="switch-state bg-success"></span>
                                            </label>
                                        </div>
                                    </td>
                                    @endcan
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
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
