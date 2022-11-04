<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table= 'blog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
        'category_id',
        'short_text',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
        'psych_id',
        'sort',
        'country_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
