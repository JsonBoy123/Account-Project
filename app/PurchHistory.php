<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchHistory extends Model
{
     protected $table= 'prch_quotation_receiveds';
    protected $guarded = [];
    public $timestamps = true;


    public function infosite(){

       return $this->belongsTo('App\siteuser','id','qid')->withdefault(['qid' => 0]);
    }

    public function vendor(){

         return $this->belongsTo('App\VendorMast','vender_id','id')->withdefault(['name' => 'Unavaible']);
     }
}
