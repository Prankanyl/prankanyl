<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

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

    public function getMutateDescriptionAttribute()
    {
        return (null == $this->description) ? false : strip_tags($this->description);
    }

    public function getMutateLogoAttribute()
    {
        return (null == $this->logo) ? false : '/images/static/'.$this->logo;
    }

    public function getMutateFaviconAttribute()
    {
        return (null == $this->favicon) ? false : '/images/static/'.$this->favicon;
    }
}
