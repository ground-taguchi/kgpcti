<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_infos';
    public $timestamps = false;
    protected $fillable = ['user_id','name','tel','mail_address','comment'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->black_flg = $model->black_flg ?? '0';
        });
    }
}
