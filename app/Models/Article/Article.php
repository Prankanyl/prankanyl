<?php

namespace App\Models\Article;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
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
        return (null != $this->image) ? '/storage/article/'.$this->image : config('default.article');
    }

    public function getMutateShortDescriptionAttribute(){
        return str_limit(strip_tags($this->short_description), 235);
    }

    public function getMutateLongDescriptionAttribute(){
        return strip_tags($this->long_description);
    }

    /**
     * @param $value
     */
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = 'article';

        // if the image was erased
        if (null == $value) {
            // delete the image from disk
            Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // 0. Make the image
            $image = Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            $filename = str_slug($this->first_name.'-'.$this->last_name).'-'.time().'.jpg';

            // 2. Store the image on disk.
            Storage::disk($disk)->put($filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            Storage::disk($disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = $filename;
        }
    }
}
