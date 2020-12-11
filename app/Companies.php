<?php

namespace App;
use App\Medicines;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Companies extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];
    use SoftDeletes;

}
