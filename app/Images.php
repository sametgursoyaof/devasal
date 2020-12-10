<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Images extends Model
{
    protected $fillable=['medicine_id','photo'];
    use SoftDeletes;
}
