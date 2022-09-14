<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $connection = 'izigo';

    protected $fillable = ['bundle_id','driver_id','amount','discount','start_at','end_at','reference','update_at','created_at'];

    public function driver(){
        $this->belongsTo(Driver::class,'driver_id');
    }

    public function bundle(){
        $this->belongsTo(Bundle::class, 'bundle_id');
    }

    public function isActive(){

        return Carbon::parse($this->start_at) < Carbon::now() && Carbon::parse($this->end_time)> Carbon::now();

    }

}
