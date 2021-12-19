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
<li class="breadcrumb-item">Sms Services</li>
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
                            @can('service-create')
                                <div style="margin-bottom:5px ">
                                    <a class="btn btn-success" href="{{ route('smsServices.create') }}"> Create service</a>
                                </div>
                            @endcan
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Total Balance</th>
                                <th>Current Balance</th>
                                <th>Action</th>
                            </tr>
                         </thead>
                            <tbody>
                            @foreach ($smsServices as $key => $service)
                                <tr id="delete_smsServices_{{ $service->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $service->user->name }}</td>
                                    <td>{{ $service->total_balance }}</td>
                                    <td>{{ $service->current_balance }}</td>
                                    <td class="text-center">
                                        @can('service-edit')
                                        <a class="btn btn-primary m-b-5"  href="{{ route('smsServices.edit',$service->id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('service-delete')
                                           <a href="javascript:void(0);" onclick="delete_item({{ $service->id }},'smsServices')" class="btn btn-danger m-b-5"><i class="fa fa-trash"></i></a>
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
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
