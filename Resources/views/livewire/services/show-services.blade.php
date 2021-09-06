<div>
    <ul class="nearby-contct">
        @foreach ($services as $service)
            <li>
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
                                <a href="javascript:void(0)" wire:click ="handler('{{$service->key}}','unSubscripe')" title="" class="add-butn" data-ripple="">Unsubscripe</a>
                            @else
                                <a href="javascript:void(0)" wire:click ="handler('{{$service->key}}','upgrade')" title="" class="add-butn" data-ripple="">{{$service->pivot->status}}</a>
                            @endif
                        @else
                            <a href="javascript:void(0)" wire:click ="handler('{{$service->key}}','subscripe')" title="" class="add-butn" data-ripple="">{{$service->status}}</a>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
