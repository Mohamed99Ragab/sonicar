<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $settingModel;
    public function __construct(Setting $setting)
    {

        $this->settingModel = $setting;

    }

    public function index(){


        $aboutTitle =  $this->settingModel->where('key','about_title')->first();
        $aboutContent =  $this->settingModel->where('key','about_content')->first();
        $aboutImg =  $this->settingModel->where('key','about_img')->first();

        return view('website.about',compact(
            'aboutTitle',
            'aboutContent',
            'aboutImg'
        ));
    }
}
