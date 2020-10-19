<?php

namespace App\Http\Controllers;

use App\Jobs\LoadAndRenderNews;
use App\Jobs\RefreshOnEveryFiveMinutes;
use App\Models\Keyword;
use App\Models\NewsFeed;
use App\Services\GoogleSearchServices;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;

class ScrapController extends Controller
{

    public function index(){
        $news = NewsFeed::latest()->paginate(15);
        return view('index', compact('news'));
    }

    public function search(){
        dispatch(new LoadAndRenderNews());
        return redirect('/');
    }
}
