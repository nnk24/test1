<?php

namespace App\Http\Controllers;

use App\Continents;
use App\Regions;
use App\Tags;
use Illuminate\Http\Request;
use App\Groups;
use App\Images;
use App\Types;

class SitemapController extends Controller
{
    //
    public function index() {
        $groups = Groups::all();
        return response()->view('sitemaps.index', compact('groups'))->header('Content-Type', 'text/xml');
    }
    public function image() {
        $images = Images::all();
        return response()->view('sitemaps.image', compact('images'))->header('Content-Type', 'text/xml');
    }
    public function type() {
        $types = Types::all();
        return response()->view('sitemaps.type', compact('types'))->header('Content-Type', 'text/xml');
    }
    public function region() {
        $regions = Regions::all();
        return response()->view('sitemaps.region', compact('regions'))->header('Content-Type', 'text/xml');
    }
    public function continent() {
        $continents = Continents::all();
        return response()->view('sitemaps.continent', compact('continents'))->header('Content-Type', 'text/xml');
    }
    public function tag() {
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        return response()->view('sitemaps.tag', compact('tags'))->header('Content-Type', 'text/xml');
    }
}
