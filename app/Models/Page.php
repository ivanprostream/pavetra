<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table= 'pages';

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
        'link',
        'is_active',
        'in_menu',
        'sort',
        'lang_id',
        'page_type_id'
    ];

    public function children() {
    return $this->hasMany(self::class, 'parent');
    }

    public function parent() {
    return $this->belongsTo(self::class, 'parent');
    }


}
