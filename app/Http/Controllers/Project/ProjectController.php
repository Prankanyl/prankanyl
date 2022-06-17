<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\DevelopmentTool;
use App\Models\Project\Project;
use App\Models\Project\ProjectCategory;
use App\Models\Project\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::get();
        $types = ProjectType::get();
        $tools = DevelopmentTool::get();
        $projects = Project::with('category')->orderByDesc('id')->paginate(9);
        return view('projects.project-list', compact('categories', 'projects', 'tools', 'types'));
    }

    public function projectSort(Request $request)
    {
        $categories = ProjectCategory::get();
        $types = ProjectType::get();
        $tools = DevelopmentTool::get();

        $projects = Project::where(function($query) use($request){
            if($request->has('project_category')){
                $category = ProjectCategory::whereSlug($request->project_category)->first();
                $query->where('project_categories_id', $category->id);
            }
            if($request->has('project_type')){
                $type = ProjectType::whereSlug($request->project_type)->first();
                $arr = DB::table('project_project_type')
                    ->where('project_types_id', $type->id)
                    ->get()->pluck('project_id')->toArray();
                $query->whereIn('id', $arr);
            }
            if($request->has('development_tool')){
                $development_tool = DevelopmentTool::whereSlug($request->development_tool)->first();
                $arr = DB::table('project_development_tool')
                    ->where('development_tool_id', $development_tool->id)
                    ->get()->pluck('project_id')->toArray();
                $query->whereIn('id', $arr);
            }
        })->orderByDesc('id')->paginate(9);

        return view('projects.project-list', compact('categories', 'projects', 'tools', 'types'));
    }

    public function projectCategory($category_slug)
    {
        $categories = ProjectCategory::get();
        $category = ProjectCategory::whereSlug($category_slug)->first();
        $projects = Project::where('project_category_id', $category->id)
            ->orderByDesc('id')
            ->paginate(9);

        return view('projects.project-list', compact('categories', 'projects'));
    }

    public function projectDetail($category_slug, $project_slug)
    {
        $project = Project::with('category')
            ->whereSlug($project_slug)
            ->first();
        return view('projects.project-detail', compact('project'));
    }
}
