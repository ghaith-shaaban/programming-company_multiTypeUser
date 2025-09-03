<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programmer extends Model
{
 protected $fillable = [
            'user_id',
            'city',
            'job'
        ];

public function offer()
{
    return $this->hasMany(offer::class,'programmer_id');
}

  public function user()
  {
    return $this->belongsTo(User::class,'user_id');
  }
}
