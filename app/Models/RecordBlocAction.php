<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordBlocAction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_bloc',
        'name',
        'payload'
    ];

    public function RecordBloc() {
        return $this->belongsTo('App\Models\RecordBloc', 'id_bloc', 'id');
    }
}
