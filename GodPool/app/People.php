<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class People extends Model
{
    use Notifiable;
    protected $fillable=[
        'p_name'
    ] ;

}
