<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company_mast extends Model
{
	use SoftDeletes;
    protected $table= 'acco_company_mast';
    protected $guarded = [];
    public $timestamps = true;
}
