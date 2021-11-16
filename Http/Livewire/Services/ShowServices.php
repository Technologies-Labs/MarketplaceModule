<?php

namespace Modules\MarketplaceModule\Http\Livewire\Services;

use Auth;
use Livewire\Component;
use Modules\MarketPlaceModule\Enum\MarketplaceEnum;

class ShowServices extends Component
{
    public $services;

    public function render()
    {
        $this->services = app('services')->getAllServices()->getData()->data;

        return view('marketplacemodule::livewire.services.show-services');
    }

    public function handler($key, $method)
    {
        $service  = MarketplaceEnum::getServiceClass($key);
        if(!$service || !in_array($method, MarketplaceEnum::METHODS)){
           abort(404);
        }
        $serviceInfo = $service->$method(Auth::user());

        $this->emit('showMessage', ['icon' => $serviceInfo->getData()->icon, 'text' => $serviceInfo->getData()->message, 'title' => '']);

    }
}
