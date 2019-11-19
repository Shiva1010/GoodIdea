<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Athena extends Model
{
    use Notifiable;
    protected $fillable=[
        'name','iterm_id'
    ];

    public function iterm()
    {
//        return $this->belongsTo(Iterm::class);                 // 預設對應表單的 id

        return $this->belongsTo(Iterm::class,'iterm_id','id');   // 完整寫法，如果有另外指定的欄位對應可用這種方式


    }



}
