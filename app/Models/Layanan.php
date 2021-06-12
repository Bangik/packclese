<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{

    protected $table = "services";

    protected $fillable = [
      'name','jenisservice_id','description','rate','price','picturePath'
    ];

    public function JenisLayanan(){
      return $this->belongsTo('App\Models\JenisLayanan');
    }



}
