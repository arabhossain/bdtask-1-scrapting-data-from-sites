<?php


namespace App\Services;

use App\Models\Keyword;
use App\Models\NewsFeed;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;

class GoogleSearchServices
{
    private $keywords;

    public function __constructor(){
        $this->keywords = [];
    }

    public function flushKeywords(){
        $this->keywords = [];
    }

    public function setKeyword($keyword){
        $this->keywords[] = $keyword;
    }

    public function loadDBKeyword(){
        $keywords= Keyword::all();
        foreach ($keywords as $keyword) {
            $this->keywords[]  = $keyword->tag;
        }
    }

    public function render(){

        foreach($this->keywords as $keyword) {
            $fulltext = new LaravelGoogleCustomSearchEngine();
            $result = $fulltext->getResults($keyword);
            foreach ($result as $ref) {
                $thumb = '';
                $_thumb = $ref->pagemap->cse_thumbnail[0] ?? '';
                if (!empty($_thumb)) {
                    $thumb = $_thumb->src;
                }
                NewsFeed::firstOrCreate([
                    'title' => $ref->title,
                    'body' => $ref->snippet,
                    'url' => $ref->link,
                    'thumb' => $thumb
                ]);
            }
        }
    }

}
