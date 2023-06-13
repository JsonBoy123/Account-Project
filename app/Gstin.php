<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gstin extends Model
{
    use SoftDeletes;
    protected $table= 'acco_gstin';
    protected $guarded = [];
    public $timestamps = true;
}
