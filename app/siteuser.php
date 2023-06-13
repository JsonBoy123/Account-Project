<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class siteuser extends Model
{
    use SoftDeletes;
    protected $table= 'prch_acco_responsible_site_user';
    protected $guarded = [];
    public $timestamps = true;

     public function user(){

         return $this->belongsTo('App\User','user_id','id')->withdefault(['name' => 'Unavaible:The quotation was declained']);
     }

     public function manager(){

         return $this->belongsTo('App\User','manager_id','id')->withdefault(['name' => 'Unavaible:The quotation was declained']);
     }

     
    
}
