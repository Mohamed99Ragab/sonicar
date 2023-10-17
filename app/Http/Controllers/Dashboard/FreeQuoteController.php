<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailToUsersJob;
use App\Models\FreeQuote;
use Illuminate\Http\Request;

class FreeQuoteController extends Controller
{
    private $modal;
    public function __construct(FreeQuote $freeQuote){

        $this->modal = $freeQuote;
    }

    public function index(){

        $quotes = $this->modal->latest()->get();

        $title = 'Delete FreeQoute !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dashboard.free-quote.index',compact('quotes'));
    }


    public function destroy($id){

        $qoute = $this->modal->findOrFail($id);

        $qoute->delete();

        toast('Free Qoute is delete successfully');
        return back();

    }


    public function deleteAll(Request $request){


        $ids = $request->ids;
        $this->modal->whereIn('id',explode(",",$ids))->delete();


        return response()->json(['success'=>"Contact Deleted successfully."]);
    }


    public function notifyUsersFreeQuote(){

        return view('dashboard.free-quote.report');
    }

    public function sendNotifyUsersFreeQuote(Request $request){

        $request->validate([
            'message'=>'required|string'
        ]);

        dispatch(new SendEmailToUsersJob($request->message));




    }

}
