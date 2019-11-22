<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Game extends Model
{
    use Notifiable;
    protected $fillable=[
        'add_time','start_time','end_time'
    ];

}
