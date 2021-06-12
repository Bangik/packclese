<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{

    protected $table = "comments";

    protected $fillable = [
      'user_id','services_id','comments_id','komentar'
    ];

    public function JenisLayanan(){
      return $this->belongsTo('App\Models\JenisLayanan');
    }

    public function User(){
      return $this->belongsTo('App\Models\User');
    }

    public function child(){
      return $this->hasMany('App\Models\Komentar','comments_id');
    }


}
