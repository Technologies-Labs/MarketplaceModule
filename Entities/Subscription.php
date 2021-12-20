<?php

namespace Modules\Marketplace\Entities;

use App\Models\User;
use Database\Factories\SubscriptionsFactory;
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

 public function users(){
    return $this->belongsToMany(User::class , 'subscriptions');
   }

   public function service(){
    return $this->belongsTo(Service::class);
   }



    protected static function newFactory()
    {
        return SubscriptionsFactory::new();
    }
}
