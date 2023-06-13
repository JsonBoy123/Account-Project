<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorMast extends Model
{
    protected $table= 'acco_vendor_mast';
    protected $guarded = [];
    public $timestamps = true;

    public function vendor(){
        
    	return $this->belongsTo('App\VendorType','vendor_type','id');
    }

    public function firm(){
        
    	return $this->belongsTo('App\FirmType','firm_type','id');
    }

    public function state(){
        
    	return $this->belongsTo('App\state','state_code','state_code');
    }

    public function cities(){
        
    	return $this->belongsTo('App\City','city_code','city_code');
    }

}
