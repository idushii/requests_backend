<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DeviceRecord
 * @property int id
 * @property string uuid
 * @property string identifier
 * @property \DateTime datetime_last_active
 * @property integer active_session_id
 * @property string device_name
 * @property string device_version
 * @property string product
 * @package App\Models
 */
class DeviceRecord extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid',
        'datetime_last_active',
        'active_session_id',
        'device_name',
        'device_version',
        'identifier',
        'product',
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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
