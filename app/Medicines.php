<?php

namespace App;
use App\Companies;
use App\Images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class Medicines extends Model
{
    protected $fillable = [
        'name',
        'active_ingredient',
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
    ];
    public function owner()
    {
        return $this->belongsTo(Companies::class, 'companies_id','id');
    }
    public function images()
    {
        return $this->hasMany(Images::class,'medicine_id','id');
    }
    use SoftDeletes;

}
