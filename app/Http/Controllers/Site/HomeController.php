<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        $header_menu = Page::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->whereIn('in_menu', [1, 3])->orderBy('sort')->get();
        $footer_menu = Page::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->whereIn('in_menu', [2, 3])->orderBy('sort')->get();
        $page_data = Page::where('page_type_id', 6)->where('lang_id', 1)->firstOrFail();  // 6 - home template
        $categories = Category::where('lang_id', 1)->where('parent', NULL)->orderBy('sort')->get();
        $tags = Category::where('lang_id', 1)->whereIn('in_tags', [1,3])->orderBy('sort')->get(); // in_tags = 1 show in home page
        $active = $page_data->url;
        return view('site.pages.index', compact('page_data', 'active', 'header_menu', 'footer_menu', 'categories', 'tags'));
    }

    public function comingsoon() {

        $footer_menu = Page::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->whereIn('in_menu', [2, 3])->orderBy('sort')->get();
        return view('site.pages.comingsoon', compact('footer_menu'));
    }


}
