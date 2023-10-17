<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $modal;

    public function __construct(Category $category)
    {
        $this->modal = $category;
    }


    public function index()
    {
        $categories = $this->modal->get();

        $title = 'Delete Category !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


        return view('dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string'
        ]);

        $this->modal->create([
            'name'=>$request->name
        ]);

        toast('category is created','success');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string'
        ]);

        $category = $this->modal->findOrFail($id);
        $category->update([
            'name'=>$request->name
        ]);

        toast('category is updated','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

         $this->modal->findOrFail($id)->delete();


        toast('contact is delete successfully');
        return back();

    }


    public function deleteAll(Request $request){


        $ids = $request->ids;
        $this->modal->whereIn('id',explode(",",$ids))->delete();


        return response()->json(['success'=>"Category Deleted successfully."]);
    }

}
