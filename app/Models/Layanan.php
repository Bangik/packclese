<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Layanan extends Model
{

    protected $table = "services";

    use SoftDeletes;

    protected $fillable = [
      'name','jenisservice_id','description','rate','price','picturePath'
    ];

    protected $dates = ['deleted_at'];

    public function jenisServices(){
      return $this->belongsTo('App\Models\JenisLayanan', 'jenisservice_id');
    }

    public function Komentar(){
      return $this->hasMany('App\Models\Komentar');
    }

    public function transaction(){
      return $this->belongsTo('App\Models\Transaction');
    }

    public function photos(){
      return $this->hasMany('App\Models\ServicePhoto', 'id');
    }

}
