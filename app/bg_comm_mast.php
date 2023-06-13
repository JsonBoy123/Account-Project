<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bg_comm_mast extends Model
{
    use SoftDeletes;
    protected $table= 'acco_bg_comm';
    protected $guarded = [];
}
