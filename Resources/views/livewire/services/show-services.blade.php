<div>
    <ul class="nearby-contct">
        @foreach ($services as $service)
            <li>
                <div class="nearly-pepls">
                    @if (isset($service->service_id))
                        <figure>
                            <img src="{{asset($service->service->image)}}" alt="service image">
                        </figure>
                        <div class="pepl-info">
                            <h4><a href="group.html" title="">{{$service->service->name}}</a></h4>
                            <span>$100</span>
                            <em>30k Messages</em>
                            @if ($service->status == 'Subscriped')
                                <a href="#" title="" class="add-butn" data-ripple="">Unsubscripe</a>
                            @else
                                <a href="#" title="" class="add-butn" data-ripple="">{{$service->status}}</a>
                            @endif
                        </div>
                    @else
                        <figure>
                            <img src="{{asset($service->image)}}" alt="service image">
                        </figure>
                        <div class="pepl-info">
                            <h4><a href="group.html" title="">{{$service->name}}</a></h4>
                            <span>$100</span>
                            <em>30k Messages</em>
                            <a href="#" title="" class="add-butn" data-ripple="">Subscripe</a>
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
