<?php

namespace App;
use App\Companies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class Medicines extends Model
{
    protected $fillable = [
        'name',
        'description',
        'formula',
        'pharmacological',
        'indication',
        'kontrendikasyon',
        'warning',
        'side_effects',
        'usage',
        'extra_information',
        'barcode',
        'companies_id',
        'slug',
        'status'
    ];
    public function owner()
    {
        return $this->belongsTo(Companies::class, 'companies_id','id');
    }
    
}
