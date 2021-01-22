<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordBloc extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function Actions() {
        return $this->hasMany('App\Models\RecordBlocAction', 'id');
    }

}
