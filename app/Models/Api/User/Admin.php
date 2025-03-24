<?php

namespace App\Models\Api\User;

use App\Models\Api\Extra\Key;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'username',
    ];

    public static function boot(){
        parent::boot();

        static::creating(function ($model) {
            $model->slug = str($model->username)->slug() . '-' . mt_rand(10000, 99999);
        });


        static::updating(function ($model) {
            $model->slug = str($model->username)->slug() . '-' . mt_rand(10000, 99999);
        });
    }

    public function key(){
        return $this->morphOne(Key::class, 'keyable');
    }


    public function getRouteKey()
    {
        return $this->slug;
    }
}
