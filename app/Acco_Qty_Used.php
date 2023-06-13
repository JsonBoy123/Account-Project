<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acco_Qty_Used extends Model
{
    protected $table= 'acco_qty_used';
    protected $guarded = [];
    public $timestamps = true;


      public function usedQuantity(){

       return $this->belongsTo('App\PurchaseItem','item_number','item_number')->select('title','item_number')->withdefault(['item_number' => 0]);
} 
       public function expence(){

       return $this->belongsTo('App\expensedetail','item_number','item_number')->select('price','item_number')->withdefault(['item_number' => 0]);
    }
}
