<?php

namespace App;
use App\Medicines;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];
}
