<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeywordStoreRequest;
use App\Models\Keyword;


class KeywordController extends Controller
{
    public function index(){
        $keywords = Keyword::latest()->paginate(15);
        return view('keyword', compact('keywords'));
    }

    public function store(KeywordStoreRequest  $request){
        Keyword::firstOrCreate($request->only('tag'));
        return redirect('keywords');
    }
}
