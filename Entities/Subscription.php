<?php

namespace Modules\MarketplaceModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_id',
        'start_date',
        'end_date'
    ];

 /////////// Relationships  ////////////////

 public function user(){
    return $this->belongsTo(User::class);
   }

   public function service(){
    return $this->belongsTo(Service::class);
   }



    // protected static function newFactory()
    // {
    //     return \Modules\MarketplaceModule\Database\factories\ServicesSubscriptionFactory::new();
    // }
}
