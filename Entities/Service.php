<?php

namespace Modules\MarketplaceModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $appends = ['status'];
    protected $guarded = [];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Get Service users
    */
    public function users()
    {
        return $this->belongsToMany(User::class , 'subscriptions' , 'user_id' , 'service_id')->withPivot('status');
    }
    /**
     * Get status attribute
    */
    public function getStatusAttribute()
    {
        return 'Subscripe';
    }
}
