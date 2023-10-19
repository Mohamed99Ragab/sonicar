<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    private $model;
    public function __construct(Subscription $subscription){

        $this->model = $subscription;
    }


    public function index()
    {

        $subscriptions = $this->model->get();

        $title = 'Delete Subscription !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


        return view('dashboard.subscriptions.index',compact('subscriptions'));
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        if ($validator->fails()) {

            toast($validator->errors()->first(),'info');
            return back();
        }

        $this->model->create([
            'name'=>$request->name,
            'email'=>$request->email
        ]);

        toast('Thanks for subscripe in Mailing List','success');
        return back();

    }


    public function destroy($id){

        $contact = $this->model->findOrFail($id);

        $contact->delete();

        toast('Subscription is delete successfully');
        return back();

    }


    public function deleteAll(Request $request){


        $ids = $request->ids;
        $this->model->whereIn('id',explode(",",$ids))->delete();


        return response()->json(['success'=>"Subscription Deleted successfully."]);
    }


}
