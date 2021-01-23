<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordRequest extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
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
