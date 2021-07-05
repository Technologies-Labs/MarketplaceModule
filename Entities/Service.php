<?php

namespace Modules\MarketplaceModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','is_active'];


 /////////// Relationships  ////////////////
  public function subscriptions()
 {
     return $this->hasMany(Subscription::class);
 }

    // protected static function newFactory()
    // {
    //     return \Modules\MarketplaceModule\Database\factories\ServiceFactory::new();
    // }
}
