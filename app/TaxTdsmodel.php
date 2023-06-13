<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxTdsmodel extends Model
{
    use SoftDeletes;
    protected $table= 'acco_re_tds_tax';
    protected $guarded = [];
    public $timestamps = true;
}
