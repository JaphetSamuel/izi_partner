<?php

namespace App\Models;

use App\scope\PartnerScope;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

/**
 * Post
 *
 * @mixin Eloquent
 */

class Partner extends Model implements Authenticatable
{
//    use HasFactory;
    protected $connection = "izigo";

    protected $table = 'users';


    protected $fillable = [
        "name","cover","email","password","phone","created_at","updated_at",
        "deleted_at","enabled"
        ];

//    protected function newBaseQueryBuilder()
//    {
//        return DB::connection('izigo')->table('users')
//            ->select('users.id as user_id','partners.id as partner_id','partners.name')
//            ->join('partners','users_id','=','partners_id')
//            ->hidden(['user_id','partner_id'])
//            ->where('users.id','=',auth('patner')->id());
//    }

    public function name():Attribute{
        return Attribute::make(
            get: fn()=>ucfirst($this->partner->name),
            set: function($value){$this->partner->name = $value;}
        );
    }

    public function partner():HasOne{
        return $this->hasOne(PartnerModel::class,'user_id');
    }


    public function drivers()
    {
        return $this->hasMany(Driver::class,"partner_id");
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        return null;
    }

    public function getRememberTokenName()
    {
        return null;
    }

    protected static function booted()
    {
//        static::addGlobalScope(new PartnerScope());
    }
}
