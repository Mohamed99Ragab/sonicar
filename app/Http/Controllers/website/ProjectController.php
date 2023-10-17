<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $modal;
    public function __construct(Project $project){

        $this->modal = $project;
    }


    public function index(){

        $projects = $this->modal->with(['projectDetails','attachments'])->get();
        $featureProjects = $this->modal->with(['projectDetails','attachments'])->where('is_featured',1)->get();

        return view('website.projects',compact('projects','featureProjects'));
    }


}
