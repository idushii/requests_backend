<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordBlocEvent extends Model
{
    use HasFactory;

protected $primaryKey = 'id';

    protected $fillable = [
        'bloc_id',
        'bloc_action_id',
        'name',
        'payload'
    ];

    public function Bloc() {
        return $this->belongsTo('App\Models\RecordBloc', 'bloc_id', 'id');
    }

    public function BlocAction() {
        return $this->belongsTo('App\Models\RecordBlocAction', 'bloc_action_id', 'id');
    }
}
