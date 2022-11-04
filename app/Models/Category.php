<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table= 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
        'parent',
        'path',
        'short_text',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
        'in_tags',
        'sort',
        'lang_id'
    ];


    public function children() {
    return $this->hasMany(self::class, 'parent');
    }

    public function parent() {
    return $this->belongsTo(self::class, 'parent');
    }
}
