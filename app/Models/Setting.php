<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Setting extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'settings';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = [];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $disk = 'setting';

    public function getMutateDescriptionAttribute()
    {
        return (null == $this->description) ? false : strip_tags($this->description);
    }

    public function getMutateLogoAttribute()
    {
        if ($this->id == 1){
            return (null != $this->favicon) ? '/images/static/'.$this->logo : '/images/static/logo.png';
        }
        return (null != $this->logo) ? '/storage/setting/'.$this->logo : '/images/static/logo.png';
    }

    public function getMutateFaviconAttribute()
    {
        if ($this->id == 1){
            return (null != $this->favicon) ? '/images/static/'.$this->favicon : '/images/static/favicon.png';
        }
        return (null != $this->favicon) ? '/storage/setting/'.$this->favicon : '/images/static/favicon.png';
    }

    /**
     * @param $value
     */
    public function setFaviconAttribute($value)
    {
        $attribute_name = "favicon";

        // if the image was erased
        if (null == $value) {
            // delete the image from disk
            Storage::disk($this->disk)->delete($this->{$attribute_name});

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
            Storage::disk($this->disk)->put($filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            Storage::disk($this->disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = $filename;
        }
    }

    /**
     * @param $value
     */
    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";

        // if the image was erased
        if (null == $value) {
            // delete the image from disk
            Storage::disk($this->disk)->delete($this->{$attribute_name});

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
            Storage::disk($this->disk)->put($filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            Storage::disk($this->disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = $filename;
        }
    }
}
