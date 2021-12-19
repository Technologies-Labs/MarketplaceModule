<div class="row">
    @php
        use Modules\MarketPlace\Enum\MarketplaceEnum;
    @endphp
    @foreach ($services as $service)
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="course">
            <figure>
                <img src="{{ asset('images/market place') }}/{{$service->image}}" alt="">
                <!-- <i class="icofont-book-mark" title="bookmark"></i> -->
                <em><span><i class="icofont-cart-alt"></i> YER{{$service->price}}</span></em>
                <!-- <span class="rate-result"><i class="icofont-star"></i> 4.5</span> -->
            </figure>
            <div class="course-meta">
                {{-- <div class="prise">
                    <span><i class="icofont-cart-alt"></i> YER{{$service->price}}</span>
                </div> --}}
                <h5 class="course-title"><a href="course-detail.html" title="">{{$service->name}}</a></h5>
                <div class="course-info" style="height: 11.4rem">
                    <p>{{$service->description}}</p>
                    <!-- <span class="time"><i class="icofont-clock-time"></i> 20Hrs</span> -->
                </div>
                @if (isset($service->pivot->status))
                    @if ($service->pivot->status === MarketplaceEnum::SUBSCRIPTED &&  $service->type == MarketplaceEnum::FOREVER )
                    <div style="display: flex; justify-content: center;">
                        <a class="main-btn" wire:click="handler('{{$service->key}}','unSubscripe')"  href="javascript:void(0)">Un subscripe</a>
                    </div>
                    @endif

                    @if (($service->pivot->status === MarketplaceEnum::UPGRADED || $service->pivot->status === MarketplaceEnum::SUBSCRIPTED) && ( $service->type == MarketplaceEnum::PERIOD || $service->type == MarketplaceEnum::MEASURE )  )
                    <div style="display: flex; justify-content: space-evenly;">
                        <a class="main-btn" wire:click="handler('{{$service->key}}','upgrade')"  href="javascript:void(0)">Upgrade</a>
                        <a class="main-btn" wire:click="handler('{{$service->key}}','unSubscripe')"  href="javascript:void(0)">Un subscripe</a>
                    </div>

                    @endif
                @else
                <a href="javascript:void(0)" wire:click="handler('{{$service->key}}','subscripe')" title=""
                    class="main-btn" data-ripple="">Subscripe</a>
                @endif
                @include('components.loading')
            </div>
        </div>
    </div>

    {{-- <li>
        <div class="nearly-pepls">
            <figure>
                <img src="{{asset($service->image)}}" alt="service image">
            </figure>
            <div class="pepl-info">
                <h4><a href="#" title="">{{$service->name}}</a></h4>
                <span>{{$service->price}}</span>
                <em>{{$service->description}}</em>
                @if (isset($service->pivot->status))

                @if ($service->pivot->status === "Subscriped")
                <a href="javascript:void(0)" wire:click="handler('{{$service->key}}','unSubscripe')" title=""
                    class="add-butn" data-ripple="">Unsubscripe</a>
                @else
                <a href="javascript:void(0)" wire:click="handler('{{$service->key}}','upgrade')" title=""
                    class="add-butn" data-ripple="">{{$service->pivot->status}}</a>
                @endif

                @else
                <a href="javascript:void(0)" wire:click="handler('{{$service->key}}','subscripe')" title=""
                    class="add-butn" data-ripple="">{{$service->status}}</a>
                @endif
            </div>
        </div>
    </li> --}}
    @endforeach
</div>
