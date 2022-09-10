<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patner extends Model implements Authenticatable
{
    use HasFactory;
    protected $connection = "izigo";

    protected $fillable = [
        "name","cover","email","password","phone","created_at","updated_at",
        "deleted_at","enabled"
        ];

    public function drivers()
    {
        return $this->hasMany(Drivers::class,"patner_id");
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
}