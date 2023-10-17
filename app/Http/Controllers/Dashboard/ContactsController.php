<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\MailContactReplay;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    private $modal;
    public function __construct(Contact $contact){

        $this->modal = $contact;
    }


    public function index(){

        $contacts = $this->modal->latest()->get();

        $title = 'Delete Contact !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dashboard.contacts.index',compact('contacts'));
    }


    public function contactReplay(Request $request,$id){

        $request->validate([
            'message'=>'required|string'
        ]);


        $contact = $this->modal->findOrFail($id);

        Mail::to($contact->email)->send(new MailContactReplay($contact,$request->message));

        toast('message is send success to user');
        return back();

    }

    public function destroy($id){

        $contact = $this->modal->findOrFail($id);

        $contact->delete();

        toast('contact is delete successfully');
        return back();

    }


    public function deleteAll(Request $request){


        $ids = $request->ids;
        $this->modal->whereIn('id',explode(",",$ids))->delete();


        return response()->json(['success'=>"Contact Deleted successfully."]);
    }


}
