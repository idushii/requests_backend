<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecordRequest
 * @property integer number
 * @property integer session_id
 * @property string status
 * @property integer status_code
 * @property int bloc_action_id
 * @property string method
 * @property integer duration
 * @property string params
 * @property string payload
 * @property \DateTime created_at
 * @property \DateTime response_at
 * @property string url
 * @property string headers_response
 * @property string headers
 * @package App\Models
 */
class RecordRequest extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'number',
        'session_id',
        'bloc_action_id',
        'status',
        'status_code',
        'method',
        'duration',
        'params',
        'payload',
        'created_at',
        'response_at',
        'url',
        'headers_response',
        'headers'
    ];

    public function Session() {
        return $this->belongsTo('App\Models\SessionRecord', 'session_id', 'id');
    }

    public function BlocAction() {
        return $this->belongsTo('App\Models\RecordBlocAction', 'bloc_action_id', 'id');
    }
}
