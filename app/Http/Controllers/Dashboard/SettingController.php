<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\FileManagementTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

        use FileManagementTrait;
    private $model;
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function index(){

        $keys = [
            'about_title',
            'about_content',
            'about_img',
            'meta_title',
            'meta_discription',
            'phone_number',
            'email',
            'facebook',
            'linkedin',
            'twitter',
            'instagram',
            'youtube'
        ];


        $settings = [];

        foreach ($keys as $key) {
            $settings[$key] = $this->model->where('key', $key)->first();
        }

        return view('dashboard.setting.index',compact('settings'));
    }

    public function about(Request $request){


        $validator = Validator::make($request->all(), [
            'about_title'=>'required|string',
            'about_content'=>'required|string'
        ]);

        if ($validator->fails()) {

            toast($validator->errors()->first(),'info');
            return back();
        }


        $fieldsToUpdate = [
            'about_title' => $request->about_title,
            'about_content' => $request->about_content,
        ];

        foreach ($fieldsToUpdate as $key => $value) {
            $this->model->updateOrcreate(['key' => $key], ['value' => $value]);
        }


        if($request->file('about_img'))
        {
            $about_img = $this->model->where('key','about_img')->first();
            if ($about_img){

                $this->removeFile('public','about',$about_img->value);
            }
           $fileName =  $this->storeFile('uploads/about',$request->file('about_img'));
             $this->model->updateOrcreate(
                ['key' => 'about_img'],
                ['value' => $fileName]
            );
        }

        toast('data is saved success','success');

        return back();


    }


    public function meta(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'meta_title'=>'required|string',
            'meta_discription'=>'required|string'
        ]);

        if ($validator->fails()) {

            toast($validator->errors()->first(),'info');
            return back();
        }


        $fieldsToUpdate = [
            'meta_title' => $request->meta_title,
            'meta_discription' => $request->meta_discription,
        ];

        foreach ($fieldsToUpdate as $key => $value) {
            $this->model->updateOrcreate(['key' => $key], ['value' => $value]);
        }


        toast('data is saved success','success');

        return back();

    }


    public function contactInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone_number'=>'required|string',
            'email'=>'required|string',
            'facebook'=>'url|nullable',
            'linkedin'=>'url|nullable',
            'twitter'=>'url|nullable',
            'instagram'=>'url|nullable',
            'youtube'=>'url|nullable',
        ]);

        if ($validator->fails()) {

            toast($validator->errors()->first(),'info');
            return back();
        }



        $fieldsToUpdate = [
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ];

        foreach ($fieldsToUpdate as $key => $value) {
            $this->model->updateOrcreate(['key' => $key], ['value' => $value]);
        }



        toast('data is saved success','success');

        return back();

    }

}
