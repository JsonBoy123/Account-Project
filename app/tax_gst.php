<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tax_gst extends Model
{
    use SoftDeletes;
    protected $table= 'acco_re_tax_gst';
    protected $guarded = [];
    public $timestamps = true;
    
}
