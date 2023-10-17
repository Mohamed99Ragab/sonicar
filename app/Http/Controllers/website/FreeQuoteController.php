<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Mail\FreeQuoteMail;
use App\Models\FreeQuote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FreeQuoteController extends Controller
{
    private $modal;
    public function __construct(FreeQuote $freeQuote){

        $this->modal = $freeQuote;
    }

    public function saveFreeQuote(Request $request){


        $data= $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'price'=>'required|string',
            'service'=>'required|string',
            'message'=>'required|string',
        ]);

        DB::beginTransaction();
        try {
            $quote = $this->modal->create($data);

            $this->sendFreeQuoteToAdmin($quote);
            toast('Free Quote is send successfully to admin','success');
            DB::commit();
            return back();
        }

        catch (\Exception $e){

            DB::rollBack();
            return $e->getMessage();
            toast($e->getMessage(),'error');
            return back();
        }


    }

    public function sendFreeQuoteToAdmin($data){

        $user = User::first();

        Mail::to($user->email)->send(new FreeQuoteMail($data));
    }
}
