<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceRecord extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'datetime_last_active',
        'active_session_id',
        'device_name',
        'device_version',
        'identifier',
        'product',
    ];

    public function FavoriteDevice() {
        return $this->belongsTo('App\Models\UserFavoriteDevice', 'device_id', 'id');
    }

    public function Sessions() {
        return $this->hasMany('App\Models\SessionRecord', 'device_id', 'id');
    }

    public function Requests() {
        return $this->hasOneThrough('App\Models\RecordRequest', 'App\Models\SessionRecord', 'device_id', 'session_id', 'id');
    }
}
