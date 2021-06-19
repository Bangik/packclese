<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
  protected $table = "jenisservices";

  protected $fillable = [
    'jenis', 'slug', 'description', 'picturePath'
  ];

  public function Layanan(){
    return $this->hasMany('App\Models\Layanan', 'id');
  }
}
