<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Iterm extends Model
{
    use Notifiable;

    protected $fillable=[
      'item_name','item_pic'
    ];

    public function athenas()
    {
//        return $this->hasmany(Athena::class);        // 預設對應表單的 id

        return $this->hasmany(Athena::class,'id','iterm_id');  // 完整寫法，如果有另外指定的欄位對應可用這種方式
    }
}
