<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{

 protected $fillable = [
    'user_id',
    'bank_account'
  ];

  public function user()
  {
    return $this->belongsTo(User::class,'user_id');
  }

  public function offers()
  {
    return $this->belongsToMany(offer::class,'buyer_offer','buyer_id','offer_id')->withTimestamps();
  }
}
