<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bg_type_mast extends Model
{
    use SoftDeletes;
    protected $table= 'acco_bg_type_mast';
    protected $guarded = [];
    public $timestamps = true;
}
