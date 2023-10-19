<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $phone = Setting::where('key','phone_number')->first();
        $email = Setting::where('key','email')->first();
        $facebook = Setting::where('key','facebook')->first();
        $linkedin = Setting::where('key','linkedin')->first();
        $instagram = Setting::where('key','instagram')->first();
        $twitter = Setting::where('key','twitter')->first();
        $youtube = Setting::where('key','youtube')->first();

        $meta_discription = Setting::where('key','meta_discription')->first();


        view()->share('sharedData', [
            'phone'=>$phone->value,
            'email'=>$email->value,
            'meta_discription'=>$meta_discription->value

        ]);

        view()->share('socialLinks', [
            'facebook'=>$facebook->value,
            'gmail'=>$email->value,
            'linkedin'=>$linkedin->value,
            'instagram'=>$instagram->value,
            'twitter'=>$twitter->value,
            'youtube'=>$youtube->value

        ]);

    }
}
