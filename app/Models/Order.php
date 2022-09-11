<?php

namespace App\Models;

use App\scope\OrdersScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $connection = 'izigo';

    protected static function boot()
    {
        static::addGlobalScope(new OrdersScope());
    }

    public function driver(){
        $this->hasOne(Driver::class,'driver_id');
    }
}
