<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Buylog extends Model
{
    use Notifiable;
    protected $fillable=[
        'people_name','drink_name'
    ];
}
