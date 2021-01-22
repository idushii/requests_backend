<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteDevice extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'device_id',
        'created_at'
    ];

    public function Device() {
        return $this->belongsTo('App\Models\DeviceRecord', 'device_id', 'id');
    }
}
