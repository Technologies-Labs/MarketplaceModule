<?php
namespace Modules\MarketplaceModule\Services;

use Modules\MarketplaceModule\Entities\Subscription;

class SubscriptionService{

 //class attributes
    public $user_id;
    public $service_id;
    public $start_date;
    public $end_date;

    public function createSubscription()
    {
        return Subscription::create(
            [
                'user_id'     =>$this->user_id,
                'service_id'  =>$this->service_id,
                'start_date'  =>$this->start_date,
                'end_date'    =>$this->end_date,
            ]
        );
    }

    public function updateSubscription(Subscription $subscription)
    {
         $subscription->update(
            [
                'user_id'     =>$this->user_id,
                'service_id'  =>$this->service_id,
                'start_date'  =>$this->start_date,
                'end_date'    =>$this->end_date,
            ]
        );
        return Subscription::find($subscription->id);

    }

    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setServiceID($service_id)
    {
        $this->service_id = $service_id;
        return $this;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
        return $this;
    }

}
