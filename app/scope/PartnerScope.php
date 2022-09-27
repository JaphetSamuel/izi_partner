<?php

namespace App\scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class PartnerScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {

        DB::connection('izigo')->table('users')->c
            ->join('partners','users.id','=','partners.user_id');

    }
}
