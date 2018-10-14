<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect('/news');
        }

        $data = array (
            'title' => 'Welcome to TVNET top 5 news articles',
        );
        return view('pages.index')->with($data);
    }

    public function news() {
        $articles = array();
        
        $xml = simplexml_load_file('http://www.tvnet.lv/rss');
        for ($i=0; $i<5; $i++) {
            array_push($articles, $xml->channel->item[$i]);
        }

        $data = array (
            'articles' => $articles,
        );
        return view('pages.news')->with($data);
    }
}
