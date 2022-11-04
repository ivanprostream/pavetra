<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryConst extends Model
{
    use HasFactory;
    protected $table= 'country_consts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lang_id',
        'country_const_type_id'
    ];

    public function const_info()
    {
        return $this->belongsTo(CountryConstType::class, 'country_const_type_id');
    }

}
