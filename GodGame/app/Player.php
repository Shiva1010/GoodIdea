<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Player extends Model
{
    use Notifiable;
    protected $fillable=[
      'name','click','game_end_time'
    ];
}
