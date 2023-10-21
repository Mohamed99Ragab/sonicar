<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\FreeQuote;
use App\Models\Subscription;
use App\Models\Visit;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminPanelController extends Controller
{


    public function index(){

            $visits = Visit::count();

            $blogIsPublish = Blog::where('status','1')->count();

            $quotes = FreeQuote::count();
            $latestFreeQuotes = FreeQuote::latest()->take(3)->get();
            $subscriptions = Subscription::count();


        $chart_options = [
            'chart_title' => 'Free Quotes by day',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\FreeQuote',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
            'conditions'=> [
                [ 'color' => 'blue', 'fill' => true],
            ],
        ];
        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => '# of blog from every category ',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Blog',
            'relationship_name' => 'category', // represents function user() on Transaction model
            'group_by_field' => 'name',
            'chart_type' => 'pie',

        ];
        $chart2 = new LaravelChart($chart_options);



        $title = 'Delete Free Quote !';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);



        return view('dashboard.home',compact(
            'visits',
            'blogIsPublish',
            'quotes',
            'subscriptions',
            'latestFreeQuotes',
            'chart1',
            'chart2'
        ));
    }
}
