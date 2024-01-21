<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaCategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    public function parent()
    {
        return $this->belongsTo(MediaCategory::class, 'parent_media_category_id');
    }

    public function getChildCategories()
    {
        return $this->hasMany(MediaCategory::class, 'parent_media_category_id', 'id')->select('id', 'name');
    }

    /**
     * getCategories
     *
     * @param integer $status
     * @param string $deleted_at
     * @param integer $parent_media_category_id
     * @return void
     */
    public static function getCategories($parent_media_category_id = null)
    {
        $categories = MediaCategory::where('parent_media_category_id', $parent_media_category_id)
            ->select('id', 'name', 'slug')
            ->orderBy('id', 'asc')
            ->get();

        return $categories;
    }
}
