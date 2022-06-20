<?php

namespace App\Models\Project;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use CrudTrait, HasSlug, HasFactory;

    protected $table = 'projects';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = [];
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

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_categories_id');
    }

    public function development_tools()
    {
        return $this->belongsToMany(DevelopmentTool::class, 'project_development_tool');
    }

    public function project_type()
    {
        return $this->belongsToMany(ProjectType::class, 'project_project_type', 'project_types_id', 'project_id');
    }

    public function getMutateImageAttribute(){
        return (null != $this->image) ? '/storage/project/'.$this->image : config('default.project');
    }

    public function getMutateShortDescriptionAttribute(){
        return str_limit(strip_tags($this->short_description), 235);
    }

    public function getMutateLongDescriptionAttribute(){
        return strip_tags($this->long_description);
    }
}
