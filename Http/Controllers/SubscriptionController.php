<?php

namespace Modules\Marketplace\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Marketplace\Entities\Service;
use Modules\Marketplace\Entities\Subscription;
use Modules\Marketplace\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    public function __construct(){
        $this->middleware('permission:subscription-create',   ['only' => ['create','store']]);
        $this->middleware('permission:subscription-edit',     ['only' => ['edit','update']]);
        $this->middleware('permission:subscription-list',     ['only' => ['show', 'index']]);
        $this->middleware('permission:subscription-delete',   ['only' => ['destroy']]);
    }
    // /**
    //  * Display a listing of the resource.
    //  * @return Renderable
    //  */
    public function index()
    {
        $subscriptions=Subscription::get();
        return view('marketplace::dashboard.subscriptions.index',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $users =User::get();
        $services =Service::get();
        return view('marketplace::dashboard.subscriptions.create',[
            'users'   =>$users,
            'services'=>$services,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|int',
            'service_id'  => 'required|int',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date',
        ]);

        $subscription= new SubscriptionService();
        $subscription->setUserID($request->user_id)
                     ->setServiceID($request->service_id)
                     ->setStartDate($request->start_date)
                     ->setEndDate($request->end_date)
                     ->createSubscription();

        return redirect()->route("subscriptions.index")->with('success', 'تم اضافة  بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $subscription =Subscription::find($id);
        if (!$subscription) {
            return redirect()->route('dashboard')->with('failed',"subscription Not Found");
        }
        $users =User::get();
        $services =Service::get();
        return view('marketplace::dashboard.subscriptions.edit',[
            'subscription'=>$subscription,
            'users'       =>$users,
            'services'    =>$services,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
    $request->validate([
            'user_id'     => 'required|int',
            'service_id'  => 'required|int',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date',
        ]);

        $subscription = Subscription::find($id);
        if(!$subscription){
            return redirect()->route('dashboard')->with('failed',"subscription Not Found");
        }

        $subscriptionUpdate =new SubscriptionService();
        $subscriptionUpdate ->setUserID($request->user_id)
                            ->setServiceID($request->service_id)
                            ->setStartDate($request->start_date)
                            ->setEndDate($request->end_date)
                            ->updateSubscription($subscription);

        return redirect()->route("subscriptions.index")->with('success', 'تم التعديل  بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $subscription=Subscription::find($id);
        if (!$subscription) {
            return redirect()->route('dashboard')->with('failed',"subscription Not Found");
        }
        $subscription->delete();
    }

}
