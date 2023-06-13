<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class itemqtynew extends Model
{
    use SoftDeletes;
    protected $table= 'acco_item_quantity_new';
    protected $guarded = [];
    public $timestamps = true;

    public function itemname(){

        return $this->belongsTo('App\PurchaseItem', 'item_number', 'item_number');
    }

    public function house(){

        return $this->belongsTo('App\warehouse', 'wareh_id', 'id');
    }
}
