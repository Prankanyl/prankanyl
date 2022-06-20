<?php

namespace App\Models\Project;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class DevelopmentTool extends Model
{
    use CrudTrait, HasSlug;

    protected $table = 'development_tools';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(DevelopmentTool::class, 'parent_id');
    }

    public function getMutateLogoAttribute()
    {
        return (null != $this->logo) ? $this->logo : null;
    }

    /**
     * @param $value
     */
    public function setImageAttribute($value)
    {
        $attribute_name = "logo";
        $disk = 'development-tool';

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
