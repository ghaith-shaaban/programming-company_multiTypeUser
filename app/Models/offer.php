<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
   protected $fillable = [
            'programmer_id',
            'title',
            'prise',
            'description'
        ];

public function programmer()
{
    return $this->belongsTo(programmer::class,'programmer_id');
}

  public function buyers()
  {
    return $this->belongsToMany(buyer::class,'buyer_offer','offer_id','buyer_id')->withTimestamps();
  }
}
