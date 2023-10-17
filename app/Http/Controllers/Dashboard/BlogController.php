<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\blogs\EditBlogRequest;
use App\Http\Requests\blogs\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Traits\FileManagementTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    use FileManagementTrait;
    private $modal;
    private $categoryModal;
    public function __construct(Blog $blog,Category $category)
    {
        $this->modal = $blog;
        $this->categoryModal = $category;
    }

    public function index()
    {

        $title = 'Delete Blog !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $blogs = $this->modal->with(['category'])->latest()->get();




        return view('dashboard.blogs.index',compact('blogs'));
    }


    public function create()
    {

        $categories = $this->categoryModal->get();

        return view('dashboard.blogs.add',compact('categories'));

    }


    public function store(StoreBlogRequest $request)
    {

        //        store blog file on server
        $fileName = $this->storeFile('uploads/blogs',$request->file('file'));

        $this->modal->create([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'content'=>$request->get('content'),
            'user_id'=>Auth::id(),
            'status'=>$request->status == 'on'? '1' : '0',
            'file'=>$fileName

        ]);

        toast('blog created successfully','success');
        return back();


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categories = $this->categoryModal->get();

        $blog = $this->modal->with(['category'])->findOrFail($id);

        return view('dashboard.blogs.edit',compact('categories','blog'));
    }


    public function update(EditBlogRequest $request, $id)
    {
        $blog = $this->modal->findOrFail($id);


        $blog->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'content'=>$request->get('content'),
            'status'=>$request->status == 'on'? '1' : '0',

        ]);

        if ($request->file('file') && !empty($blog)){
            // remove old file
            $this->removeFile('public','blogs',$blog->file);

            // store new file
            $fileName = $this->storeFile('uploads/blogs',$request->file('file'));

            $blog->update([
                'file'=>$fileName
            ]);
        }

        toast('blog updated successfully','success');
        return back();
    }


    public function delete($id){

       $blog = $this->modal->findOrFail($id);


        $this->removeFile('public','blogs',$blog->file);

        $blog->delete();

        toast('Blog is delete successfully');
        return back();

    }


    public function deleteAll(Request $request){


        $ids = $request->ids;
       $blogs = $this->modal->whereIn('id',explode(",",$ids))->get();

       foreach ($blogs as $blog){

           $this->removeFile('disk','blogs',$blog->file);

       }
       $blogs->delete();


        return response()->json(['success'=>"Blog Deleted successfully."]);
    }


}
