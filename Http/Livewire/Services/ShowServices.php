<?php

namespace Modules\MarketplaceModule\Http\Livewire\Services;

use Livewire\Component;

class ShowServices extends Component
{
    public $services;

    public function mount()
    {
        $this->services= app('services')->getAllServices()->getData()->data;
    }

    public function render()
    {
        return view('marketplacemodule::livewire.services.show-services');
    }
}
