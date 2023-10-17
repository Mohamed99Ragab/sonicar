<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    private $modal;
    public function __construct(Contact $contact){

        $this->modal = $contact;
    }

    public function index(){

        return view('website.contact-us');
    }


    public function saveContact(Request $request){

       $data =  $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'subject'=>'required|string',
            'message'=>'required'
        ]);


        $contact = $this->modal->create($data);
        $this->sendMailToAdmin($contact);

        toast('Data is send successfully we will contact with you','success');
        return back();


    }


    public function sendMailToAdmin($contact){

        $user = User::first();

        Mail::to($user->email)->send(new ContactUsMail($contact));
    }
}
