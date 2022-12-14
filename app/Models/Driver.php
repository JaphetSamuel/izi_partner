<?php

namespace App\Models;

use App\scope\DriverScope;
use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'cars';

    /**
     * @var bool|mixed
     */
    public $is_enabled;
    protected $connection = 'izigo';
    protected $fillable = [
        "firstname","lastname","phone",
        "email","password","picture", "is_enabled","car_brand",
        "car_model","immatriculation","car_licence",
        "classification","photos","gray_card","insurance_card","partner_id", "token"
    ];

    protected $casts =[
        "photos"=>"array",
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function enable(){
        $this->setAttribute("is_enabled",true);
        $this->save();
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class, 'driver_id');
    }

    public function fullname():Attribute
    {
        return Attribute::get( fn()=>ucfirst($this->firstname.' '.$this->lastname));
    }

    public function getCarLicenceUrl()
    {
        return Storage::cloud()->temporaryUrl($this->car_licence, now()->addMinutes(5));
    }

    public function activeSubscription(): null|Model {
        return $this->subscriptions()->get()->firstWhere("isActive", true);
    }

    protected static function booted(){

        static::addGlobalScope(new DriverScope());

    }


}
