<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expensedetail extends Model
{
    protected $table= 'prch_acco_podetail';
    protected $guarded = [];
    public $timestamps = true;

    public function name(){

       return $this->belongsTo('App\PurchaseItem','item_number','item_number')->select('title','item_number')->withdefault(['item_number' => 0]);
    }

   
}
