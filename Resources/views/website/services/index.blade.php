@extends('layouts.simple.master')
@section('left-sidebar')
    @include('layouts.simple.left-sidebar')
@endsection
@section('content')
<div class="col-lg-6">
    <div class="central-meta">
        <div class="groups">
            <span><i class="fa fa-users"></i> Torindo Services</span>
        </div>
        <livewire:marketplacemodule::services.show-services />
        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
    </div>
</div>
@endsection
@section('right-sidebar')
    @include('layouts.simple.right-sidebar')
@endsection
