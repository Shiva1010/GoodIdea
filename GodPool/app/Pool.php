<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pool extends Model
{
    use Notifiable;
    protected $fillable=[
        'pool_name','people_name'
    ];
}
