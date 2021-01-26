<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SessionRecord
 * @property int id
 * @property int device_id
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \App\Models\DeviceRecord Device
 * @package App\Models
 */
class SessionRecord extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'device_id',
        'created_at',
        'updated_at'
    ];

    public function Device() {
        return $this->belongsTo('App\Models\DeviceRecord', 'device_id', 'id');
    }
}
