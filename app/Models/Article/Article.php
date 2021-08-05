<?php

namespace App\Models\Article;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use CrudTrait, HasFactory, HasSlug;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'articles';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = [];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    protected $with = ['category'];

    /**
     * @return SlugOptions
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * @return BelongsTo
     */
    public function category(){
        return $this->belongsTo(ArticleCategory::class, 'article_category_id', 'id');
    }

    /**
     * @return bool
     */
    public function getMutateImageAttribute(){
        return config('default.article');
//        return (null != $this->image) ? $this->image : config('default.article');
    }

    public function getMutateShortDescriptionAttribute(){
        return str_limit(strip_tags($this->short_description), 235);
    }

    public function getMutateLongDescriptionAttribute(){
        return strip_tags($this->long_description);
    }
}
