@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Subscriptions</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Subscriptions</li>
<li class="breadcrumb-item active">create</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
            <div class="card">
					<div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                       @endif
                       {!! Form::model($subscription, ['method' => 'PATCH','route' => ['subscriptions.update', $subscription->id]]) !!}
                       <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <div class="col-form-label">service name</div>
                                <select class="js-example-disabled-results col-sm-12" name="service_id">
                                    @foreach ($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <div class="col-form-label">user name</div>
                                <select class="js-example-disabled-results col-sm-12" name="user_id">
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="start_date"><strong>start Date</strong> </label>
                                {!! Form::date('start_date', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label><strong>End Date</strong> </label>
                                {!! Form::date('end_date', null, array('class' => 'form-control','required')) !!}
                            </div>
                        </div>
                    </div>
					<div class="card-footer">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
                {!! Form::close() !!}
			</div>
            </div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection






