<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Drink extends Model
{
   use Notifiable;
   protected $fillable=[
       'd_name'
   ];
}
