@extends('layouts.simple.master')

@section('content')


<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-12">
                            <div class="main-wraper">
                                <h4 class="main-title">Market Place</h4>
                                <livewire:marketplacemodule::services.show-services />
                                
                            </div><!-- courses posts -->
                            {{-- <div class="load mt-0 mb-5">
                                <ul class="pagination">
                                    <li><a title="" href="#"><i class="icofont-arrow-left"></i></a></li>
                                    <li><a title="" href="#" class="active">1</a></li>
                                    <li><a title="" href="#">2</a></li>
                                    <li><a title="" href="#">3</a></li>
                                    <li><a title="" href="#">4</a></li>
                                    <li><a title="" href="#">5</a></li>
                                    <li>....</li>
                                    <li><a title="" href="#">10</a></li>
                                    <li><a title="" href="#"><i class="icofont-arrow-right"></i></a></li>
                                </ul>
                            </div><!-- pagination --> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
