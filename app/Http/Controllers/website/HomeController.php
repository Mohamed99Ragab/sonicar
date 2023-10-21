<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $projectModal;
    private $blogModal;
    public function __construct(Project $project, Blog $blog)
    {

        $this->projectModal = $project;
        $this->blogModal = $blog;
    }

    public function index(){



        $projects = $this->projectModal->with(['projectDetails','attachments'])->get();

        $blogs = $this->blogModal->where('status','1')->latest()->take(3)->get();

        return view('website.home',compact('projects','blogs'));
    }


    public function getProjectById($id){

        $project = $this->projectModal->with(['projectDetails','attachments'])->find($id);


        return response()->json($project,200);
    }




}
