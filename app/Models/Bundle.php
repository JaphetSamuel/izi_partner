<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;
    protected $connection = 'izigo';

    public function subscriptions(){
        return $this->hasMany(Subscription::class,'bundle_id');
    }
}
