<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    private $modal;
    private $categoryModal;
    public function __construct(Blog $blog, Category $category)
    {
        $this->modal = $blog;
        $this->categoryModal = $category;
    }


    public function index()
    {
        $blogs = $this->modal->where('status','1')->paginate(5);

        $recentBlogs = $this->modal->latest()->take(5)->get();
        $categories = $this->categoryModal->get();

        return view('website.blogs.index',compact('blogs','recentBlogs','categories'));
    }

    public function blogDetails($slug)
    {


        $blog = $this->modal->where('slug',$slug)->first();
        $relatedBlogs = $this->modal->where('category_id',$blog->category_id)->where('id','<>',$blog->id)
            ->latest()->take(3)->get();

        $categories = $this->categoryModal->get();
        $recentBlogs = $this->modal->latest()->take(5)->get();


        return view('website.blogs.details',compact('blog','relatedBlogs','categories','recentBlogs'));
    }

    public function search(Request $request){

        $searchResults = $this->modal->where('status','1')->
        where('title','like','%'.$request->search.'%')->paginate(5);

        $categories = $this->categoryModal->get();
        $recentBlogs = $this->modal->latest()->take(5)->get();


        return view('website.blogs.search',compact('searchResults','categories','recentBlogs'));

    }
}
