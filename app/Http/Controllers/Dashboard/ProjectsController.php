<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\projects\StoreProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectAttachment;
use App\Models\ProjectDetail;
use App\Traits\FileManagementTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
        use FileManagementTrait;

    private $model;
    private $projectDetailsModel;
    private $projectAttachmentsModel;
    public function __construct(Project $project, ProjectDetail $projectDetail, ProjectAttachment $attach){

        $this->model = $project;
        $this->projectDetailsModel = $projectDetail;
        $this->projectAttachmentsModel = $attach;
    }

    public function index()
    {

        $projects = $this->model->with(['projectDetails','attachments'])->get();

        $title = 'Delete Project !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dashboard.projects.index',compact('projects'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        DB::beginTransaction();
        try {



            //   save image on server
           $file =  $this->storeFile('uploads/projects',$request->file('home_img'));

            $project = $this->model->create([
                'title'=>$request->title,
                'description'=>$request->description,
                'category'=>$request->category,
                'home_img'=>$file,
                'url'=>$request->url,
                'is_featured'=>$request->is_featured =='on' ? 1 : 0
            ]);



            if (isset($request->delevired_items))
            {
                foreach ($request->delevired_items as $item){

                    $this->projectDetailsModel->create([
                        'project_id'=> $project->id,
                        'item_delivered'=>$item['name'],
                    ]);
                }

            }


            if ($request->file('files'))
            {
                foreach ($request->file('files') as $file){


                    //   save image on server
                    $fileName =  $this->storeFile('uploads/projects',$file);


                    $this->projectAttachmentsModel->create([
                        'project_id'=> $project->id,
                        'file'=>$fileName,
                    ]);

                }

            }

                DB::commit();
            toast('Project created success','success');
            return back();
        }

        catch (\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }






    }


    public function show(Client $client)
    {
        //
    }


    public function edit($id)
    {
        $project = $this->model->with(['projectDetails','attachments'])->findOrFail($id);


        return view('dashboard.projects.edit',compact('project'));
    }

    public function projectDetails($id){

        $title = 'Delete Project Details!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $project = $this->model->with(['projectDetails','attachments'])->findOrFail($id);

        return view('dashboard.projects.details',compact('project'));
    }


    public function deleteProjectDetails($id){
        $item = $this->projectDetailsModel->findOrFail($id);
        $item->delete();

        toast('item is deleted','success');
        return back();
    }

    public function storeProjectDetails(Request $request,$id){

        $request->validate([
            'item'=>'required|string'
        ]);

        $this->projectDetailsModel->create([
            'item_delivered'=>$request->item,
            'project_id'=>$id
        ]);

        toast('item added success','success');

        return back();
    }

    public function updateProjectDetails(Request $request,$id){

        $request->validate([
            'item'=>'required|string'
        ]);

        $item = $this->projectDetailsModel->findOrFail($id);
        $item->update([
            'item_delivered'=>$request->item,
        ]);

        toast('item updated success','success');

        return back();
    }


    public function storeProjectAttach(Request $request, $id){

        $request->validate([
           'files'=>'array|required'
        ]);

        foreach ($request->file('files') as $file){

           $fileName = $this->storeFile('uploads/projects',$file);

           $this->projectAttachmentsModel->create([
               'file'=>$fileName,
               'project_id'=>$id
           ]);
        }
        toast('file is attach success','success');
        return back();

    }

    public function updateProjectAttach(Request $request, $id){

        $request->validate([
            'file'=>'image|required'
        ]);

        $itemAttach = $this->projectAttachmentsModel->findOrFail($id);

//        remove last image
        $this->removeFile('public','projects',$itemAttach->file);

//        store new image
        $fileName = $this->storeFile('uploads/projects',$request->file('file'));

        $itemAttach->update([
            'file'=>$fileName
        ]);

        toast('file attach is updated success','success');
        return back();

    }

    public function deleteProjectAttach($id){

        $itemAttach = $this->projectAttachmentsModel->findOrFail($id);

        $this->removeFile('public','projects',$itemAttach->file);

        $itemAttach->delete();
        toast('item attachment is deleted','success');
        return back();
    }


    public function update(Request $request,$id)

    {

//        return $request;
       $data =  $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'category'=>'required|string',
            'url'=>'url|required'
        ]);

        $project = $this->model->findOrfail($id);

        $project->update($data);


        $project->update([
            'is_featured'=>$request->is_featured =='on' ? 1 : 0
        ]);



        toast('project edit success','success');
        return back();




    }


    public function destroy($id)
    {

        $project = $this->model->findOrfail($id);
        $files = $project->attachments;

        //delete old image from server
        $this->removeFile('public','projects',$project->home_img);

        foreach ($files as $file){
            $this->removeFile('public','projects',$file->file);
        }
        $project->delete();

        toast('Project is removed','success');
        return back();
    }


    public function deleteAll(Request $request){


        $ids = $request->ids;
       $projects =  $this->model->whereIn('id',explode(",",$ids))->get();



        foreach ($projects as $project){
            $this->removeFile('public','projects',$project->home_img);

            foreach ($project->attachments as $attach){
                $this->removeFile('public','projects',$attach->file);
            }
        }

        $project->delete();

        return response()->json(['success'=>"projects Deleted successfully."]);
    }





}





