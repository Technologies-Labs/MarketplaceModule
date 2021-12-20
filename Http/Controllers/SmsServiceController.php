<?php

namespace Modules\Marketplace\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Marketplace\Entities\SmsService as SmsServiceModel;
use Modules\Marketplace\Services\SmsService;
use Modules\Marketplace\Services\SmsService as ServicesSmsService;

class SmsServiceController extends Controller
{
    public function __construct(){
        $this->middleware('permission:service-create',   ['only' => ['create','store']]);
        $this->middleware('permission:service-edit',     ['only' => ['edit','update']]);
        $this->middleware('permission:service-list',     ['only' => ['show', 'index']]);
        $this->middleware('permission:service-delete',   ['only' => ['destroy']]);
    }
    // /**
    //  * Display a listing of the resource.
    //  * @return Renderable
    //  */
    public function index()
    {
        $smsServices=SmsServiceModel::get();
        return view('marketplace::dashboard.smsServices.index',compact('smsServices'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $users =User::get();
        return view('marketplace::dashboard.smsServices.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'          => 'required|int|unique:sms_services,user_id',
            'current_balance'  => 'required',
            'total_balance'    =>'required',
        ]);

        $smsService= new SmsService();
        $smsService->setUserID($request->user_id)
                   ->setCurrentBalance($request->current_balance)
                   ->setTotalBalance($request->total_balance)
                   ->createSmsService();

        return redirect()->route("smsServices.index")->with('success', 'تم اضافة  بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $smsService =smsServiceModel::find($id);
        if (!$smsService) {
            return redirect()->route('dashboard')->with('failed',"sms Service Not Found");
        }
        $users =User::get();
        return view('marketplace::dashboard.smsServices.edit',compact('smsService','users'));
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
        'user_id'          => 'required|int|unique:sms_services,user_id,'.$request->user_id,
        'current_balance'  => 'required',
        'total_balance'    =>'required',
        ]);

        $smsService = smsServiceModel::find($id);
        if(!$smsService){
            return redirect()->route('dashboard')->with('failed',"sms service Not Found");
        }

        $smsServiceUpdate= new SmsService();
        $smsServiceUpdate->setUserID($request->user_id)
                         ->setCurrentBalance($request->current_balance)
                         ->setTotalBalance($request->total_balance)
                         ->updateSmsService($smsService);

        return redirect()->route("smsServices.index")->with('success', 'تم التعديل  بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $sms=SmsServiceModel::find($id);
        if (!$sms) {
            return redirect()->route('dashboard')->with('failed',"sms Not Found");
        }
        $sms->delete();
    }

}
