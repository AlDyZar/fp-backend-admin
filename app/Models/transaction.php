<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //
    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string'
    ];
    protected $primaryKey = "id";
    //public $timestamps = false;
    public $incrementing = false;
}
