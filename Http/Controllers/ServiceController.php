<?php

namespace Modules\Marketplace\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Marketplace\Entities\Service;
use Modules\Marketplace\Services\ServiceService;

class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('permission:service-list',     ['only' => ['show', 'index']]);
        $this->middleware('permission:service-activate', ['only' => ['activate']]);
    }
    // /**
    //  * Display a listing of the resource.
    //  * @return Renderable
    //  */
    public function index()
    {
        $services=Service::get();
        return view('marketplace::dashboard.services.index',compact('services'));
    }

    public function activate($id)
    {
        $service=Service::find($id);
        if (!$service) {
            return redirect()->route('dashboard')->with('failed',"service Not Found");
        }
        $service->is_active = !$service->is_active;
        $service->save();
    }
}
