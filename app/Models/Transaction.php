<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'user_id','total','status','payment_url'
  ];

  protected $dates = ['deleted_at'];

  // public function detailTransaction(){
  //   return $this->hasMany('App\Models\DetailTransaction');
  // }

}
