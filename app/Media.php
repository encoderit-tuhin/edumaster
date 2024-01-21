<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file', 'type', 'title', 'alt_text', 'caption', 'description', 'uploaded_by', 'media_category_id', 'file_name', 'file_type', 'file_size', 'dimensions'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'uploaded_by');
    }

    public function mediaCategory()
    {
        return $this->hasOne('App\MediaCategory', 'id', 'media_category_id');
    }

    public function mediaSubCategory()
    {
        return $this->hasOne('App\MediaCategory', 'id', 'media_sub_category_id');
    }
}
