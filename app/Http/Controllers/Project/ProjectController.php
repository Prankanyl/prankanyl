<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Project;
use App\Models\Project\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public $category_slug;

    public function index()
    {
        $categories = ProjectCategory::get();
        $projects = Project::with('category')->orderByDesc('id')->paginate(9);
        return view('projects.project-list', compact('categories', 'projects'));
    }

    public function projectCategory($category_slug)
    {
        dd();
        $this->category_slug = $category_slug;
        $categories = ProjectCategory::get();
        $projects = Project::with('category')
            ->where(['project_category_id' => function ($query){
                $query->from('article_categories')
                    ->select('id')
                    ->whereSlug($this->category_slug);
            }])
            ->orderByDesc('id')
            ->paginate(9);

        return view('projects.project-list', compact('categories', 'projects'));
    }

    public function projectDetail($category_slug, $project_slug)
    {
        dd();
        $project = Project::with('category')
            ->whereSlug($project_slug)
            ->first();
        return view('projects.project-detail', compact('project'));
    }
}
